@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')
@section('page-title', 'Tambah Kategori')

@section('content')

<div style="margin-bottom:25px">
    <h2 style="font-size:20px;font-weight:800;margin:0 0 5px">
        Tambah Kategori
    </h2>

    <p style="color:#777;font-size:13px;margin:0">
        Buat kategori baru untuk mengelompokkan artikel website Tring.
    </p>
</div>

<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    @include('admin.categories._form')
</form>

@endsection