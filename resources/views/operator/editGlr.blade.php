@extends('operator.temp')
@section('operator')
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
                <h3 class="text-style">Tambah Video</h3>
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
                    {{-- {{ route('glrUpdate',Crypt::encrypt($glr->id)) }} --}}
                    <form action="{{ route('glrUpdate',Crypt::encrypt($glr->id)) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row py-3">
                            <div class="col-md-6">
                                @if ($glr->kategori == 'Video')
                                    <video id="previewVideo" controls class="col-12">
                                        <source src="{{ asset('storage/galeri/video/'.$glr->file) }}" type="video/mp4">
                                    </video>
                                @elseif ($glr->kategori == 'Foto')
                                    <img id="previewImage" 
                                        src="{{ asset('storage/galeri/foto/'.$glr->file) }}" 
                                        alt="Preview Foto"
                                        class="col-12">
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control mb-3" value="{{ $glr->judul }}">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" rows="3" class="form-control mb-3">{{ $glr->keterangan }}</textarea>
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" readonly>
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" name="kategori" id="kategori" class="form-control mb-3" value="{{ $glr->kategori }}" readonly>
                                <label for="videoInput" class="form-label">File</label>
                                <input type="file" name="file" id="fileInput" class="form-control"
                                    accept="{{ $glr->kategori == 'Video' ? 'video/*' : 'image/*' }}">
                            </div>
                        </div>
                        <input type="submit" value="Ubah" class="btn btn-success w-100 my-2">
                    </form>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const fileInput = document.getElementById('fileInput');
                            const kategori = document.getElementById('kategori').value;

                            fileInput.addEventListener('change', function (event) {
                                const file = event.target.files[0];
                                if (!file) return;

                                // Kalau kategori = Video
                                if (kategori === 'Video') {
                                    const video = document.getElementById('previewVideo');
                                    const source = video.querySelector('source');
                                    source.src = URL.createObjectURL(file);
                                    video.load();
                                }

                                // Kalau kategori = Foto
                                if (kategori === 'Foto') {
                                    const img = document.getElementById('previewImage');
                                    img.src = URL.createObjectURL(file);
                                }
                            });
                        });
                    </script>
                </div>
            <div class="p-4" style="background-color: rgb(19, 70, 134); height: 1rem;"></div>
        </div>
    </div>
@endsection