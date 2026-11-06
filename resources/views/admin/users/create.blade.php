@extends('admin.layouts.app')

@section('title', 'Tambah Pengguna')
@section('page-title', 'Tambah Pengguna')

@section('content')

<div style="margin-bottom:25px">
    <h2 style="font-size:20px;font-weight:800;margin:0 0 5px">
        Tambah Pengguna
    </h2>

    <p style="color:#777;font-size:13px;margin:0">
        Buat akun baru untuk website Tring.
    </p>
</div>

@if($errors->any())
    <div style="background:#fff0f0;color:#c0392b;padding:13px 16px;border-radius:8px;margin-bottom:20px;font-size:13px">
        Periksa kembali data yang Anda masukkan.
    </div>
@endif

<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf

    @include('admin.users._form')
</form>

@endsection