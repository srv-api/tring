
@php
    $page = $page ?? null;
@endphp

<div style="display:grid;grid-template-columns:minmax(0,2fr) minmax(250px,1fr);gap:20px;align-items:start;">

    {{-- KOLOM KONTEN --}}
    <div>

        <div style="background:white;border:1px solid #eee9ee;border-radius:11px;padding:24px;margin-bottom:20px;">

            <h3 style="font-size:15px;font-weight:800;margin-bottom:22px;">
                <i class="bi bi-file-text"></i>
                Informasi Halaman
            </h3>

            {{-- JUDUL --}}
            <div style="margin-bottom:20px;">
                <label style="display:block;font-size:12px;font-weight:600;margin-bottom:8px;">
                    Judul Halaman <span style="color:#dc3545;">*</span>
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $page->title ?? '') }}"
                    placeholder="Contoh: Tentang Kami"
                    required
                    style="width:100%;padding:11px 12px;border:1px solid #e9e4e9;border-radius:7px;font-family:inherit;font-size:12px;outline:none;"
                >

                @error('title')
                    <div style="color:#d94a55;font-size:11px;margin-top:6px;">{{ $message }}</div>
                @enderror
            </div>

            {{-- SLUG --}}
            <div style="margin-bottom:20px;">
                <label style="display:block;font-size:12px;font-weight:600;margin-bottom:8px;">
                    Slug URL
                </label>

                <input
                    type="text"
                    name="slug"
                    value="{{ old('slug', $page->slug ?? '') }}"
                    placeholder="tentang-kami"
                    style="width:100%;padding:11px 12px;border:1px solid #e9e4e9;border-radius:7px;font-family:inherit;font-size:12px;outline:none;"
                >

                <small style="display:block;color:#999;font-size:10px;margin-top:7px;">
                    Kosongkan untuk membuat slug otomatis dari judul.
                </small>

                @error('slug')
                    <div style="color:#d94a55;font-size:11px;margin-top:6px;">{{ $message }}</div>
                @enderror
            </div>

            {{-- RINGKASAN --}}
            <div style="margin-bottom:20px;">
                <label style="display:block;font-size:12px;font-weight:600;margin-bottom:8px;">
                    Ringkasan
                </label>

                <textarea
                    name="excerpt"
                    rows="3"
                    placeholder="Deskripsi singkat halaman..."
                    style="width:100%;padding:11px 12px;border:1px solid #e9e4e9;border-radius:7px;font-family:inherit;font-size:12px;outline:none;resize:vertical;"
                >{{ old('excerpt', $page->excerpt ?? '') }}</textarea>

                @error('excerpt')
                    <div style="color:#d94a55;font-size:11px;margin-top:6px;">{{ $message }}</div>
                @enderror
            </div>

            {{-- KONTEN --}}
            <div>
                <label style="display:block;font-size:12px;font-weight:600;margin-bottom:8px;">
                    Konten Halaman <span style="color:#dc3545;">*</span>
                </label>

                <textarea
                    name="content"
                    rows="16"
                    placeholder="Tulis konten halaman..."
                    required
                    style="width:100%;padding:12px;border:1px solid #e9e4e9;border-radius:7px;font-family:inherit;font-size:13px;line-height:1.8;outline:none;resize:vertical;"
                >{{ old('content', $page->content ?? '') }}</textarea>

                @error('content')
                    <div style="color:#d94a55;font-size:11px;margin-top:6px;">{{ $message }}</div>
                @enderror

                <small style="display:block;color:#999;font-size:10px;margin-top:7px;">
                    Konten saat ini disimpan sebagai teks biasa.
                </small>
            </div>

        </div>

        {{-- SEO --}}
        <div style="background:white;border:1px solid #eee9ee;border-radius:11px;padding:24px;">

            <h3 style="font-size:15px;font-weight:800;margin-bottom:22px;">
                <i class="bi bi-google"></i>
                Pengaturan SEO
            </h3>

            <div style="margin-bottom:20px;">
                <label style="display:block;font-size:12px;font-weight:600;margin-bottom:8px;">
                    SEO Title
                </label>

                <input
                    type="text"
                    name="seo_title"
                    value="{{ old('seo_title', $page->seo_title ?? '') }}"
                    placeholder="Judul SEO"
                    style="width:100%;padding:11px 12px;border:1px solid #e9e4e9;border-radius:7px;font-family:inherit;font-size:12px;outline:none;"
                >

                @error('seo_title')
                    <div style="color:#d94a55;font-size:11px;margin-top:6px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:block;font-size:12px;font-weight:600;margin-bottom:8px;">
                    SEO Description
                </label>

                <textarea
                    name="seo_description"
                    rows="3"
                    placeholder="Deskripsi untuk mesin pencari..."
                    style="width:100%;padding:11px 12px;border:1px solid #e9e4e9;border-radius:7px;font-family:inherit;font-size:12px;outline:none;resize:vertical;"
                >{{ old('seo_description', $page->seo_description ?? '') }}</textarea>

                @error('seo_description')
                    <div style="color:#d94a55;font-size:11px;margin-top:6px;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label style="display:block;font-size:12px;font-weight:600;margin-bottom:8px;">
                    SEO Keywords
                </label>

                <textarea
                    name="seo_keywords"
                    rows="2"
                    placeholder="Tring, tentang Tring, pocket manager"
                    style="width:100%;padding:11px 12px;border:1px solid #e9e4e9;border-radius:7px;font-family:inherit;font-size:12px;outline:none;resize:vertical;"
                >{{ old('seo_keywords', $page->seo_keywords ?? '') }}</textarea>

                @error('seo_keywords')
                    <div style="color:#d94a55;font-size:11px;margin-top:6px;">{{ $message }}</div>
                @enderror
            </div>

        </div>

    </div>

    {{-- KOLOM PUBLIKASI --}}
    <div>

        <div style="background:white;border:1px solid #eee9ee;border-radius:11px;padding:22px;">

            <h3 style="font-size:15px;font-weight:800;margin-bottom:20px;">
                <i class="bi bi-send"></i>
                Publikasi
            </h3>

            <div style="margin-bottom:20px;">
                <label style="display:block;font-size:12px;font-weight:600;margin-bottom:8px;">
                    Status
                </label>

                <select
                    name="status"
                    required
                    style="width:100%;padding:11px 12px;border:1px solid #e9e4e9;border-radius:7px;background:white;font-family:inherit;font-size:12px;outline:none;"
                >
                    <option value="draft" @selected(old('status', $page->status ?? 'draft') === 'draft')>
                        Draft
                    </option>

                    <option value="published" @selected(old('status', $page->status ?? 'draft') === 'published')>
                        Published
                    </option>
                </select>

                @error('status')
                    <div style="color:#d94a55;font-size:11px;margin-top:6px;">{{ $message }}</div>
                @enderror
            </div>

            <button
                type="submit"
                style="width:100%;padding:12px;background:#7F0079;color:white;border:1px solid #7F0079;border-radius:7px;font-family:inherit;font-size:12px;font-weight:600;cursor:pointer;"
            >
                <i class="bi bi-save"></i>
                {{ $page ? 'Simpan Perubahan' : 'Simpan Halaman' }}
            </button>

            <a
                href="{{ route('admin.pages.index') }}"
                style="display:block;text-align:center;margin-top:10px;padding:11px;background:white;color:#555;border:1px solid #eee9ee;border-radius:7px;font-size:12px;"
            >
                Batal
            </a>

        </div>

    </div>

</div>

<style>
    @media(max-width:768px) {
        form > div[style*="grid-template-columns"] {
            grid-template-columns:1fr !important;
        }
    }

    input:focus,
    textarea:focus,
    select:focus {
        border-color:#7F0079 !important;
        box-shadow:0 0 0 3px rgba(127,0,121,.07);
    }
</style>
