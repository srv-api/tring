
@php
    $editing = isset($article);
    $initialContent = old('content', $article->content ?? '');

    // Konversi teks biasa menjadi paragraf jika belum berbentuk HTML.
    if (
        trim($initialContent) !== '' &&
        $initialContent === strip_tags($initialContent)
    ) {
        $paragraphs = preg_split('/\r\n|\r|\n/', trim($initialContent));

        $initialContent = collect($paragraphs)
            ->filter(fn ($paragraph) => trim($paragraph) !== '')
            ->map(fn ($paragraph) => '<p>' . e(trim($paragraph)) . '</p>')
            ->implode('');
    }
@endphp

<style>
    .form-panel {
        background: white;
        border: 1px solid #eee9ee;
        border-radius: 11px;
        padding: 24px;
        margin-bottom: 18px;
    }

    .form-section-title {
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .field {
        margin-bottom: 18px;
    }

    .field label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .field input,
    .field textarea,
    .field select {
        width: 100%;
        padding: 11px 12px;
        border: 1px solid #e9e4e9;
        border-radius: 7px;
        font: inherit;
        font-size: 12px;
        outline: none;
        background: white;
    }

    .field textarea {
        resize: vertical;
    }

    .field input:focus,
    .field textarea:focus,
    .field select:focus {
        border-color: #7F0079;
    }

    .field small {
        display: block;
        margin-top: 6px;
        color: #999;
        font-size: 10px;
    }

    .field-error {
        color: #d94a55;
        font-size: 11px;
        margin-top: 6px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .btn {
        padding: 11px 17px;
        border-radius: 7px;
        border: 1px solid #eee9ee;
        font: inherit;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-primary {
        background: #7F0079;
        color: white;
        border-color: #7F0079;
    }

    .btn-light {
        background: white;
        color: #555;
    }

    .thumbnail-preview {
        width: 150px;
        height: 110px;
        object-fit: cover;
        border-radius: 8px;
        margin-top: 12px;
        border: 1px solid #eee;
    }

    /* RICH TEXT EDITOR */

    .editor-wrapper {
        border: 1px solid #e5dfe7;
        border-radius: 9px;
        overflow: hidden;
        background: white;
    }

    .editor-toolbar {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 6px;
        padding: 12px;
        background: #faf9fb;
        border-bottom: 1px solid #e9e4e9;
    }

    .toolbar-group {
        display: flex;
        align-items: center;
        gap: 4px;
        padding-right: 8px;
        margin-right: 4px;
        border-right: 1px solid #e5dfe7;
    }

    .toolbar-group:last-child {
        border-right: none;
    }

    .editor-toolbar button {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid transparent;
        border-radius: 5px;
        background: transparent;
        color: #514957;
        cursor: pointer;
        font-size: 14px;
    }

    .editor-toolbar button:hover {
        background: #eee7f0;
        color: #7F0079;
    }

    .editor-toolbar select {
        height: 32px;
        padding: 0 7px;
        border: 1px solid #e5dfe7;
        border-radius: 5px;
        background: white;
        color: #514957;
        font-size: 11px;
        outline: none;
        max-width: 125px;
    }

    .editor-toolbar input[type="color"] {
        width: 32px;
        height: 32px;
        padding: 3px;
        border: 1px solid #e5dfe7;
        border-radius: 5px;
        background: white;
        cursor: pointer;
    }

    .editor-content {
        min-height: 450px;
        padding: 25px;
        outline: none;
        color: #423a48;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.9;
        overflow-wrap: anywhere;
    }

    .editor-content:empty::before {
        content: attr(data-placeholder);
        color: #aaa;
        pointer-events: none;
    }

    .editor-content p {
        margin: 0 0 18px;
    }

    .editor-content h1 {
        font-size: 32px;
        line-height: 1.3;
        margin: 25px 0 15px;
    }

    .editor-content h2 {
        font-size: 26px;
        line-height: 1.4;
        margin: 25px 0 14px;
    }

    .editor-content h3 {
        font-size: 21px;
        line-height: 1.4;
        margin: 22px 0 12px;
    }

    .editor-content ul,
    .editor-content ol {
        padding-left: 25px;
        margin-bottom: 18px;
    }

    .editor-content li {
        margin-bottom: 7px;
    }

    .editor-content blockquote {
        border-left: 4px solid #7F0079;
        background: #faf3fa;
        padding: 15px 20px;
        margin: 20px 0;
        border-radius: 6px;
    }

    .editor-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 12px 0;
    }

    .editor-content table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    .editor-content th,
    .editor-content td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .editor-content th {
        background: #f6f2f7;
    }

    .editor-footer {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        padding: 10px 14px;
        background: #faf9fb;
        border-top: 1px solid #e9e4e9;
        color: #999;
        font-size: 10px;
    }

    @media(max-width: 650px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-panel {
            padding: 17px;
        }

        .editor-content {
            min-height: 350px;
            padding: 16px;
        }

        .editor-toolbar {
            gap: 4px;
        }

        .toolbar-group {
            padding-right: 5px;
            margin-right: 2px;
        }
    }
</style>

{{-- INFORMASI ARTIKEL --}}

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

        @error('title')
            <div class="field-error">{{ $message }}</div>
        @enderror
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

        @error('slug')
            <div class="field-error">{{ $message }}</div>
        @enderror
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

            @error('category_id')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label>Status Publikasi *</label>

            <select name="status" required>
                <option
                    value="draft"
                    @selected(old('status', $article->status ?? 'draft') === 'draft')
                >
                    Draft
                </option>

                <option
                    value="published"
                    @selected(old('status', $article->status ?? '') === 'published')
                >
                    Published
                </option>
            </select>

            @error('status')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="field">
        <label>Ringkasan Artikel</label>

        <textarea
            name="excerpt"
            rows="3"
            placeholder="Ringkasan singkat artikel..."
        >{{ old('excerpt', $article->excerpt ?? '') }}</textarea>

        @error('excerpt')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    {{-- EDITOR KONTEN --}}

    <div class="field">

        <label>Konten Artikel *</label>

        <div class="editor-wrapper">

            <div class="editor-toolbar">

                {{-- HISTORY --}}
                <div class="toolbar-group">
                    <button type="button" data-command="undo" title="Undo">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </button>

                    <button type="button" data-command="redo" title="Redo">
                        <i class="bi bi-arrow-clockwise"></i>
                    </button>
                </div>

                {{-- FORMAT --}}
                <div class="toolbar-group">
                    <select id="formatBlock" title="Format tulisan">
                        <option value="p">Paragraf</option>
                        <option value="h1">Heading 1</option>
                        <option value="h2">Heading 2</option>
                        <option value="h3">Heading 3</option>
                        <option value="blockquote">Kutipan</option>
                    </select>
                </div>

                {{-- FONT --}}
                <div class="toolbar-group">
                    <select id="fontName" title="Jenis font">
                        <option value="Arial">Arial</option>
                        <option value="Inter">Inter</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Verdana">Verdana</option>
                        <option value="Tahoma">Tahoma</option>
                        <option value="Times New Roman">Times New Roman</option>
                    </select>

                    <select id="fontSize" title="Ukuran font">
                        <option value="1">10 px</option>
                        <option value="2">13 px</option>
                        <option value="3" selected>16 px</option>
                        <option value="4">18 px</option>
                        <option value="5">24 px</option>
                        <option value="6">32 px</option>
                        <option value="7">48 px</option>
                    </select>
                </div>

                {{-- TEXT STYLE --}}
                <div class="toolbar-group">

                    <button type="button" data-command="bold" title="Bold">
                        <i class="bi bi-type-bold"></i>
                    </button>

                    <button type="button" data-command="italic" title="Italic">
                        <i class="bi bi-type-italic"></i>
                    </button>

                    <button type="button" data-command="underline" title="Underline">
                        <i class="bi bi-type-underline"></i>
                    </button>

                    <button type="button" data-command="strikeThrough" title="Coret">
                        <i class="bi bi-type-strikethrough"></i>
                    </button>

                </div>

                {{-- COLOR --}}
                <div class="toolbar-group">

                    <input
                        type="color"
                        id="textColor"
                        value="#423a48"
                        title="Warna teks"
                    >

                    <input
                        type="color"
                        id="highlightColor"
                        value="#fff29b"
                        title="Warna highlight"
                    >

                </div>

                {{-- ALIGNMENT --}}
                <div class="toolbar-group">

                    <button type="button" data-command="justifyLeft" title="Rata kiri">
                        <i class="bi bi-text-left"></i>
                    </button>

                    <button type="button" data-command="justifyCenter" title="Rata tengah">
                        <i class="bi bi-text-center"></i>
                    </button>

                    <button type="button" data-command="justifyRight" title="Rata kanan">
                        <i class="bi bi-text-right"></i>
                    </button>

                    <button type="button" data-command="justifyFull" title="Rata kiri kanan">
                        <i class="bi bi-justify"></i>
                    </button>

                </div>

                {{-- LIST --}}
                <div class="toolbar-group">

                    <button type="button" data-command="insertUnorderedList" title="Bullet list">
                        <i class="bi bi-list-ul"></i>
                    </button>

                    <button type="button" data-command="insertOrderedList" title="Numbered list">
                        <i class="bi bi-list-ol"></i>
                    </button>

                </div>

                {{-- INSERT --}}
                <div class="toolbar-group">

                    <button type="button" id="insertLink" title="Tambah link">
                        <i class="bi bi-link-45deg"></i>
                    </button>

                    <button type="button" id="insertImage" title="Tambah gambar">
                        <i class="bi bi-image"></i>
                    </button>

                    <button type="button" id="insertTable" title="Tambah tabel">
                        <i class="bi bi-table"></i>
                    </button>

                    <button type="button" data-command="removeFormat" title="Hapus format">
                        <i class="bi bi-eraser"></i>
                    </button>

                </div>

            </div>

            {{-- AREA PENULISAN --}}

            <div
                id="articleEditor"
                class="editor-content"
                contenteditable="true"
                spellcheck="true"
                data-placeholder="Mulai tulis artikel di sini..."
            ></div>

            {{-- DATA YANG DIKIRIM KE CONTROLLER --}}

            <textarea
                name="content"
                id="articleContent"
                hidden
                required
            >{{ $initialContent }}</textarea>

            <div class="editor-footer">
                <span>Gunakan Enter untuk membuat paragraf baru.</span>
                <span id="wordCount">0 kata</span>
            </div>

        </div>

        @error('content')
            <div class="field-error">{{ $message }}</div>
        @enderror

    </div>

</div>

{{-- THUMBNAIL --}}

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

        @error('thumbnail')
            <div class="field-error">{{ $message }}</div>
        @enderror

        @if($editing && $article->thumbnail)
            <img
                src="{{ asset('storage/'.$article->thumbnail) }}"
                class="thumbnail-preview"
                alt="Thumbnail artikel"
            >
        @endif

    </div>

</div>

{{-- SEO --}}

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

        @error('seo_title')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    <div class="field">
        <label>SEO Description</label>

        <textarea
            name="seo_description"
            rows="3"
            placeholder="Deskripsi untuk mesin pencari"
        >{{ old('seo_description', $article->seo_description ?? '') }}</textarea>

        @error('seo_description')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    <div class="field">
        <label>SEO Keywords</label>

        <input
            type="text"
            name="seo_keywords"
            value="{{ old('seo_keywords', $article->seo_keywords ?? '') }}"
            placeholder="tring, berita, informasi"
        >

        @error('seo_keywords')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

</div>

{{-- ACTION --}}

<div class="form-actions">

    <a href="{{ route('admin.articles.index') }}" class="btn btn-light">
        Batal
    </a>

    <button type="submit" class="btn btn-primary">
        <i class="bi bi-save"></i>
        {{ $editing ? 'Simpan Perubahan' : 'Simpan Artikel' }}
    </button>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const editor = document.getElementById('articleEditor');
    const contentInput = document.getElementById('articleContent');
    const wordCount = document.getElementById('wordCount');

    if (!editor || !contentInput) return;

    // Muat konten yang sudah tersimpan.
    editor.innerHTML = contentInput.value || '';

    let savedRange = null;

    function saveSelection() {
        const selection = window.getSelection();

        if (
            selection &&
            selection.rangeCount > 0 &&
            editor.contains(selection.anchorNode)
        ) {
            savedRange = selection.getRangeAt(0).cloneRange();
        }
    }

    function restoreSelection() {
        editor.focus();

        if (savedRange) {
            const selection = window.getSelection();

            selection.removeAllRanges();
            selection.addRange(savedRange);
        }
    }

    function updateContent() {
        contentInput.value = editor.innerHTML;

        const text = editor.innerText.trim();
        const words = text ? text.split(/\s+/).length : 0;

        wordCount.textContent = words + ' kata';
    }

    function runCommand(command, value = null) {
        restoreSelection();
        document.execCommand(command, false, value);
        saveSelection();
        updateContent();
    }

    // Toolbar buttons.
    document.querySelectorAll('.editor-toolbar [data-command]')
        .forEach(button => {

            button.addEventListener('mousedown', function (event) {
                event.preventDefault();
            });

            button.addEventListener('click', function () {
                runCommand(this.dataset.command);
            });

        });

    // Format heading / paragraph.
    const formatBlock = document.getElementById('formatBlock');

    formatBlock.addEventListener('mousedown', saveSelection);

    formatBlock.addEventListener('change', function () {
        runCommand('formatBlock', this.value);
    });

    // Font family.
    const fontName = document.getElementById('fontName');

    fontName.addEventListener('mousedown', saveSelection);

    fontName.addEventListener('change', function () {
        runCommand('fontName', this.value);
    });

    // Font size.
    const fontSize = document.getElementById('fontSize');

    fontSize.addEventListener('mousedown', saveSelection);

    fontSize.addEventListener('change', function () {
        runCommand('fontSize', this.value);
    });

    // Text color.
    const textColor = document.getElementById('textColor');

    textColor.addEventListener('mousedown', saveSelection);

    textColor.addEventListener('input', function () {
        runCommand('foreColor', this.value);
    });

    // Highlight.
    const highlightColor = document.getElementById('highlightColor');

    highlightColor.addEventListener('mousedown', saveSelection);

    highlightColor.addEventListener('input', function () {
        restoreSelection();

        const success = document.execCommand(
            'hiliteColor',
            false,
            this.value
        );

        if (!success) {
            document.execCommand('backColor', false, this.value);
        }

        saveSelection();
        updateContent();
    });

    // Link.
    document.getElementById('insertLink')
        .addEventListener('mousedown', saveSelection);

    document.getElementById('insertLink')
        .addEventListener('click', function () {

            restoreSelection();

            const url = prompt('Masukkan URL link:');

            if (url) {
                runCommand('createLink', url);
            }
        });

    // Image URL.
    document.getElementById('insertImage')
        .addEventListener('mousedown', saveSelection);

    document.getElementById('insertImage')
        .addEventListener('click', function () {

            restoreSelection();

            const url = prompt('Masukkan URL gambar:');

            if (url) {
                runCommand('insertImage', url);
            }
        });

    // Insert table.
    document.getElementById('insertTable')
        .addEventListener('mousedown', saveSelection);

    document.getElementById('insertTable')
        .addEventListener('click', function () {

            restoreSelection();

            const rows = parseInt(
                prompt('Jumlah baris tabel:', '3')
            );

            const columns = parseInt(
                prompt('Jumlah kolom tabel:', '3')
            );

            if (
                !Number.isInteger(rows) ||
                !Number.isInteger(columns) ||
                rows < 1 ||
                columns < 1 ||
                rows > 20 ||
                columns > 10
            ) {
                return;
            }

            let table = '<table><tbody>';

            for (let i = 0; i < rows; i++) {
                table += '<tr>';

                for (let j = 0; j < columns; j++) {
                    if (i === 0) {
                        table += '<th>Judul</th>';
                    } else {
                        table += '<td>Isi</td>';
                    }
                }

                table += '</tr>';
            }

            table += '</tbody></table><p><br></p>';

            runCommand('insertHTML', table);
        });

    // Track selection.
    editor.addEventListener('keyup', saveSelection);
    editor.addEventListener('mouseup', saveSelection);
    editor.addEventListener('input', function () {
        saveSelection();
        updateContent();
    });

    editor.addEventListener('focus', saveSelection);

    // Simpan HTML ke textarea sebelum form dikirim.
    const form = editor.closest('form');

    if (form) {
        form.addEventListener('submit', function (event) {

            updateContent();

            if (!editor.innerText.trim()) {
                event.preventDefault();
                alert('Konten artikel tidak boleh kosong.');
                editor.focus();
            }

        });
    }

    updateContent();

});
</script>
