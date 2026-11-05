@extends('admin.layouts.app')

@section('title', 'Edit Halaman')

@section('page-title', 'Edit Halaman')

@section('content')

<div style="margin-bottom:25px">
    <h2 style="font-size:20px;font-weight:800">Edit Halaman</h2>
    <p style="color:#777;font-size:13px">
        Perbarui konten halaman {{ $page->title }}.
    </p>
</div>

<form action="{{ route('admin.pages.update', $page) }}" method="POST">

    @csrf
    @method('PUT')

    @include('admin.pages._form')

</form>

@endsection