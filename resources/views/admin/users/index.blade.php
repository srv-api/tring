@extends('admin.layouts.app')

@section('title', 'Pengguna')
@section('page-title', 'Pengguna')

@section('content')

<div style="display:flex;justify-content:space-between;align-items:center;gap:15px;flex-wrap:wrap;margin-bottom:25px">
    <div>
        <h2 style="font-size:20px;font-weight:800;margin:0 0 5px">Pengguna</h2>
        <p style="color:#777;font-size:13px;margin:0">
            Kelola akun pengguna dan administrator website Tring.
        </p>
    </div>

    <a href="{{ route('admin.users.create') }}"
       style="display:inline-flex;align-items:center;gap:8px;background:#7F0079;color:white;text-decoration:none;padding:11px 17px;border-radius:8px;font-size:13px;font-weight:700">
        <i class="bi bi-person-plus"></i>
        Tambah Pengguna
    </a>
</div>

@if(session('success'))
    <div style="background:#eaf8ef;color:#247a43;padding:13px 16px;border-radius:8px;margin-bottom:20px;font-size:13px">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="background:#fff0f0;color:#c0392b;padding:13px 16px;border-radius:8px;margin-bottom:20px;font-size:13px">
        {{ session('error') }}
    </div>
@endif

<div style="background:white;border:1px solid #eee9ee;border-radius:11px;padding:18px;margin-bottom:20px">
    <form action="{{ route('admin.users.index') }}" method="GET"
          style="display:flex;gap:10px;flex-wrap:wrap">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama atau email..."
            style="flex:1;min-width:180px;padding:11px 13px;border:1px solid #e8e3e8;border-radius:8px;font-family:inherit;font-size:13px;outline:none"
        >

        <select name="role"
                style="min-width:145px;padding:11px 13px;border:1px solid #e8e3e8;border-radius:8px;font-family:inherit;font-size:13px;background:white">
            <option value="">Semua Role</option>
            <option value="admin" @selected(request('role') === 'admin')>Administrator</option>
            <option value="user" @selected(request('role') === 'user')>Pengguna</option>
        </select>

        <button type="submit"
                style="background:#7F0079;color:white;border:0;border-radius:8px;padding:11px 17px;font-size:13px;font-weight:700;cursor:pointer">
            <i class="bi bi-search"></i> Cari
        </button>

        <a href="{{ route('admin.users.index') }}"
           style="display:inline-flex;align-items:center;padding:11px 15px;border:1px solid #e8e3e8;border-radius:8px;text-decoration:none;color:#555;font-size:13px">
            Reset
        </a>
    </form>
</div>

<div style="background:white;border:1px solid #eee9ee;border-radius:11px;overflow:hidden">

    <div style="padding:20px 22px;border-bottom:1px solid #eee9ee">
        <h3 style="font-size:15px;font-weight:800;margin:0">Semua Pengguna</h3>
        <p style="font-size:12px;color:#858085;margin:5px 0 0">
            Total {{ $users->total() }} pengguna
        </p>
    </div>

    <div style="overflow-x:auto">
        <table style="width:100%;border-collapse:collapse;min-width:750px">
            <thead>
                <tr style="background:#faf9fb">
                    <th style="text-align:left;padding:14px 20px;font-size:12px;color:#777">Pengguna</th>
                    <th style="text-align:left;padding:14px 20px;font-size:12px;color:#777">Email</th>
                    <th style="text-align:center;padding:14px 20px;font-size:12px;color:#777">Role</th>
                    <th style="text-align:center;padding:14px 20px;font-size:12px;color:#777">Artikel</th>
                    <th style="text-align:left;padding:14px 20px;font-size:12px;color:#777">Terdaftar</th>
                    <th style="text-align:right;padding:14px 20px;font-size:12px;color:#777">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($users as $user)
                    <tr style="border-top:1px solid #f0edf0">
                        <td style="padding:15px 20px">
                            <div style="display:flex;align-items:center;gap:11px">
                                <div style="width:36px;height:36px;flex-shrink:0;border-radius:50%;background:#f9edfa;color:#7F0079;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:800">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>

                                <div>
                                    <a href="{{ route('admin.users.show', $user) }}"
                                       style="font-size:13px;font-weight:700;color:#242124;text-decoration:none">
                                        {{ $user->name }}
                                    </a>

                                    @if($user->id === auth()->id())
                                        <div style="font-size:10px;color:#7F0079;margin-top:3px">Akun Anda</div>
                                    @endif
                                </div>
                            </div>
                        </td>

                        <td style="padding:15px 20px;font-size:12px;color:#777">
                            {{ $user->email }}
                        </td>

                        <td style="padding:15px 20px;text-align:center">
                            @if($user->role === 'admin')
                                <span style="background:#f9edfa;color:#7F0079;padding:5px 10px;border-radius:20px;font-size:11px;font-weight:700">
                                    Administrator
                                </span>
                            @else
                                <span style="background:#f1f3f5;color:#666;padding:5px 10px;border-radius:20px;font-size:11px;font-weight:700">
                                    Pengguna
                                </span>
                            @endif
                        </td>

                        <td style="padding:15px 20px;text-align:center;font-size:12px;color:#555">
                            {{ $user->articles_count }}
                        </td>

                        <td style="padding:15px 20px;font-size:12px;color:#777">
                            {{ $user->created_at->format('d M Y') }}
                        </td>

                        <td style="padding:15px 20px;text-align:right;white-space:nowrap">
                            <a href="{{ route('admin.users.show', $user) }}"
                               title="Detail"
                               style="color:#777;text-decoration:none;margin-right:10px">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('admin.users.edit', $user) }}"
                               title="Edit"
                               style="color:#7F0079;text-decoration:none;margin-right:10px">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            @if($user->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $user) }}"
                                      method="POST"
                                      style="display:inline"
                                      onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            title="Hapus"
                                            style="border:0;background:none;color:#d94a55;cursor:pointer;padding:0">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;padding:45px 20px;color:#858085;font-size:13px">
                            <i class="bi bi-people" style="font-size:30px;display:block;margin-bottom:10px"></i>
                            Belum ada pengguna.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($users->hasPages())
        <div style="padding:18px 20px;border-top:1px solid #eee9ee">
            {{ $users->links() }}
        </div>
    @endif

</div>

@endsection