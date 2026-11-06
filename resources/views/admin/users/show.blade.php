@extends('admin.layouts.app')

@section('title', 'Detail Pengguna')
@section('page-title', 'Detail Pengguna')

@section('content')

<div style="display:flex;justify-content:space-between;align-items:center;gap:15px;flex-wrap:wrap;margin-bottom:25px">

    <div>
        <h2 style="font-size:20px;font-weight:800;margin:0 0 5px">
            Detail Pengguna
        </h2>

        <p style="color:#777;font-size:13px;margin:0">
            Informasi akun dan aktivitas pengguna.
        </p>
    </div>

    <div style="display:flex;gap:8px">
        <a href="{{ route('admin.users.index') }}"
           style="padding:10px 14px;border:1px solid #eee9ee;border-radius:8px;text-decoration:none;color:#555;font-size:12px;font-weight:600">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <a href="{{ route('admin.users.edit', $user) }}"
           style="padding:10px 14px;background:#7F0079;border-radius:8px;text-decoration:none;color:white;font-size:12px;font-weight:700">
            <i class="bi bi-pencil"></i> Edit Pengguna
        </a>
    </div>

</div>

<div style="background:white;border:1px solid #eee9ee;border-radius:11px;padding:25px;margin-bottom:25px">

    <div style="display:flex;align-items:center;gap:16px;padding-bottom:22px;border-bottom:1px solid #eee9ee">

        <div style="width:58px;height:58px;flex-shrink:0;border-radius:50%;background:#f9edfa;color:#7F0079;display:flex;align-items:center;justify-content:center;font-size:22px;font-weight:800">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>

        <div>
            <h3 style="font-size:17px;font-weight:800;margin:0 0 5px">
                {{ $user->name }}
            </h3>

            <div style="font-size:12px;color:#858085">
                {{ $user->email }}
            </div>

            <div style="margin-top:9px">
                @if($user->role === 'admin')
                    <span style="background:#f9edfa;color:#7F0079;padding:5px 10px;border-radius:20px;font-size:11px;font-weight:700">
                        Administrator
                    </span>
                @else
                    <span style="background:#f1f3f5;color:#666;padding:5px 10px;border-radius:20px;font-size:11px;font-weight:700">
                        Pengguna
                    </span>
                @endif
            </div>
        </div>

    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:25px;padding-top:22px">

        <div>
            <div style="font-size:11px;color:#858085;margin-bottom:7px">ID Pengguna</div>
            <div style="font-size:13px;font-weight:700">#{{ $user->id }}</div>
        </div>

        <div>
            <div style="font-size:11px;color:#858085;margin-bottom:7px">Jumlah Artikel</div>
            <div style="font-size:13px;font-weight:700;color:#7F0079">
                {{ $user->articles_count ?? $user->articles()->count() }} Artikel
            </div>
        </div>

        <div>
            <div style="font-size:11px;color:#858085;margin-bottom:7px">Tanggal Terdaftar</div>
            <div style="font-size:13px;font-weight:700">
                {{ $user->created_at->format('d M Y H:i') }}
            </div>
        </div>

        <div>
            <div style="font-size:11px;color:#858085;margin-bottom:7px">Email Terverifikasi</div>
            <div style="font-size:13px;font-weight:700;color:{{ $user->email_verified_at ? '#247a43' : '#d18a25' }}">
                {{ $user->email_verified_at ? 'Terverifikasi' : 'Belum Terverifikasi' }}
            </div>
        </div>

    </div>

</div>

<div style="background:white;border:1px solid #eee9ee;border-radius:11px;overflow:hidden">

    <div style="padding:20px 22px;border-bottom:1px solid #eee9ee">
        <h3 style="font-size:15px;font-weight:800;margin:0">
            Artikel Pengguna
        </h3>

        <p style="font-size:12px;color:#858085;margin:5px 0 0">
            Artikel yang dibuat oleh {{ $user->name }}.
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
                            Pengguna ini belum memiliki artikel.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    @if($articles->hasPages())
        <div style="padding:18px 20px;border-top:1px solid #eee9ee">
            {{ $articles->links() }}
        </div>
    @endif

</div>

@endsection