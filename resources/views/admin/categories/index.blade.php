@extends('admin.layouts.app')

@section('title', 'Kategori')
@section('page-title', 'Kategori')

@section('content')

<div style="display:flex;justify-content:space-between;align-items:center;gap:15px;margin-bottom:25px;flex-wrap:wrap">
    <div>
        <h2 style="font-size:20px;font-weight:800;margin:0 0 5px">
            Kategori
        </h2>
        <p style="color:#777;font-size:13px;margin:0">
            Kelola kategori artikel dan berita website Tring.
        </p>
    </div>

    <a href="{{ route('admin.categories.create') }}"
       style="display:inline-flex;align-items:center;gap:8px;background:#7F0079;color:white;text-decoration:none;padding:11px 17px;border-radius:8px;font-size:13px;font-weight:700">
        <i class="bi bi-plus-lg"></i>
        Tambah Kategori
    </a>
</div>

@if(session('success'))
    <div style="background:#eaf8ef;color:#247a43;padding:13px 16px;border-radius:8px;margin-bottom:20px;font-size:13px">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="background:#fff0f0;color:#c0392b;padding:13px 16px;border-radius:8px;margin-bottom:20px;font-size:13px">
        {{ session('error') }}
    </div>
@endif

<div style="background:white;border:1px solid #eee9ee;border-radius:11px;overflow:hidden">

    <div style="padding:20px 22px;border-bottom:1px solid #eee9ee">
        <h3 style="font-size:15px;font-weight:800;margin:0">
            Semua Kategori
        </h3>
        <p style="font-size:12px;color:#858085;margin:5px 0 0">
            Total {{ $categories->total() }} kategori
        </p>
    </div>

    <div style="overflow-x:auto">
        <table style="width:100%;border-collapse:collapse;min-width:650px">
            <thead>
                <tr style="background:#faf9fb">
                    <th style="text-align:left;padding:14px 20px;font-size:12px;color:#777">Nama Kategori</th>
                    <th style="text-align:left;padding:14px 20px;font-size:12px;color:#777">Slug</th>
                    <th style="text-align:center;padding:14px 20px;font-size:12px;color:#777">Jumlah Artikel</th>
                    <th style="text-align:left;padding:14px 20px;font-size:12px;color:#777">Tanggal Dibuat</th>
                    <th style="text-align:right;padding:14px 20px;font-size:12px;color:#777">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($categories as $category)
                    <tr style="border-top:1px solid #f0edf0">
                        <td style="padding:16px 20px">
                            <a href="{{ route('admin.categories.show', $category) }}"
                               style="font-size:13px;font-weight:700;color:#242124;text-decoration:none">
                                {{ $category->name }}
                            </a>

                            @if($category->description)
                                <div style="font-size:11px;color:#858085;margin-top:5px">
                                    {{ Str::limit($category->description, 65) }}
                                </div>
                            @endif
                        </td>

                        <td style="padding:16px 20px;font-size:12px;color:#777">
                            {{ $category->slug }}
                        </td>

                        <td style="padding:16px 20px;text-align:center">
                            <span style="background:#f9edfa;color:#7F0079;padding:5px 10px;border-radius:20px;font-size:11px;font-weight:700">
                                {{ $category->articles_count }} Artikel
                            </span>
                        </td>

                        <td style="padding:16px 20px;font-size:12px;color:#777">
                            {{ $category->created_at->format('d M Y') }}
                        </td>

                        <td style="padding:16px 20px;text-align:right;white-space:nowrap">
                            <a href="{{ route('admin.categories.show', $category) }}"
                               style="color:#777;text-decoration:none;margin-right:10px">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('admin.categories.edit', $category) }}"
                               style="color:#7F0079;text-decoration:none;margin-right:10px">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('admin.categories.destroy', $category) }}"
                                  method="POST"
                                  style="display:inline"
                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        style="border:0;background:none;color:#d94a55;cursor:pointer;padding:0">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center;padding:45px 20px;color:#858085;font-size:13px">
                            <i class="bi bi-folder2-open" style="font-size:30px;display:block;margin-bottom:10px"></i>
                            Belum ada kategori.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="padding:18px 20px;border-top:1px solid #eee9ee">
        {{ $categories->links() }}
    </div>

</div>

@endsection