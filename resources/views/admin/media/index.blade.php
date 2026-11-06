@extends('admin.layouts.app')

@section('title', 'Media Library')
@section('page-title', 'Media Library')

@section('content')

<div style="display:flex;justify-content:space-between;align-items:center;gap:15px;flex-wrap:wrap;margin-bottom:25px">
    <div>
        <h2 style="font-size:20px;font-weight:800;margin:0 0 5px">
            Media Library
        </h2>
        <p style="color:#777;font-size:13px;margin:0">
            Kelola gambar dan file website Tring.
        </p>
    </div>

    <a href="{{ route('admin.media.create') }}"
       style="display:inline-flex;align-items:center;gap:8px;background:#7F0079;color:white;text-decoration:none;padding:11px 17px;border-radius:8px;font-size:13px;font-weight:700">
        <i class="bi bi-cloud-arrow-up"></i>
        Upload Media
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

@if($errors->any())
    <div style="background:#fff0f0;color:#c0392b;padding:13px 16px;border-radius:8px;margin-bottom:20px;font-size:13px">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<div style="background:white;border:1px solid #eee9ee;border-radius:11px;padding:18px;margin-bottom:20px">

    <form action="{{ route('admin.media.index') }}" method="GET"
          style="display:flex;gap:10px;flex-wrap:wrap">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama file..."
            style="flex:1;min-width:180px;padding:11px 13px;border:1px solid #e8e3e8;border-radius:8px;font-family:inherit;font-size:13px;outline:none"
        >

        <select
            name="type"
            style="min-width:150px;padding:11px 13px;border:1px solid #e8e3e8;border-radius:8px;font-family:inherit;font-size:13px;background:white">

            <option value="">Semua Tipe</option>
            <option value="image" @selected(request('type') === 'image')>Gambar</option>
            <option value="document" @selected(request('type') === 'document')>Dokumen</option>
            <option value="video" @selected(request('type') === 'video')>Video</option>
            <option value="audio" @selected(request('type') === 'audio')>Audio</option>
            <option value="other" @selected(request('type') === 'other')>Lainnya</option>
        </select>

        <button type="submit"
                style="background:#7F0079;color:white;border:0;border-radius:8px;padding:11px 17px;font-size:13px;font-weight:700;cursor:pointer">
            <i class="bi bi-search"></i>
            Cari
        </button>

        <a href="{{ route('admin.media.index') }}"
           style="display:inline-flex;align-items:center;padding:11px 15px;border:1px solid #e8e3e8;border-radius:8px;text-decoration:none;color:#555;font-size:13px">
            Reset
        </a>
    </form>
</div>

<div style="background:white;border:1px solid #eee9ee;border-radius:11px;overflow:hidden">

    <div style="display:flex;justify-content:space-between;align-items:center;padding:20px 22px;border-bottom:1px solid #eee9ee;gap:10px;flex-wrap:wrap">
        <div>
            <h3 style="font-size:15px;font-weight:800;margin:0">Semua Media</h3>
            <p style="font-size:12px;color:#858085;margin:5px 0 0">
                {{ $media->total() }} file tersimpan
            </p>
        </div>
    </div>

    <div style="padding:20px">
        @if($media->count())
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(165px,1fr));gap:16px">

                @foreach($media as $item)
                    <a href="{{ route('admin.media.show', $item) }}"
                       style="display:block;text-decoration:none;color:#242124;border:1px solid #eee9ee;border-radius:9px;overflow:hidden;min-width:0">

                        <div style="height:145px;background:#f8f7f9;display:flex;align-items:center;justify-content:center;overflow:hidden">

                            @if($item->type === 'image')
                                <img src="{{ $item->url }}"
                                     alt="{{ $item->name }}"
                                     loading="lazy"
                                     style="width:100%;height:100%;object-fit:cover">
                            @elseif($item->type === 'video')
                                <i class="bi bi-camera-video" style="font-size:42px;color:#858085"></i>
                            @elseif($item->type === 'audio')
                                <i class="bi bi-file-music" style="font-size:42px;color:#858085"></i>
                            @elseif($item->mime_type === 'application/pdf')
                                <i class="bi bi-file-pdf" style="font-size:42px;color:#d94a55"></i>
                            @else
                                <i class="bi bi-file-earmark" style="font-size:42px;color:#858085"></i>
                            @endif

                        </div>

                        <div style="padding:12px">
                            <div style="font-size:12px;font-weight:700;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                {{ $item->file_name }}
                            </div>

                            <div style="display:flex;justify-content:space-between;gap:5px;margin-top:7px">
                                <span style="font-size:10px;color:#858085;text-transform:uppercase">
                                    {{ $item->type }}
                                </span>

                                <span style="font-size:10px;color:#858085">
                                    {{ $item->formatted_size }}
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        @else
            <div style="text-align:center;padding:55px 20px;color:#858085">
                <i class="bi bi-images" style="font-size:40px;display:block;margin-bottom:12px"></i>
                <div style="font-size:14px;font-weight:700;color:#555">
                    Belum ada media
                </div>
                <p style="font-size:12px;margin:7px 0 15px">
                    Upload gambar atau file pertama Anda.
                </p>
                <a href="{{ route('admin.media.create') }}"
                   style="color:#7F0079;text-decoration:none;font-size:13px;font-weight:700">
                    Upload Media <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        @endif
    </div>

    @if($media->hasPages())
        <div style="padding:18px 20px;border-top:1px solid #eee9ee">
            {{ $media->links() }}
        </div>
    @endif

</div>

@endsection