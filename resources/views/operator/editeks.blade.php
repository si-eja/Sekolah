@extends('operator.temp')
@section('operator')
    <img src="{{ asset('storage/ekstra.jpg') }}" alt=""
         style="width: 100%;
            height: 400px;
            object-fit: cover;border-left: 2px solid black;
            border-right: 2px solid black;">
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
                <h3 class="text-style">Tambah Ekstrakurikuler</h3>
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
            <form action="{{ route('eksUpdate', Crypt::encrypt($ekskul->id)) }}" method="post" enctype="multipart/form-data" class="p-2">
                @csrf
                <div class="mb-3 row">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/ekskul/'.$ekskul->gambar) }}" alt="" id="preview" 
                        style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="col-md-8">
                        <label for="nama" class="form-label">Nama Eksrakurikuler</label>
                        <input type="text" name="nama_ekskul" id="nama" class="form-control" value="{{ $ekskul->nama_ekskul }}">
                        <label for="pembina" class="form-label">Nama Pembina</label>
                        <input type="text" name="pembina" id="pembina" class="form-control" value="{{ $ekskul->pembina }}">
                        <label for="jadwal" class="form-label">Jadwal</label>
                        <input type="text" name="jadwal" id="jadwal" class="form-control" value="{{ $ekskul->jadwal }}">
                        <label for="gambar" class="form-label">Logo</label>
                        <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*" onchange="previewImage(event)">
                        <label for="deksripsi" class="form-label">Deskripsi</label>
                        <textarea name="deksripsi" id="deksripsi" class="form-control" row="2">{{ $ekskul->deksripsi }}</textarea>
                    </div>
                </div>
                <input type="submit" value="Ubah" class="w-100 btn btn-success">
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