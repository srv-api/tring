@extends('admin.layouts.app')

@section('title', 'Upload Media')
@section('page-title', 'Upload Media')

@section('content')

<div style="margin-bottom:25px">
    <h2 style="font-size:20px;font-weight:800;margin:0 0 5px">
        Upload Media
    </h2>
    <p style="color:#777;font-size:13px;margin:0">
        Tambahkan gambar atau file ke Media Library Tring.
    </p>
</div>

@if($errors->any())
    <div style="background:#fff0f0;color:#c0392b;padding:13px 16px;border-radius:8px;margin-bottom:20px;font-size:13px">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div style="background:white;border:1px solid #eee9ee;border-radius:11px;padding:25px;max-width:850px">

        <label for="files" style="display:block;font-size:13px;font-weight:700;margin-bottom:10px">
            Pilih File
        </label>

        <div style="border:2px dashed #e5dce5;border-radius:10px;padding:35px 20px;text-align:center;background:#fcfbfc">

            <i class="bi bi-cloud-arrow-up" style="font-size:42px;color:#7F0079"></i>

            <p style="font-size:14px;font-weight:700;margin:12px 0 5px">
                Pilih file untuk diunggah
            </p>

            <p style="font-size:12px;color:#858085;margin:0 0 17px">
                JPG, PNG, WEBP, GIF, SVG, PDF, DOC, XLS, PPT, MP4, MP3 dan lainnya.
            </p>

            <input
                type="file"
                id="files"
                name="files[]"
                multiple
                required
                accept=".jpg,.jpeg,.png,.webp,.gif,.svg,.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.csv,.mp4,.mp3"
                style="max-width:100%;font-size:12px"
            >

            <div id="file-preview" style="font-size:12px;color:#777;margin-top:15px">
                Belum ada file dipilih.
            </div>
        </div>

        <div style="font-size:12px;color:#858085;margin-top:12px;line-height:1.7">
            Maksimal 20 file dalam satu kali upload. Ukuran maksimal setiap file adalah 10 MB.
        </div>

        <div style="display:flex;gap:10px;flex-wrap:wrap;border-top:1px solid #eee9ee;padding-top:20px;margin-top:25px">

            <button type="submit"
                    style="display:inline-flex;align-items:center;gap:7px;background:#7F0079;color:white;border:0;padding:11px 17px;border-radius:8px;font-family:inherit;font-size:13px;font-weight:700;cursor:pointer">
                <i class="bi bi-cloud-arrow-up"></i>
                Upload Sekarang
            </button>

            <a href="{{ route('admin.media.index') }}"
               style="display:inline-flex;align-items:center;padding:11px 17px;border:1px solid #e8e3e8;border-radius:8px;color:#555;text-decoration:none;font-size:13px;font-weight:600">
                Batal
            </a>

        </div>
    </div>
</form>

<script>
    document.getElementById('files').addEventListener('change', function () {
        const preview = document.getElementById('file-preview');
        const files = Array.from(this.files);

        if (!files.length) {
            preview.textContent = 'Belum ada file dipilih.';
            return;
        }

        const totalSize = files.reduce((total, file) => total + file.size, 0);
        const formatSize = bytes => {
            if (bytes >= 1048576) return (bytes / 1048576).toFixed(2) + ' MB';
            if (bytes >= 1024) return (bytes / 1024).toFixed(2) + ' KB';
            return bytes + ' B';
        };

        preview.textContent =
            files.length + ' file dipilih · Total ' + formatSize(totalSize);
    });
</script>

@endsection