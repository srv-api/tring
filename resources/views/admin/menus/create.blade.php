@extends('admin.layouts.app')

@section('title', 'Tambah Menu')
@section('page-title', 'Tambah Menu Navigasi')

@section('content')

<style>
    .menu-form-card {
        background: #fff;
        border: 1px solid #eee;
        border-radius: 12px;
        padding: 25px;
        max-width: 850px;
    }

    .menu-form-label {
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
        color: #39333e;
    }

    .menu-form-control {
        border: 1px solid #e5e3e7;
        border-radius: 8px;
        padding: 11px 13px;
        font-size: 13px;
    }

    .menu-form-control:focus {
        border-color: #7F0079;
        box-shadow: 0 0 0 3px #7f007915;
    }

    .menu-primary-btn {
        background: #7F0079;
        color: white;
        border: 0;
        border-radius: 8px;
        padding: 11px 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .menu-primary-btn:hover {
        background: #650061;
        color: white;
    }
</style>

<div class="mb-4">
    <a href="{{ route('admin.menus.index') }}"
       class="text-decoration-none text-muted small">
        <i class="bi bi-arrow-left me-1"></i>
        Kembali ke Menu Navigasi
    </a>
</div>

<div class="menu-form-card">

    <h5 class="fw-bold mb-1">Tambah Menu Navigasi</h5>

    <p class="text-muted small mb-4">
        Buat grup menu baru untuk website Tring.id.
    </p>

    <form action="{{ route('admin.menus.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="menu-form-label">Nama Menu</label>

            <input type="text"
                   name="name"
                   class="form-control menu-form-control @error('name') is-invalid @enderror"
                   placeholder="Contoh: Menu Utama"
                   value="{{ old('name') }}"
                   required>

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="menu-form-label">Lokasi Menu</label>

            <select name="location"
                    class="form-select menu-form-control">

                <option value="">Pilih lokasi</option>

                <option value="header" {{ old('location') == 'header' ? 'selected' : '' }}>
                    Header / Navigasi Utama
                </option>

                <option value="footer" {{ old('location') == 'footer' ? 'selected' : '' }}>
                    Footer
                </option>

                <option value="sidebar" {{ old('location') == 'sidebar' ? 'selected' : '' }}>
                    Sidebar
                </option>

                <option value="other" {{ old('location') == 'other' ? 'selected' : '' }}>
                    Lainnya
                </option>

            </select>
        </div>

        <div class="mb-4">
            <label class="menu-form-label">Status Menu</label>

            <select name="is_active"
                    class="form-select menu-form-control"
                    required>

                <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>
                    Aktif
                </option>

                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>
                    Nonaktif
                </option>

            </select>
        </div>

        <div class="d-flex justify-content-end gap-2">

            <a href="{{ route('admin.menus.index') }}"
               class="btn btn-light border">
                Batal
            </a>

            <button type="submit" class="menu-primary-btn">
                <i class="bi bi-check-lg me-1"></i>
                Buat Menu
            </button>

        </div>

    </form>

</div>

@endsection