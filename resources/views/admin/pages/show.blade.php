
@extends('admin.layouts.app')

@section('title', 'Detail Halaman - Tring CMS')
@section('page-title', 'Detail Halaman')

@section('content')

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:22px;gap:12px;flex-wrap:wrap;">

    <div>
        <h1 style="font-size:23px;margin-bottom:7px;font-weight:800;">
            Detail Halaman
        </h1>

        <p style="font-size:12px;color:#858085;">
            Informasi lengkap halaman website Tring.
        </p>
    </div>

    <div style="display:flex;gap:8px;flex-wrap:wrap;">

        <a href="{{ route('admin.pages.index') }}"
           style="background:white;color:#555;border:1px solid #eee9ee;padding:11px 15px;border-radius:7px;font-size:12px;">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

        <a href="{{ route('admin.pages.edit', $page) }}"
           style="background:#7F0079;color:white;padding:11px 15px;border-radius:7px;font-size:12px;">
            <i class="bi bi-pencil"></i>
            Edit Halaman
        </a>

    </div>

</div>

<div style="background:white;border:1px solid #eee9ee;border-radius:11px;padding:25px;">

    {{-- INFORMASI UTAMA --}}

    <div style="margin-bottom:22px;">

        <div style="font-size:11px;color:#999;margin-bottom:12px;">
            <i class="bi bi-calendar3"></i>
            {{ $page->created_at->format('d F Y') }}

            &nbsp;·&nbsp;

            <i class="bi bi-person"></i>
            {{ $page->user?->name ?? '-' }}
        </div>

        <h1 style="font-size:27px;font-weight:800;margin-bottom:12px;">
            {{ $page->title }}
        </h1>

        <div style="font-size:12px;color:#858085;">
            <i class="bi bi-link-45deg"></i>
            /halaman/{{ $page->slug }}
        </div>

    </div>

    <hr style="border:0;border-top:1px solid #eee9ee;margin:22px 0;">

    {{-- STATUS --}}

    <div style="margin-bottom:22px;">

        <h3 style="font-size:13px;font-weight:700;margin-bottom:10px;">
            Status Publikasi
        </h3>

        @if($page->status === 'published')
            <span style="display:inline-block;background:#eaf8ef;color:#237a42;padding:6px 11px;border-radius:5px;font-size:11px;font-weight:700;">
                <i class="bi bi-check-circle"></i>
                Published
            </span>
        @else
            <span style="display:inline-block;background:#f1f1f1;color:#777;padding:6px 11px;border-radius:5px;font-size:11px;font-weight:700;">
                <i class="bi bi-pencil"></i>
                Draft
            </span>
        @endif

    </div>

    {{-- RINGKASAN --}}

    <div style="margin-bottom:22px;">

        <h3 style="font-size:13px;font-weight:700;margin-bottom:10px;">
            Ringkasan
        </h3>

        <p style="font-size:13px;color:#666;line-height:1.8;">
            {{ $page->excerpt ?: 'Tidak ada ringkasan.' }}
        </p>

    </div>

    {{-- KONTEN --}}

    <div style="margin-bottom:25px;">

        <h3 style="font-size:14px;font-weight:800;margin-bottom:15px;">
            Konten Halaman
        </h3>

        <div style="font-size:13px;color:#444;line-height:1.9;white-space:pre-wrap;overflow-wrap:anywhere;">
            {{ $page->content }}
        </div>

    </div>

    <hr style="border:0;border-top:1px solid #eee9ee;margin:25px 0;">

    {{-- SEO --}}

    <h3 style="font-size:15px;font-weight:800;margin-bottom:20px;">
        <i class="bi bi-google"></i>
        Informasi SEO
    </h3>

    <div style="margin-bottom:15px;">
        <strong style="display:block;font-size:12px;margin-bottom:6px;">
            SEO Title
        </strong>

        <p style="font-size:12px;color:#666;">
            {{ $page->seo_title ?: '-' }}
        </p>
    </div>

    <div style="margin-bottom:15px;">
        <strong style="display:block;font-size:12px;margin-bottom:6px;">
            SEO Description
        </strong>

        <p style="font-size:12px;color:#666;line-height:1.7;">
            {{ $page->seo_description ?: '-' }}
        </p>
    </div>

    <div>
        <strong style="display:block;font-size:12px;margin-bottom:6px;">
            SEO Keywords
        </strong>

        <p style="font-size:12px;color:#666;">
            {{ $page->seo_keywords ?: '-' }}
        </p>
    </div>

</div>

@endsection
