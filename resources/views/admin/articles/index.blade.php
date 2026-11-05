
@extends('admin.layouts.app')

@section('title', 'Artikel - Tring CMS')
@section('page-title', 'Artikel / Berita')

@section('content')

<style>
    .page-heading {
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:15px;
        margin-bottom:25px;
    }

    .page-heading h1 {
        font-size:23px;
        margin-bottom:7px;
    }

    .page-heading p {
        color:#858085;
        font-size:12px;
    }

    .btn {
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:7px;
        padding:10px 15px;
        border-radius:7px;
        border:1px solid #eee9ee;
        font-size:12px;
        font-weight:600;
        cursor:pointer;
        font-family:inherit;
    }

    .btn-primary {
        background:#7F0079;
        color:white;
        border-color:#7F0079;
    }

    .btn-light { background:white; color:#555; }

    .table-panel {
        background:white;
        border:1px solid #eee9ee;
        border-radius:11px;
        overflow:hidden;
    }

    .filters {
        display:flex;
        justify-content:space-between;
        gap:12px;
        padding:18px;
        border-bottom:1px solid #eee9ee;
    }

    .filters form { display:flex; gap:9px; width:100%; }

    .form-control {
        padding:10px 12px;
        border:1px solid #e9e4e9;
        border-radius:7px;
        font:inherit;
        font-size:12px;
        outline:none;
        background:white;
    }

    .form-control:focus {
        border-color:#7F0079;
    }

    .search-input { width:100%; max-width:320px; }

    .table-wrap { overflow-x:auto; }

    table {
        width:100%;
        border-collapse:collapse;
        min-width:800px;
    }

    th {
        background:#fbfafb;
        color:#858085;
        font-size:10px;
        text-transform:uppercase;
        letter-spacing:.5px;
        text-align:left;
        padding:15px;
    }

    td {
        padding:14px 15px;
        border-top:1px solid #f1edf1;
        font-size:12px;
    }

    .article-title { font-weight:600; color:#292329; }

    .article-slug {
        color:#aaa;
        font-size:10px;
        margin-top:5px;
    }

    .thumbnail {
        width:55px;
        height:43px;
        object-fit:cover;
        border-radius:6px;
        background:#f5f1f5;
    }

    .status {
        display:inline-block;
        padding:5px 9px;
        border-radius:20px;
        font-size:10px;
        font-weight:600;
    }

    .status-published { background:#e8f7ee; color:#20965a; }
    .status-draft { background:#fff2e5; color:#dc872b; }

    .actions { display:flex; gap:6px; }

    .action-btn {
        width:30px;
        height:30px;
        display:grid;
        place-items:center;
        border:1px solid #eee9ee;
        border-radius:6px;
        background:white;
        cursor:pointer;
        color:#666;
    }

    .action-btn:hover { color:#7F0079; border-color:#7F0079; }

    .action-delete { color:#d94a55; }

    .empty {
        text-align:center;
        padding:45px 15px;
        color:#999;
    }

    .pagination {
        padding:15px;
        border-top:1px solid #eee9ee;
    }

    @media(max-width:600px) {
        .page-heading { align-items:flex-start; flex-direction:column; }
        .filters form { flex-wrap:wrap; }
        .search-input { max-width:none; }
    }
</style>

<div class="page-heading">
    <div>
        <h1>Artikel / Berita</h1>
        <p>Kelola seluruh artikel dan berita website Tring.</p>
    </div>

    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Artikel
    </a>
</div>

<div class="table-panel">

    <div class="filters">
        <form action="{{ route('admin.articles.index') }}" method="GET">

            <input
                type="text"
                name="search"
                class="form-control search-input"
                placeholder="Cari judul artikel..."
                value="{{ request('search') }}"
            >

            <select name="status" class="form-control">
                <option value="">Semua Status</option>
                <option value="published" @selected(request('status') === 'published')>
                    Published
                </option>
                <option value="draft" @selected(request('status') === 'draft')>
                    Draft
                </option>
            </select>

            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i> Cari
            </button>

            <a href="{{ route('admin.articles.index') }}" class="btn btn-light">
                Reset
            </a>

        </form>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Thumbnail</th>
                    <th>Artikel</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($articles as $article)
                    <tr>
                        <td>
                            @if($article->thumbnail)
                                <img
                                    src="{{ asset('storage/'.$article->thumbnail) }}"
                                    class="thumbnail"
                                    alt="{{ $article->title }}"
                                >
                            @else
                                <div class="thumbnail"
                                     style="display:grid;place-items:center;">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                        </td>

                        <td>
                            <div class="article-title">{{ $article->title }}</div>
                            <div class="article-slug">{{ $article->slug }}</div>
                        </td>

                        <td>{{ $article->category?->name ?? '-' }}</td>

                        <td>{{ $article->user?->name ?? '-' }}</td>

                        <td>
                            <span class="status status-{{ $article->status }}">
                                {{ ucfirst($article->status) }}
                            </span>
                        </td>

                        <td>
                            {{ $article->created_at->format('d M Y') }}
                        </td>

                        <td>
                            <div class="actions">

                                <a href="{{ route('admin.articles.show', $article) }}"
                                   class="action-btn" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('admin.articles.edit', $article) }}"
                                   class="action-btn" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form
                                    action="{{ route('admin.articles.destroy', $article) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus artikel ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="action-btn action-delete"
                                            title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <div class="empty">
                                <i class="bi bi-newspaper"
                                   style="font-size:30px;"></i>
                                <p style="margin-top:10px;">
                                    Belum ada artikel.
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $articles->links() }}
    </div>

</div>

@endsection
