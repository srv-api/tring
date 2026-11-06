@extends('admin.layouts.app')

@section('title', 'Detail Media')
@section('page-title', 'Detail Media')

@section('content')

<div style="display:flex;justify-content:space-between;align-items:center;gap:15px;flex-wrap:wrap;margin-bottom:25px">

    <div>
        <h2 style="font-size:20px;font-weight:800;margin:0 0 5px">
            Detail Media
        </h2>
        <p style="color:#777;font-size:13px;margin:0">
            Informasi file yang tersimpan di Media Library.
        </p>
    </div>

    <a href="{{ route('admin.media.index') }}"
       style="padding:10px 14px;border:1px solid #eee9ee;border-radius:8px;text-decoration:none;color:#555;font-size:12px;font-weight:600">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Media Library
    </a>

</div>

<div style="display:grid;grid-template-columns:minmax(0,1.3fr) minmax(260px,0.7fr);gap:20px;align-items:start">

    <div style="background:white;border:1px solid #eee9ee;border-radius:11px;overflow:hidden">

        <div style="background:#f8f7f9;min-height:320px;display:flex;align-items:center;justify-content:center;padding:20px">

            @if($media->type === 'image')
                <img src="{{ $media->url }}"
                     alt="{{ $media->name }}"
                     style="max-width:100%;max-height:500px;object-fit:contain;border-radius:5px">
            @elseif($media->type === 'video')
                <video controls style="max-width:100%;max-height:450px">
                    <source src="{{ $media->url }}" type="{{ $media->mime_type }}">
                </video>
            @elseif($media->type === 'audio')
                <div style="text-align:center">
                    <i class="bi bi-file-music" style="font-size:65px;color:#7F0079"></i>
                    <audio controls style="display:block;margin-top:20px;max-width:100%">
                        <source src="{{ $media->url }}" type="{{ $media->mime_type }}">
                    </audio>
                </div>
            @else
                <div style="text-align:center">
                    <i class="bi bi-file-earmark" style="font-size:70px;color:#858085"></i>
                    <p style="font-size:13px;color:#777;margin-top:10px">
                        Preview tidak tersedia untuk file ini.
                    </p>
                    <a href="{{ $media->url }}" target="_blank"
                       style="color:#7F0079;font-size:13px;text-decoration:none">
                        Buka File <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                </div>
            @endif

        </div>

        <div style="padding:20px">
            <div style="font-size:14px;font-weight:800;overflow-wrap:anywhere">
                {{ $media->file_name }}
            </div>

            <div style="font-size:12px;color:#858085;margin-top:6px">
                {{ $media->formatted_size }} · {{ strtoupper($media->type) }}
            </div>
        </div>

    </div>

    <div style="background:white;border:1px solid #eee9ee;border-radius:11px;padding:22px">

        <h3 style="font-size:15px;font-weight:800;margin:0 0 20px">
            Informasi Media
        </h3>

        @php
            $details = [
                'Nama File' => $media->file_name,
                'Tipe Media' => strtoupper($media->type),
                'Format' => $media->mime_type,
                'Ukuran' => $media->formatted_size,
                'Diunggah Oleh' => $media->user?->name ?? 'Tidak diketahui',
                'Tanggal Upload' => $media->created_at->format('d M Y H:i'),
            ];
        @endphp

        @foreach($details as $label => $value)
            <div style="padding:12px 0;border-bottom:1px solid #f0edf0">
                <div style="font-size:11px;color:#858085;margin-bottom:5px">
                    {{ $label }}
                </div>
                <div style="font-size:12px;color:#333;font-weight:600;overflow-wrap:anywhere">
                    {{ $value }}
                </div>
            </div>
        @endforeach

        <div style="margin-top:20px">
            <label style="display:block;font-size:12px;font-weight:700;margin-bottom:8px">
                URL Media
            </label>

            <input
                type="text"
                id="media-url"
                readonly
                value="{{ $media->url }}"
                style="box-sizing:border-box;width:100%;padding:11px;border:1px solid #e8e3e8;border-radius:7px;font-size:11px;color:#555;background:#faf9fb"
            >

            <button type="button"
                    onclick="copyMediaUrl()"
                    style="width:100%;margin-top:9px;background:#7F0079;color:white;border:0;padding:11px;border-radius:7px;font-size:12px;font-weight:700;cursor:pointer">
                <i class="bi bi-clipboard"></i>
                Salin URL
            </button>

            <div id="copy-message" style="font-size:11px;color:#247a43;margin-top:7px"></div>
        </div>

        <div style="border-top:1px solid #eee9ee;margin-top:22px;padding-top:18px">

            <form action="{{ route('admin.media.destroy', $media) }}"
                  method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus media ini secara permanen?')">

                @csrf
                @method('DELETE')

                <button type="submit"
                        style="width:100%;background:#fff0f0;color:#d94a55;border:1px solid #f5d5d5;padding:11px;border-radius:7px;font-size:12px;font-weight:700;cursor:pointer">
                    <i class="bi bi-trash"></i>
                    Hapus Media
                </button>

            </form>

        </div>

    </div>

</div>

<script>
    async function copyMediaUrl() {
        const input = document.getElementById('media-url');
        const message = document.getElementById('copy-message');

        try {
            await navigator.clipboard.writeText(input.value);
            message.textContent = 'URL berhasil disalin.';
        } catch (error) {
            input.select();
            const copied = document.execCommand('copy');
            message.textContent = copied
                ? 'URL berhasil disalin.'
                : 'Gagal menyalin URL. Silakan salin secara manual.';
        }
    }
</script>

@endsection