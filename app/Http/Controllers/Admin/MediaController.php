<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $query = Media::with('user')->latest();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('file_name', 'like', "%{$search}%");
            });
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $media = $query->paginate(20)->withQueryString();

        return view('admin.media.index', compact('media'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'files' => ['required', 'array', 'min:1', 'max:20'],
            'files.*' => [
                'required',
                'file',
                'max:10240',
                'mimes:jpg,jpeg,png,webp,gif,svg,pdf,doc,docx,xls,xlsx,ppt,pptx,txt,csv,mp4,mp3',
            ],
        ], [
            'files.required' => 'Pilih minimal satu file.',
            'files.*.max' => 'Ukuran setiap file maksimal 10 MB.',
            'files.*.mimes' => 'Format file tidak didukung.',
        ]);

        foreach ($validated['files'] as $file) {
            $path = $file->store('media/' . date('Y/m'), 'public');

            $mime = $file->getMimeType() ?: 'application/octet-stream';

            if (str_starts_with($mime, 'image/')) {
                $type = 'image';
            } elseif (str_starts_with($mime, 'video/')) {
                $type = 'video';
            } elseif (str_starts_with($mime, 'audio/')) {
                $type = 'audio';
            } elseif ($mime === 'application/pdf') {
                $type = 'document';
            } else {
                $type = 'other';
            }

            Media::create([
                'name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                'file_name' => $file->getClientOriginalName(),
                'path' => $path,
                'disk' => 'public',
                'mime_type' => $mime,
                'type' => $type,
                'size' => $file->getSize(),
                'user_id' => $request->user()->id,
            ]);
        }

        return redirect()
            ->route('admin.media.index')
            ->with('success', 'File berhasil diunggah ke Media Library.');
    }

    public function show(Media $medium)
    {
        return view('admin.media.show', [
            'media' => $medium->load('user'),
        ]);
    }

    public function destroy(Media $medium)
    {
        // Jangan menghapus file yang sedang digunakan sebagai thumbnail artikel.
        if (
            \Illuminate\Support\Facades\Schema::hasColumn('articles', 'thumbnail')
            && \App\Models\Article::where('thumbnail', $medium->path)->exists()
        ) {
            return redirect()
                ->route('admin.media.index')
                ->with('error', 'File ini masih digunakan oleh artikel dan tidak dapat dihapus.');
        }

        Storage::disk($medium->disk)->delete($medium->path);

        $medium->delete();

        return redirect()
            ->route('admin.media.index')
            ->with('success', 'Media berhasil dihapus.');
    }
}