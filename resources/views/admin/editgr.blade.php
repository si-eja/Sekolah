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
                 style="background: linear-gradient(315deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%);">
                <h3 class="text-style">Edit guru</h3>
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
            <form action="{{ route('grUpdate',Crypt::encrypt($guru->id)) }}" method="post" enctype="multipart/form-data" class="p-2">
                @csrf
                <div class="mb-3 row">
                    <div class="col-md-9">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" name="nip" id="nip" class="form-control" value="{{ $guru->nip }}">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $guru->nama }}">
                        <label for="mapel" class="form-label">Mata pelajaran</label>
                        <input type="text" name="mapel" id="mapel" class="form-control" value="{{ $guru->mapel }}">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control" accept="image/*" onchange="previewImage(event)">
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('storage/guru/'.$guru->foto) }}" alt="" id="preview" 
                        style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <input type="submit" value="Tambah" class="w-100 btn btn-success">
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
            <div class="p-4" style="background: linear-gradient(315deg, rgb(19, 70, 134) 0%, rgb(237, 63, 39) 50%); height: 1rem;"></div>
        </div>
    </div>
@endsection