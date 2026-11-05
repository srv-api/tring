
@php
    $editing = isset($article);
@endphp

<style>
    .form-panel {
        background:white;
        border:1px solid #eee9ee;
        border-radius:11px;
        padding:24px;
        margin-bottom:18px;
    }

    .form-section-title {
        font-size:14px;
        font-weight:700;
        margin-bottom:20px;
    }

    .form-grid {
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:18px;
    }

    .field { margin-bottom:18px; }

    .field label {
        display:block;
        font-size:12px;
        font-weight:600;
        margin-bottom:8px;
    }

    .field input,
    .field textarea,
    .field select {
        width:100%;
        padding:11px 12px;
        border:1px solid #e9e4e9;
        border-radius:7px;
        font:inherit;
        font-size:12px;
        outline:none;
        background:white;
    }

    .field textarea { resize:vertical; }

    .field input:focus,
    .field textarea:focus,
    .field select:focus {
        border-color:#7F0079;
    }

    .field small {
        display:block;
        margin-top:6px;
        color:#999;
        font-size:10px;
    }

    .field-error {
        color:#d94a55;
        font-size:11px;
        margin-top:6px;
    }

    .form-actions {
        display:flex;
        justify-content:flex-end;
        gap:10px;
    }

    .btn {
        padding:11px 17px;
        border-radius:7px;
        border:1px solid #eee9ee;
        font:inherit;
        font-size:12px;
        font-weight:600;
        cursor:pointer;
    }

    .btn-primary { background:#7F0079; color:white; border-color:#7F0079; }
    .btn-light { background:white; color:#555; }

    .thumbnail-preview {
        width:150px;
        height:110px;
        object-fit:cover;
        border-radius:8px;
        margin-top:12px;
        border:1px solid #eee;
    }

    @media(max-width:650px) {
        .form-grid { grid-template-columns:1fr; }
        .form-panel { padding:17px; }
    }
</style>

<div class="form-panel">

    <div class="form-section-title">
        <i class="bi bi-file-text"></i>
        Informasi Artikel
    </div>

    <div class="field">
        <label>Judul Artikel *</label>
        <input
            type="text"
            name="title"
            value="{{ old('title', $article->title ?? '') }}"
            placeholder="Masukkan judul artikel"
            required
        >
        @error('title') <div class="field-error">{{ $message }}</div> @enderror
    </div>

    <div class="field">
        <label>Slug URL</label>
        <input
            type="text"
            name="slug"
            value="{{ old('slug', $article->slug ?? '') }}"
            placeholder="Otomatis dari judul jika dikosongkan"
        >
        <small>Contoh: berita-terbaru-tring</small>
        @error('slug') <div class="field-error">{{ $message }}</div> @enderror
    </div>

    <div class="form-grid">
        <div class="field">
            <label>Kategori</label>
            <select name="category_id">
                <option value="">Tanpa Kategori</option>

                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @selected(old('category_id', $article->category_id ?? '') == $category->id)
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <div class="field-error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label>Status Publikasi *</label>
            <select name="status" required>
                <option value="draft"
                    @selected(old('status', $article->status ?? 'draft') === 'draft')>
                    Draft
                </option>

                <option value="published"
                    @selected(old('status', $article->status ?? '') === 'published')>
                    Published
                </option>
            </select>
            @error('status') <div class="field-error">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="field">
        <label>Ringkasan Artikel</label>
        <textarea
            name="excerpt"
            rows="3"
            placeholder="Ringkasan singkat artikel..."
        >{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
        @error('excerpt') <div class="field-error">{{ $message }}</div> @enderror
    </div>

    <div class="field">
        <label>Konten Artikel *</label>
        <textarea
            name="content"
            rows="14"
            placeholder="Tulis isi artikel..."
            required
        >{{ old('content', $article->content ?? '') }}</textarea>
        @error('content') <div class="field-error">{{ $message }}</div> @enderror
    </div>

</div>

<div class="form-panel">

    <div class="form-section-title">
        <i class="bi bi-image"></i>
        Thumbnail Artikel
    </div>

    <div class="field">
        <label>Upload Gambar</label>
        <input
            type="file"
            name="thumbnail"
            accept="image/jpeg,image/png,image/webp"
        >

        <small>Format JPG, PNG, WEBP. Maksimal 2 MB.</small>

        @error('thumbnail') <div class="field-error">{{ $message }}</div> @enderror

        @if($editing && $article->thumbnail)
            <img
                src="{{ asset('storage/'.$article->thumbnail) }}"
                class="thumbnail-preview"
                alt="Thumbnail artikel"
            >
        @endif
    </div>

</div>

<div class="form-panel">

    <div class="form-section-title">
        <i class="bi bi-search"></i>
        Pengaturan SEO
    </div>

    <div class="field">
        <label>SEO Title</label>
        <input
            type="text"
            name="seo_title"
            value="{{ old('seo_title', $article->seo_title ?? '') }}"
            placeholder="Judul untuk mesin pencari"
        >
        @error('seo_title') <div class="field-error">{{ $message }}</div> @enderror
    </div>

    <div class="field">
        <label>SEO Description</label>
        <textarea
            name="seo_description"
            rows="3"
            placeholder="Deskripsi untuk mesin pencari"
        >{{ old('seo_description', $article->seo_description ?? '') }}</textarea>
        @error('seo_description') <div class="field-error">{{ $message }}</div> @enderror
    </div>

    <div class="field">
        <label>SEO Keywords</label>
        <input
            type="text"
            name="seo_keywords"
            value="{{ old('seo_keywords', $article->seo_keywords ?? '') }}"
            placeholder="tring, berita, informasi"
        >
        @error('seo_keywords') <div class="field-error">{{ $message }}</div> @enderror
    </div>

</div>

<div class="form-actions">
    <a href="{{ route('admin.articles.index') }}" class="btn btn-light">
        Batal
    </a>

    <button type="submit" class="btn btn-primary">
        <i class="bi bi-save"></i>
        {{ $editing ? 'Simpan Perubahan' : 'Simpan Artikel' }}
    </button>
</div>
