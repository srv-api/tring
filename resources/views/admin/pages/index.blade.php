
@extends('admin.layouts.app')

@section('title', 'Halaman - Tring CMS')
@section('page-title', 'Halaman')

@section('content')

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:22px;gap:10px;flex-wrap:wrap;">
    <div>
        <h1 style="font-size:23px;margin-bottom:7px;">Halaman Website</h1>
        <p style="font-size:12px;color:#858085;">Kelola halaman statis website Tring.</p>
    </div>

    <a href="{{ route('admin.pages.create') }}"
       style="background:#7F0079;color:white;padding:11px 15px;border-radius:7px;font-size:12px;">
        <i class="bi bi-plus-lg"></i> Tambah Halaman
    </a>
</div>

<div style="background:white;border:1px solid #eee9ee;border-radius:11px;padding:22px;">

    <form method="GET"
          action="{{ route('admin.pages.index') }}"
          style="display:flex;gap:10px;margin-bottom:20px;flex-wrap:wrap;">

        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Cari halaman..."
               style="padding:10px 12px;border:1px solid #eee9ee;border-radius:7px;font-size:12px;outline:none;min-width:200px;">

        <select name="status"
                style="padding:10px 12px;border:1px solid #eee9ee;border-radius:7px;font-size:12px;outline:none;">
            <option value="">Semua Status</option>
            <option value="published" @selected(request('status') === 'published')>Published</option>
            <option value="draft" @selected(request('status') === 'draft')>Draft</option>
        </select>

        <button type="submit"
                style="background:#7F0079;color:white;border:0;padding:10px 15px;border-radius:7px;font-size:12px;cursor:pointer;">
            <i class="bi bi-search"></i> Cari
        </button>

        <a href="{{ route('admin.pages.index') }}"
           style="background:#f5f3f5;color:#555;padding:10px 15px;border-radius:7px;font-size:12px;">
            Reset
        </a>
    </form>

    <div style="overflow-x:auto;">
        <table style="width:100%;border-collapse:collapse;font-size:12px;min-width:650px;">
            <thead>
                <tr style="background:#faf9fa;text-align:left;">
                    <th style="padding:13px;">Judul</th>
                    <th style="padding:13px;">Slug</th>
                    <th style="padding:13px;">Penulis</th>
                    <th style="padding:13px;">Status</th>
                    <th style="padding:13px;">Tanggal</th>
                    <th style="padding:13px;text-align:right;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($pages as $page)
                    <tr style="border-top:1px solid #eee9ee;">
                        <td style="padding:13px;">
                            <strong>{{ $page->title }}</strong>
                        </td>

                        <td style="padding:13px;color:#858085;">
                            {{ $page->slug }}
                        </td>

                        <td style="padding:13px;">
                            {{ $page->user?->name ?? '-' }}
                        </td>

                        <td style="padding:13px;">
                            @if($page->status === 'published')
                                <span style="background:#eaf8ef;color:#237a42;padding:5px 9px;border-radius:5px;font-size:10px;font-weight:700;">
                                    Published
                                </span>
                            @else
                                <span style="background:#f1f1f1;color:#777;padding:5px 9px;border-radius:5px;font-size:10px;font-weight:700;">
                                    Draft
                                </span>
                            @endif
                        </td>

                        <td style="padding:13px;color:#858085;">
                            {{ $page->created_at->format('d M Y') }}
                        </td>

                        <td style="padding:13px;text-align:right;white-space:nowrap;">
                            <a href="{{ route('admin.pages.show', $page) }}"
                               style="color:#777;margin-right:9px;">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('admin.pages.edit', $page) }}"
                               style="color:#7F0079;margin-right:9px;">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('admin.pages.destroy', $page) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Yakin ingin menghapus halaman ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        style="border:0;background:none;color:#dc3545;cursor:pointer;">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding:30px;text-align:center;color:#858085;">
                            Belum ada halaman.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:20px;">
        {{ $pages->links() }}
    </div>

</div>

@endsection
