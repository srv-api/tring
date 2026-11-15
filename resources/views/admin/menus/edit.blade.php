@extends('admin.layouts.app')

@section('title', 'Edit Menu Navigasi')
@section('page-title', 'Edit Menu Navigasi')

@section('content')

<style>
    .menu-editor {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 310px;
        gap: 20px;
        align-items: start;
    }

    .editor-card {
        background: white;
        border: 1px solid #eee;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .editor-header {
        padding: 18px 20px;
        border-bottom: 1px solid #eee;
    }

    .editor-body {
        padding: 20px;
    }

    .editor-title {
        font-size: 15px;
        font-weight: 750;
        margin-bottom: 4px;
    }

    .editor-description {
        font-size: 12px;
        color: #999;
        margin: 0;
    }

    .editor-label {
        font-size: 12px;
        font-weight: 700;
        color: #49424e;
        margin-bottom: 7px;
    }

    .editor-control {
        font-size: 13px;
        border: 1px solid #e8e5e9;
        border-radius: 8px;
        padding: 10px 12px;
    }

    .editor-control:focus {
        border-color: #7F0079;
        box-shadow: 0 0 0 3px #7f007915;
    }

    .item-box {
        border: 1px solid #eae7ec;
        border-radius: 10px;
        margin-bottom: 12px;
        background: #fff;
        overflow: hidden;
    }

    .item-top {
        background: #faf9fb;
        border-bottom: 1px solid #eee;
        padding: 12px 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .item-number {
        font-size: 12px;
        font-weight: 750;
        color: #7F0079;
    }

    .item-content {
        padding: 16px;
    }

    .item-remove {
        background: #fff0f0;
        color: #d94a55;
        border: 0;
        border-radius: 7px;
        width: 32px;
        height: 32px;
    }

    .item-remove:hover {
        background: #d94a55;
        color: white;
    }

    .drag-handle {
        color: #aaa;
        cursor: grab;
        font-size: 16px;
    }

    .add-item-btn {
        width: 100%;
        background: #f9edfa;
        color: #7F0079;
        border: 1px dashed #cda4cb;
        padding: 12px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 700;
    }

    .add-item-btn:hover {
        background: #f3e1f4;
    }

    .save-btn {
        background: #7F0079;
        color: #fff;
        border: 0;
        border-radius: 8px;
        padding: 11px 20px;
        font-size: 13px;
        font-weight: 700;
    }

    .save-btn:hover {
        background: #650061;
    }

    .info-box {
        background: #f9edfa;
        border-radius: 9px;
        padding: 14px;
        color: #6c1768;
        font-size: 12px;
        line-height: 1.7;
    }

    .item-box.dragging {
        opacity: .45;
    }

    @media(max-width: 900px) {
        .menu-editor {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width: 576px) {
        .editor-body {
            padding: 14px;
        }

        .item-content {
            padding: 12px;
        }
    }
</style>

<div class="mb-4">
    <a href="{{ route('admin.menus.index') }}"
       class="text-decoration-none text-muted small">
        <i class="bi bi-arrow-left me-1"></i>
        Kembali ke Menu Navigasi
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <strong>Periksa kembali data berikut:</strong>
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.menus.update', $menu->id) }}"
      method="POST"
      id="menuForm">

    @csrf
    @method('PUT')

    <div class="menu-editor">

        {{-- KOLOM KIRI --}}
        <div>

            {{-- PENGATURAN ITEM --}}
            <div class="editor-card">

                <div class="editor-header">
                    <div class="editor-title">Struktur Menu</div>
                    <p class="editor-description">
                        Tambahkan dan atur tautan navigasi website.
                    </p>
                </div>

                <div class="editor-body">

                    <div id="menuItems">

                        @foreach($menu->items as $index => $item)

                            <div class="item-box" draggable="true">

                                <div class="item-top">

                                    <div class="d-flex align-items-center gap-3">
                                        <i class="bi bi-grip-vertical drag-handle"></i>

                                        <span class="item-number">
                                            Item Navigasi
                                        </span>
                                    </div>

                                    <button type="button"
                                            class="item-remove"
                                            onclick="removeItem(this)"
                                            title="Hapus item">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </div>

                                <div class="item-content">

                                    <input type="hidden"
                                           name="items[{{ $index }}][id]"
                                           value="{{ $item->id }}">

                                    <div class="row g-3">

                                        <div class="col-md-6">
                                            <label class="editor-label">
                                                Nama Menu
                                            </label>

                                            <input type="text"
                                                   name="items[{{ $index }}][label]"
                                                   class="form-control editor-control"
                                                   value="{{ $item->label }}"
                                                   placeholder="Contoh: Beranda"
                                                   required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="editor-label">
                                                URL Tujuan
                                            </label>

                                            <input type="text"
                                                   name="items[{{ $index }}][url]"
                                                   class="form-control editor-control"
                                                   value="{{ $item->url }}"
                                                   placeholder="/blog atau https://example.com">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="editor-label">
                                                Target Link
                                            </label>

                                            <select name="items[{{ $index }}][target]"
                                                    class="form-select editor-control">

                                                <option value="_self"
                                                    {{ $item->target == '_self' ? 'selected' : '' }}>
                                                    Tab yang sama
                                                </option>

                                                <option value="_blank"
                                                    {{ $item->target == '_blank' ? 'selected' : '' }}>
                                                    Tab baru
                                                </option>

                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="editor-label">
                                                Status
                                            </label>

                                            <select name="items[{{ $index }}][is_active]"
                                                    class="form-select editor-control">

                                                <option value="1"
                                                    {{ $item->is_active ? 'selected' : '' }}>
                                                    Aktif
                                                </option>

                                                <option value="0"
                                                    {{ !$item->is_active ? 'selected' : '' }}>
                                                    Nonaktif
                                                </option>

                                            </select>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                    <button type="button"
                            class="add-item-btn"
                            onclick="addItem()">

                        <i class="bi bi-plus-circle me-2"></i>
                        Tambahkan Item Navigasi

                    </button>

                </div>

            </div>

        </div>

        {{-- KOLOM KANAN --}}
        <div>

            {{-- INFORMASI MENU --}}
            <div class="editor-card">

                <div class="editor-header">
                    <div class="editor-title">Pengaturan Menu</div>
                    <p class="editor-description">
                        Informasi grup navigasi.
                    </p>
                </div>

                <div class="editor-body">

                    <div class="mb-3">
                        <label class="editor-label">Nama Menu</label>

                        <input type="text"
                               name="name"
                               class="form-control editor-control"
                               value="{{ old('name', $menu->name) }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="editor-label">Lokasi Menu</label>

                        <select name="location"
                                class="form-select editor-control">

                            <option value="">Pilih lokasi</option>

                            <option value="header"
                                {{ $menu->location == 'header' ? 'selected' : '' }}>
                                Header
                            </option>

                            <option value="footer"
                                {{ $menu->location == 'footer' ? 'selected' : '' }}>
                                Footer
                            </option>

                            <option value="sidebar"
                                {{ $menu->location == 'sidebar' ? 'selected' : '' }}>
                                Sidebar
                            </option>

                            <option value="other"
                                {{ $menu->location == 'other' ? 'selected' : '' }}>
                                Lainnya
                            </option>

                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="editor-label">Status Menu</label>

                        <select name="is_active"
                                class="form-select editor-control">

                            <option value="1"
                                {{ $menu->is_active ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="0"
                                {{ !$menu->is_active ? 'selected' : '' }}>
                                Nonaktif
                            </option>

                        </select>
                    </div>

                    <button type="submit" class="save-btn w-100">
                        <i class="bi bi-check-lg me-1"></i>
                        Simpan Perubahan
                    </button>

                </div>

            </div>

            {{-- INFORMASI --}}
            <div class="editor-card">
                <div class="editor-body">

                    <div class="info-box">
                        <div class="fw-bold mb-2">
                            <i class="bi bi-info-circle me-1"></i>
                            Informasi
                        </div>

                        <div>
                            • Item dapat diurutkan dengan menarik ikon
                            pegangan.
                        </div>

                        <div>
                            • Item nonaktif tidak ditampilkan di website.
                        </div>

                        <div>
                            • URL dapat menggunakan alamat internal maupun
                            eksternal.
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</form>

<script>
    let itemIndex = {{ $menu->items->count() }};

    function addItem() {

        const container = document.getElementById('menuItems');

        const html = `
            <div class="item-box" draggable="true">

                <div class="item-top">

                    <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-grip-vertical drag-handle"></i>

                        <span class="item-number">
                            Item Navigasi
                        </span>
                    </div>

                    <button type="button"
                            class="item-remove"
                            onclick="removeItem(this)">
                        <i class="bi bi-trash"></i>
                    </button>

                </div>

                <div class="item-content">

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="editor-label">Nama Menu</label>

                            <input type="text"
                                   name="items[${itemIndex}][label]"
                                   class="form-control editor-control"
                                   placeholder="Contoh: Beranda"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="editor-label">URL Tujuan</label>

                            <input type="text"
                                   name="items[${itemIndex}][url]"
                                   class="form-control editor-control"
                                   placeholder="/blog atau https://example.com">
                        </div>

                        <div class="col-md-6">
                            <label class="editor-label">Target Link</label>

                            <select name="items[${itemIndex}][target]"
                                    class="form-select editor-control">

                                <option value="_self">Tab yang sama</option>
                                <option value="_blank">Tab baru</option>

                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="editor-label">Status</label>

                            <select name="items[${itemIndex}][is_active]"
                                    class="form-select editor-control">

                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>

                            </select>
                        </div>

                    </div>

                </div>

            </div>
        `;

        container.insertAdjacentHTML('beforeend', html);

        itemIndex++;
    }

    function removeItem(button) {

        if (!confirm('Hapus item navigasi ini?')) {
            return;
        }

        button.closest('.item-box').remove();
    }

    // Drag and drop untuk mengatur urutan menu.
    const container = document.getElementById('menuItems');

    let draggedItem = null;

    container.addEventListener('dragstart', function(e) {

        const item = e.target.closest('.item-box');

        if (!item) return;

        draggedItem = item;
        item.classList.add('dragging');

    });

    container.addEventListener('dragend', function() {

        if (draggedItem) {
            draggedItem.classList.remove('dragging');
        }

        draggedItem = null;

    });

    container.addEventListener('dragover', function(e) {

        e.preventDefault();

        if (!draggedItem) return;

        const afterElement = getDragAfterElement(container, e.clientY);

        if (afterElement == null) {
            container.appendChild(draggedItem);
        } else {
            container.insertBefore(draggedItem, afterElement);
        }

    });

    function getDragAfterElement(container, y) {

        const elements = [
            ...container.querySelectorAll('.item-box:not(.dragging)')
        ];

        return elements.reduce((closest, child) => {

            const box = child.getBoundingClientRect();

            const offset = y - box.top - box.height / 2;

            if (offset < 0 && offset > closest.offset) {
                return {
                    offset: offset,
                    element: child
                };
            }

            return closest;

        }, {
            offset: Number.NEGATIVE_INFINITY
        }).element;

    }
</script>

@endsection