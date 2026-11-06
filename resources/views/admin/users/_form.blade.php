@php
    $user = $user ?? null;
    $editing = $user !== null;
@endphp

<style>
    .user-field {
        margin-bottom: 20px;
    }

    .user-field label {
        display: block;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
        color: #242124;
    }

    .user-input {
        width: 100%;
        box-sizing: border-box;
        padding: 12px 13px;
        border: 1px solid #e8e3e8;
        border-radius: 8px;
        font-family: inherit;
        font-size: 13px;
        color: #242124;
        outline: none;
        background: white;
    }

    .user-input:focus {
        border-color: #7F0079;
    }

    .user-error {
        color: #d94a55;
        font-size: 11px;
        margin-top: 6px;
    }

    .user-submit {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        border: 0;
        background: #7F0079;
        color: white;
        padding: 11px 17px;
        border-radius: 8px;
        font-family: inherit;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
    }

    .user-cancel {
        display: inline-flex;
        align-items: center;
        padding: 11px 17px;
        border: 1px solid #e8e3e8;
        border-radius: 8px;
        color: #555;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
    }
</style>

<div style="background:white;border:1px solid #eee9ee;border-radius:11px;padding:25px;max-width:850px">

    <div class="user-field">
        <label for="name">Nama Lengkap <span style="color:#d94a55">*</span></label>

        <input
            type="text"
            id="name"
            name="name"
            class="user-input"
            value="{{ old('name', $user->name ?? '') }}"
            placeholder="Masukkan nama lengkap"
            required
        >

        @error('name')
            <div class="user-error">{{ $message }}</div>
        @enderror
    </div>

    <div class="user-field">
        <label for="email">Alamat Email <span style="color:#d94a55">*</span></label>

        <input
            type="email"
            id="email"
            name="email"
            class="user-input"
            value="{{ old('email', $user->email ?? '') }}"
            placeholder="nama@email.com"
            required
        >

        @error('email')
            <div class="user-error">{{ $message }}</div>
        @enderror
    </div>

    <div class="user-field">
        <label for="role">Role Pengguna <span style="color:#d94a55">*</span></label>

        <select
            id="role"
            name="role"
            class="user-input"
            required
            @disabled($editing && $user->id === auth()->id())
        >
            <option value="user" @selected(old('role', $user->role ?? 'user') === 'user')>
                Pengguna
            </option>

            <option value="admin" @selected(old('role', $user->role ?? 'user') === 'admin')>
                Administrator
            </option>
        </select>

        @if($editing && $user->id === auth()->id())
            <input type="hidden" name="role" value="admin">
            <div style="font-size:11px;color:#858085;margin-top:7px">
                Role akun yang sedang digunakan tidak dapat diubah.
            </div>
        @else
            <div style="font-size:11px;color:#858085;margin-top:7px">
                Administrator dapat mengakses dashboard admin. Pengguna memiliki akses sesuai fitur yang disediakan website.
            </div>
        @endif

        @error('role')
            <div class="user-error">{{ $message }}</div>
        @enderror
    </div>

    <div style="border-top:1px solid #eee9ee;padding-top:20px;margin-top:10px">
        <h3 style="font-size:14px;font-weight:800;margin:0 0 5px">
            {{ $editing ? 'Ubah Password' : 'Password Akun' }}
        </h3>

        <p style="font-size:11px;color:#858085;margin:0 0 18px">
            {{ $editing ? 'Kosongkan jika tidak ingin mengganti password.' : 'Buat password minimal 8 karakter.' }}
        </p>

        <div class="user-field">
            <label for="password">
                Password {{ $editing ? '' : '*' }}
            </label>

            <input
                type="password"
                id="password"
                name="password"
                class="user-input"
                placeholder="{{ $editing ? 'Kosongkan jika tidak diubah' : 'Minimal 8 karakter' }}"
                {{ $editing ? '' : 'required' }}
                autocomplete="new-password"
            >

            @error('password')
                <div class="user-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="user-field">
            <label for="password_confirmation">
                Konfirmasi Password {{ $editing ? '' : '*' }}
            </label>

            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="user-input"
                placeholder="Ulangi password"
                {{ $editing ? '' : 'required' }}
                autocomplete="new-password"
            >
        </div>
    </div>

    <div style="display:flex;gap:10px;flex-wrap:wrap;padding-top:10px;border-top:1px solid #eee9ee">
        <button type="submit" class="user-submit">
            <i class="bi bi-check-lg"></i>
            {{ $editing ? 'Simpan Perubahan' : 'Simpan Pengguna' }}
        </button>

        <a href="{{ route('admin.users.index') }}" class="user-cancel">
            Batal
        </a>
    </div>

</div>