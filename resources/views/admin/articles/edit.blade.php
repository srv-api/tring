
@extends('admin.layouts.app')

@section('title', 'Edit Artikel - Tring CMS')
@section('page-title', 'Edit Artikel')

@section('content')

<div style="margin-bottom:25px;">
    <h1 style="font-size:23px;margin-bottom:7px;">Edit Artikel</h1>
    <p style="font-size:12px;color:#858085;">
        Perbarui informasi artikel {{ $article->title }}.
    </p>
</div>

<form action="{{ route('admin.articles.update', $article) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    @include('admin.articles._form')

</form>

@endsection
