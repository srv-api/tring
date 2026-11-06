@extends('admin.layouts.app')

@section('title', 'Edit Kategori')
@section('page-title', 'Edit Kategori')

@section('content')

<div style="margin-bottom:25px">
    <h2 style="font-size:20px;font-weight:800;margin:0 0 5px">
        Edit Kategori
    </h2>

    <p style="color:#777;font-size:13px;margin:0">
        Perbarui informasi kategori {{ $category->name }}.
    </p>
</div>

<form action="{{ route('admin.categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')

    @include('admin.categories._form')
</form>

@endsection