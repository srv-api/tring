
@extends('admin.layouts.app')

@section('title', 'Tambah Artikel - Tring CMS')
@section('page-title', 'Tambah Artikel')

@section('content')

<div style="margin-bottom:25px;">
    <h1 style="font-size:23px;margin-bottom:7px;">Tambah Artikel</h1>
    <p style="font-size:12px;color:#858085;">
        Buat artikel atau berita baru untuk website Tring.
    </p>
</div>

<form action="{{ route('admin.articles.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    @include('admin.articles._form')

</form>

@endsection
