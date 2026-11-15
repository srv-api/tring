<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CmsNavigationMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class MenuController extends Controller
{
    /**
     * Menampilkan semua menu navigasi.
     */
    public function index()
    {
        $menus = CmsNavigationMenu::withCount('items')
            ->latest()
            ->paginate(10);

        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Form tambah menu.
     */
    public function create()
    {
        return view('admin.menus.create');
    }

    /**
     * Menyimpan menu baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:100'],
            'is_active' => ['required', 'boolean'],
        ]);

        $slug = Str::slug($validated['name']);
        $originalSlug = $slug;
        $counter = 1;

        while (CmsNavigationMenu::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $menu = CmsNavigationMenu::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'location' => $validated['location'] ?? null,
            'is_active' => $validated['is_active'],
        ]);

        return redirect()
            ->route('admin.menus.edit', $menu->id)
            ->with('success', 'Menu navigasi berhasil dibuat.');
    }

    /**
     * Form edit menu dan item navigasi.
     */
    public function edit(CmsNavigationMenu $menu)
    {
        $menu->load('items');

        return view('admin.menus.edit', compact('menu'));
    }

    /**
     * Update menu dan seluruh item navigasi.
     */
    public function update(Request $request, CmsNavigationMenu $menu)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:100'],
            'is_active' => ['required', 'boolean'],

            'items' => ['nullable', 'array'],
            'items.*.id' => ['nullable', 'integer'],
            'items.*.label' => ['required', 'string', 'max:255'],
            'items.*.url' => ['nullable', 'string', 'max:2048'],
            'items.*.target' => [
                'required',
                Rule::in(['_self', '_blank']),
            ],
            'items.*.is_active' => ['required', 'boolean'],
        ]);

        DB::transaction(function () use ($validated, $menu) {

            $menu->update([
                'name' => $validated['name'],
                'location' => $validated['location'] ?? null,
                'is_active' => $validated['is_active'],
            ]);

            $retainedIds = [];

            foreach (($validated['items'] ?? []) as $index => $item) {

                if (!empty($item['id'])) {
                    $menuItem = $menu->items()
                        ->whereKey($item['id'])
                        ->first();

                    if (!$menuItem) {
                        abort(422, 'Item navigasi tidak valid.');
                    }

                    $menuItem->update([
                        'label' => $item['label'],
                        'url' => $item['url'] ?? null,
                        'target' => $item['target'],
                        'is_active' => $item['is_active'],
                        'sort_order' => $index,
                    ]);

                } else {

                    $menuItem = $menu->items()->create([
                        'label' => $item['label'],
                        'url' => $item['url'] ?? null,
                        'target' => $item['target'],
                        'is_active' => $item['is_active'],
                        'sort_order' => $index,
                    ]);
                }

                $retainedIds[] = $menuItem->id;
            }

            $menu->items()
                ->when(
                    count($retainedIds) > 0,
                    fn ($query) => $query->whereNotIn('id', $retainedIds)
                )
                ->when(
                    count($retainedIds) === 0,
                    fn ($query) => $query
                )
                ->delete();
        });

        return redirect()
            ->route('admin.menus.edit', $menu->id)
            ->with('success', 'Menu navigasi berhasil diperbarui.');
    }

    /**
     * Hapus menu.
     */
    public function destroy(CmsNavigationMenu $menu)
    {
        $menu->delete();

        return redirect()
            ->route('admin.menus.index')
            ->with('success', 'Menu navigasi berhasil dihapus.');
    }
}