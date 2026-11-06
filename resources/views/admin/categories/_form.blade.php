@php
    $category = $category ?? null;
@endphp

<style>
    .category-field {
        margin-bottom: 20px;
    }

    .category-field label {
        display: block;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
        color: #242124;
    }

    .category-input {
        width: 100%;
        box-sizing: border-box;
        padding: 12px 13px;
        border: 1px solid #e8e3e8;
        border-radius: 8px;
        font-family: inherit;
        font-size: 13px;
        color: #242124;
        outline: none;
        background: white;
    }

    .category-input:focus {
        border-color: #7F0079;
    }

    .category-error {
        color: #d94a55;
        font-size: 11px;
        margin-top: 6px;
    }

    .category-button {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        border: 0;
        background: #7F0079;
        color: white;
        padding: 11px 17px;
        border-radius: 8px;
        font-family: inherit;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
    }

    .category-cancel {
        display: inline-flex;
        align-items: center;
        padding: 11px 17px;
        border: 1px solid #e8e3e8;
        border-radius: 8px;
        color: #555;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
    }
</style>

<div style="background:white;border:1px solid #eee9ee;border-radius:11px;padding:25px;max-width:850px">

    <div class="category-field">
        <label for="name">Nama Kategori <span style="color:#d94a55">*</span></label>

        <input
            type="text"
            id="name"
            name="name"
            class="category-input"
            value="{{ old('name', $category->name ?? '') }}"
            placeholder="Contoh: Berita, Teknologi, Tips"
            required
        >

        @error('name')
            <div class="category-error">{{ $message }}</div>
        @enderror
    </div>

    <div class="category-field">
        <label for="slug">Slug</label>

        <input
            type="text"
            id="slug"
            name="slug"
            class="category-input"
            value="{{ old('slug', $category->slug ?? '') }}"
            placeholder="Contoh: berita-terbaru"
        >

        <div style="font-size:11px;color:#858085;margin-top:7px">
            Slug dibuat otomatis dari nama kategori jika dikosongkan.
        </div>

        @error('slug')
            <div class="category-error">{{ $message }}</div>
        @enderror
    </div>

    <div class="category-field">
        <label for="description">Deskripsi</label>

        <textarea
            id="description"
            name="description"
            class="category-input"
            rows="5"
            placeholder="Tuliskan deskripsi kategori..."
            style="resize:vertical"
        >{{ old('description', $category->description ?? '') }}</textarea>

        @error('description')
            <div class="category-error">{{ $message }}</div>
        @enderror
    </div>

    <div style="display:flex;gap:10px;flex-wrap:wrap;padding-top:10px;border-top:1px solid #eee9ee">
        <button type="submit" class="category-button">
            <i class="bi bi-check-lg"></i>
            {{ $category ? 'Simpan Perubahan' : 'Simpan Kategori' }}
        </button>

        <a href="{{ route('admin.categories.index') }}" class="category-cancel">
            Batal
        </a>
    </div>

</div>

<script>
    const categoryName = document.getElementById('name');
    const categorySlug = document.getElementById('slug');

    let slugManuallyEdited = categorySlug.value.trim() !== '';

    categorySlug.addEventListener('input', function () {
        slugManuallyEdited = this.value.trim() !== '';
    });

    categoryName.addEventListener('input', function () {
        if (!slugManuallyEdited) {
            categorySlug.value = this.value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        }
    });
</script>