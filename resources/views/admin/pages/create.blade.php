@extends('admin.layouts.app')

@section('title', 'Tambah Halaman')

@section('page-title', 'Tambah Halaman')

@section('content')

<div style="margin-bottom:25px">
    <h2 style="font-size:20px;font-weight:800">Tambah Halaman</h2>
    <p style="color:#777;font-size:13px">
        Buat halaman baru untuk website Tring.
    </p>
</div>

<form action="{{ route('admin.pages.store') }}" method="POST">

    @csrf

    @include('admin.pages._form')

</form>

@endsection