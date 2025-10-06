@extends('admin.temp')
@section('admin')
    <div class="conteinter-fluid"
         style="height: fit-content;
            background-color: rgb(253, 244, 227);">
        <div class="rounded-bottom-3"
             style="width: 100%;
                height: fit-content;
                border-left: 2px solid black;
                border-right: 2px solid black;
                border-bottom: 2px solid black;">
            <div class="d-flex justify-content-between p-4"
                 style="background-color: rgb(19, 70, 134);">
                <h3 class="text-style">Tambah Berita</h3>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Validate Invalid</strong>
                    <ul>
                        @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('brtUpdateA',Crypt::encrypt($berita->id)) }}" method="post" enctype="multipart/form-data" class="p-2">
                @csrf
                <div class="mb-3 row">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/berita/'.$berita->gambar) }}" alt="" id="preview" 
                        class="w-100 h-100 object-fit-cover">
                    </div>
                    <div class="col-md-8">
                        <label for="nama" class="form-label">Judul Berita</label>
                        <input type="text" name="judul" id="nama" class="form-control" value="{{ $berita->judul }}">
                        <label for="tanggal" class="form-label">Tanggal Upload</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" readonly>
                        <label for="gambar" class="form-label">Foto</label>
                        <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*" onchange="previewImage(event)">
                        <label for="isi" class="form-label">Isi Berita</label>
                        <textarea name="isi" id="isi" class="form-control" rows="4">{{ $berita->isi }}</textarea>
                    </div>
                </div>
                <input type="submit" value="Edit Berita" class="w-100 btn btn-success">
            </form>
            <script>
                function previewImage(event) {
                    const input = event.target;
                    const reader = new FileReader();
                    reader.onload = function(){
                        const preview = document.getElementById('preview');
                        preview.src = reader.result;
                    };
                    if(input.files[0]){
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
            <div class="p-4" style="background-color: rgb(19, 70, 134); height: 1rem;"></div>
        </div>
    </div>
@endsection