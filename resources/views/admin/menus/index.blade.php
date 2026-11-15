 @extends('admin.layouts.app')

@section('title', 'Menu Navigasi')
@section('page-title', 'Menu Navigasi')

@section('content')

<style>
    .menu-page { color: #25212b; }
    .menu-card {
        background: #fff;
        border: 1px solid #eee;
        border-radius: 12px;
        overflow: hidden;
    }
    .menu-table th {
        background: #faf9fb;
        color: #777;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        padding: 15px 20px;
        border-bottom: 1px solid #eee;
    }
    .menu-table td {
        padding: 16px 20px;
        vertical-align: middle;
        font-size: 14px;
        border-bottom: 1px solid #f1f1f1;
    }
    .menu-icon {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        background: #f9edfa;
        color: #7F0079;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }
    .menu-name { font-weight: 700; color: #29232e; }
    .menu-slug { font-size: 12px; color: #999; }
    .menu-status {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }
    .menu-status.active {
        color: #16865a;
        background: #e8f7ef;
    }
    .menu-status.inactive {
        color: #999;
        background: #f1f1f1;
    }
    .menu-action {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #eee;
        border-radius: 8px;
        color: #666;
        background: white;
        text-decoration: none;
    }
    .menu-action:hover {
        color: #7F0079;
        border-color: #7F0079;
    }
    .menu-btn {
        background: #7F0079;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 10px 16px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
    }
    .menu-btn:hover { background: #650061; color: #fff; }
</style>

<div class="menu-page">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h5 class="fw-bold mb-1">Menu Navigasi</h5>
            <p class="text-muted small mb-0">
                Kelola menu dan tautan navigasi website Tring.id.
            </p>
        </div>

        <a href="{{ route('admin.menus.create') }}" class="menu-btn">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Menu
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="menu-card">

        <div class="p-3 border-bottom">
            <h6 class="fw-bold mb-0">Daftar Menu Website</h6>
            <small class="text-muted">Semua grup navigasi yang tersedia.</small>
        </div>

        <div class="table-responsive">
            <table class="table menu-table mb-0">
                <thead>
                    <tr>
                        <th>Nama Menu</th>
                        <th>Lokasi</th>
                        <th>Jumlah Item</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($menus as $menu)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="menu-icon">
                                        <i class="bi bi-list-nested"></i>
                                    </div>

                                    <div>
                                        <div class="menu-name">
                                            {{ $menu->name }}
                                        </div>
                                        <div class="menu-slug">
                                            {{ $menu->slug }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                {{ $menu->location ?: 'Belum ditentukan' }}
                            </td>

                            <td>
                                <span class="badge bg-light text-dark border">
                                    {{ $menu->items_count }} Item
                                </span>
                            </td>

                            <td>
                                @if($menu->is_active)
                                    <span class="menu-status active">
                                        Aktif
                                    </span>
                                @else
                                    <span class="menu-status inactive">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td class="text-end">
                                <a href="{{ route('admin.menus.edit', $menu->id) }}"
                                   class="menu-action"
                                   title="Edit menu">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('admin.menus.destroy', $menu->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus menu ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="menu-action"
                                            title="Hapus menu">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <i class="bi bi-menu-button-wide fs-1 text-muted"></i>
                                <h6 class="fw-bold mt-3">Belum Ada Menu</h6>
                                <p class="text-muted small">
                                    Silakan buat menu navigasi pertama kamu.
                                </p>
                                <a href="{{ route('admin.menus.create') }}"
                                   class="menu-btn">
                                    Tambah Menu
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($menus->hasPages())
            <div class="p-3">
                {{ $menus->links() }}
            </div>
        @endif

    </div>
</div>

@endsection