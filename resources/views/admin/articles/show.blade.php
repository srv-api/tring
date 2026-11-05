@extends('admin.layouts.app')

@section('title', 'Detail Artikel - Tring CMS')
@section('page-title', 'Detail Artikel')

@section('content')

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:22px;gap:10px;">
    <div>
        <h1 style="font-size:23px;margin-bottom:7px;">Detail Artikel</h1>
        <p style="font-size:12px;color:#858085;">Informasi lengkap artikel.</p>
    </div>

    <a href="{{ route('admin.articles.edit', $article) }}"
       style="background:#7F0079;color:white;padding:11px 15px;border-radius:7px;font-size:12px;">
        <i class="bi bi-pencil"></i> Edit Artikel
    </a>
</div>

<div style="background:white;border:1px solid #eee9ee;border-radius:11px;padding:25px;">

    @if($article->thumbnail)
        <img
            src="{{ asset('storage/'.$article->thumbnail) }}"
            alt="{{ $article->title }}"
            style="width:100%;max-height:350px;object-fit:cover;border-radius:9px;margin-bottom:20px;"
        >
    @endif

    <div style="font-size:11px;color:#999;margin-bottom:12px;">
        {{ $article->category?->name ?? 'Tanpa kategori' }}
        &nbsp;·&nbsp;
        {{ $article->created_at->format('d F Y') }}
        &nbsp;·&nbsp;
        {{ $article->user?->name ?? '-' }}
    </div>

    <h1 style="font-size:27px;margin-bottom:12px;">
        {{ $article->title }}
    </h1>

    <div style="font-size:12px;color:#999;margin-bottom:20px;">
        {{ $article->slug }}
    </div>

    @if($article->excerpt)
        <p style="font-size:14px;color:#666;line-height:1.8;margin-bottom:20px;">
            {{ $article->excerpt }}
        </p>
    @endif

    <div style="line-height:1.9;font-size:14px;white-space:pre-wrap;">
        {{ $article->content }}
    </div>

    <hr style="border:0;border-top:1px solid #eee;margin:25px 0;">

    <h3 style="font-size:14px;margin-bottom:15px;">Informasi SEO</h3>

    <p style="font-size:12px;margin-bottom:10px;">
        <strong>SEO Title:</strong>
        {{ $article->seo_title ?: '-' }}
    </p>

    <p style="font-size:12px;margin-bottom:10px;">
        <strong>SEO Description:</strong>
        {{ $article->seo_description ?: '-' }}
    </p>

    <p style="font-size:12px;">
        <strong>SEO Keywords:</strong>
        {{ $article->seo_keywords ?: '-' }}
    </p>

</div>

@endsection
