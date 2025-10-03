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
                    <form action="{{ route('vidUpdate',Crypt::encrypt($video->id)) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row py-3">
                            <div class="col-md-6">
                                <video id="videoPreview" style="margin-top: 10px; width: 100%; max-width: 500px;" controls>
                                    <source src="{{ asset('storage/galeri/video/'.$video->file) }}" type="video/mp4">
                                </video>
                            </div>
                            <div class="col-md-6">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control mb-3" value="{{ $video->judul }}">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" rows="3" class="form-control mb-3">{{ $video->keterangan }}</textarea>
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" readonly>
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" name="kategori" id="kategori" class="form-control mb-3" value="Video" readonly>
                                <label for="videoInput" class="form-label">File</label>
                                <input type="file" name="file" id="videoInput" accept="video/*" class="form-control">
                            </div>
                        </div>
                        <input type="submit" value="Ubah" class="btn btn-success w-100 my-2">
                    </form>
                    <script>
                        document.getElementById('videoInput').addEventListener('change', function(event) {
                            const file = event.target.files[0];
                            if (file) {
                                const videoPreview = document.getElementById('videoPreview');
                                const videoSource = videoPreview.querySelector('source');

                                // buat URL sementara dari file yg dipilih
                                videoSource.src = URL.createObjectURL(file);
                                videoPreview.load(); // reload supaya video muncul
                            }
                        });
                    </script>
                </div>
            <div class="p-4" style="background-color: rgb(19, 70, 134); height: 1rem;"></div>
        </div>
    </div>
@endsection