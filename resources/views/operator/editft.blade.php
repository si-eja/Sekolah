@extends('operator.temp')
@section('operator')
    <img src="{{ asset('storage/galeri.jpg') }}" alt=""
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
                <h3 class="text-style">Tambah Foto</h3>
            </div>
                <div class="px-2">
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
                    <form action="{{ route('ftUpdate',Crypt::encrypt($foto->id)) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row py-3">
                            <div class="col-md-6">
                                <img src="{{ asset('storage/galeri/foto/'.$foto->file) }}" alt="" id="fotoPreview" style="height: 400px; width: 100%; object-fit: cover;">
                            </div>
                            <div class="col-md-6">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control mb-3" value="{{ $foto->judul }}">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" rows="3" class="form-control mb-3">{{ $foto->keterangan }}</textarea>
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" readonly>
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" name="kategori" id="kategori" class="form-control mb-3" value="Foto" readonly>
                                <label for="fotoInput" class="form-label" >File</label>
                                <input type="file" name="file" id="fotoInput" accept="image/*" class="form-control">
                            </div>
                        </div>
                        <input type="submit" value="Ubah" class="btn btn-success w-100 my-2">
                    </form>
                    <script>
                        document.getElementById('fotoInput').addEventListener('change', function(event) {
                            const file = event.target.files[0];
                            if (file) {
                                const fotoPreview = document.getElementById('fotoPreview');
                                fotoPreview.src = URL.createObjectURL(file);
                                fotoPreview.style.display = "block";
                            }
                        });
                    </script>
                </div>
            <div class="p-4" style="background-color: rgb(19, 70, 134); height: 1rem;"></div>
        </div>
    </div>
@endsection