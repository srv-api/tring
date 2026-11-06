@extends('admin.layouts.app')

@section('title', 'Detail Kategori')
@section('page-title', 'Detail Kategori')

@section('content')

<div style="display:flex;justify-content:space-between;align-items:center;gap:15px;margin-bottom:25px;flex-wrap:wrap">
    <div>
        <h2 style="font-size:20px;font-weight:800;margin:0 0 5px">
            {{ $category->name }}
        </h2>

        <p style="color:#777;font-size:13px;margin:0">
            Detail kategori dan artikel yang terkait.
        </p>
    </div>

    <div style="display:flex;gap:8px">
        <a href="{{ route('admin.categories.index') }}"
           style="padding:10px 14px;border:1px solid #eee9ee;border-radius:8px;text-decoration:none;color:#555;font-size:12px;font-weight:600">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <a href="{{ route('admin.categories.edit', $category) }}"
           style="padding:10px 14px;background:#7F0079;border-radius:8px;text-decoration:none;color:white;font-size:12px;font-weight:700">
            <i class="bi bi-pencil"></i> Edit Kategori
        </a>
    </div>
</div>

<div style="background:white;border:1px solid #eee9ee;border-radius:11px;padding:25px;margin-bottom:25px">

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:25px">

        <div>
            <div style="font-size:11px;color:#858085;margin-bottom:7px">Nama Kategori</div>
            <div style="font-size:14px;font-weight:700">{{ $category->name }}</div>
        </div>

        <div>
            <div style="font-size:11px;color:#858085;margin-bottom:7px">Slug</div>
            <div style="font-size:13px;color:#555">{{ $category->slug }}</div>
        </div>

        <div>
            <div style="font-size:11px;color:#858085;margin-bottom:7px">Jumlah Artikel</div>
            <div style="font-size:14px;font-weight:700;color:#7F0079">
                {{ $articles->total() }} Artikel
            </div>
        </div>

        <div>
            <div style="font-size:11px;color:#858085;margin-bottom:7px">Tanggal Dibuat</div>
            <div style="font-size:13px;color:#555">
                {{ $category->created_at->format('d M Y H:i') }}
            </div>
        </div>

    </div>

    <div style="border-top:1px solid #eee9ee;margin-top:22px;padding-top:20px">
        <div style="font-size:11px;color:#858085;margin-bottom:8px">Deskripsi</div>

        <div style="font-size:13px;color:#555;line-height:1.8;white-space:pre-wrap">{{ $category->description ?: 'Belum ada deskripsi kategori.' }}</div>
    </div>

</div>

<div style="background:white;border:1px solid #eee9ee;border-radius:11px;overflow:hidden">

    <div style="padding:20px 22px;border-bottom:1px solid #eee9ee">
        <h3 style="font-size:15px;font-weight:800;margin:0">
            Artikel dalam Kategori
        </h3>
        <p style="font-size:12px;color:#858085;margin:5px 0 0">
            Daftar artikel yang menggunakan kategori ini.
        </p>
    </div>

    <div style="overflow-x:auto">
        <table style="width:100%;border-collapse:collapse;min-width:600px">
            <thead>
                <tr style="background:#faf9fb">
                    <th style="text-align:left;padding:14px 20px;font-size:12px;color:#777">Judul Artikel</th>
                    <th style="text-align:left;padding:14px 20px;font-size:12px;color:#777">Status</th>
                    <th style="text-align:left;padding:14px 20px;font-size:12px;color:#777">Tanggal</th>
                    <th style="text-align:right;padding:14px 20px;font-size:12px;color:#777">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($articles as $article)
                    <tr style="border-top:1px solid #f0edf0">
                        <td style="padding:15px 20px;font-size:13px;font-weight:700">
                            {{ $article->title }}
                        </td>

                        <td style="padding:15px 20px">
                            <span style="font-size:11px;padding:5px 9px;border-radius:20px;background:{{ $article->status === 'published' ? '#eaf8ef' : '#fff5e6' }};color:{{ $article->status === 'published' ? '#247a43' : '#a66b16' }}">
                                {{ ucfirst($article->status) }}
                            </span>
                        </td>

                        <td style="padding:15px 20px;font-size:12px;color:#777">
                            {{ $article->created_at->format('d M Y') }}
                        </td>

                        <td style="padding:15px 20px;text-align:right">
                            <a href="{{ route('admin.articles.show', $article) }}"
                               style="color:#7F0079;text-decoration:none;font-size:12px">
                                Lihat Artikel <i class="bi bi-arrow-right"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align:center;padding:35px;color:#858085;font-size:13px">
                            Belum ada artikel dalam kategori ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="padding:18px 20px;border-top:1px solid #eee9ee">
        {{ $articles->links() }}
    </div>

</div>

@endsection