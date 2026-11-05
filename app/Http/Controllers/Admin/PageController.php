<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $query = Page::with('user')->latest();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pages = $query->paginate(10)->withQueryString();

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:pages,slug'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'status' => ['required', Rule::in(['draft', 'published'])],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
            'seo_keywords' => ['nullable', 'string'],
        ]);

        $validated['user_id'] = auth()->id();

        $validated['slug'] = !empty($validated['slug'])
            ? \Illuminate\Support\Str::slug($validated['slug'])
            : Page::generateUniqueSlug($validated['title']);

        // Pastikan slug unik setelah normalisasi.
        if (
            Page::where('slug', $validated['slug'])->exists()
        ) {
            return back()
                ->withInput()
                ->withErrors(['slug' => 'Slug sudah digunakan.']);
        }

        $validated['published_at'] = $validated['status'] === 'published'
            ? now()
            : null;

        Page::create($validated);

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Halaman berhasil dibuat.');
    }

    public function show(Page $page)
    {
        return view('admin.pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('pages', 'slug')->ignore($page->id),
            ],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'status' => ['required', Rule::in(['draft', 'published'])],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
            'seo_keywords' => ['nullable', 'string'],
        ]);

        $slug = !empty($validated['slug'])
            ? \Illuminate\Support\Str::slug($validated['slug'])
            : Page::generateUniqueSlug($validated['title'], $page->id);

        $slugExists = Page::where('slug', $slug)
            ->where('id', '!=', $page->id)
            ->exists();

        if ($slugExists) {
            return back()
                ->withInput()
                ->withErrors(['slug' => 'Slug sudah digunakan.']);
        }

        $validated['slug'] = $slug;

        if ($validated['status'] === 'published') {
            $validated['published_at'] = $page->published_at ?? now();
        } else {
            $validated['published_at'] = null;
        }

        $page->update($validated);

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Halaman berhasil diperbarui.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Halaman berhasil dihapus.');
    }
}