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
                <h3 class="text-style">Galeri Sekolah</h3>
                <div class="d-flex gap-3">
                    <a href="{{ route('addvid') }}" class="btn btn-success">Tambah Video</a>
                    <a href="{{ route('addft') }}" class="btn btn-success">Tambah Foto</a>
                </div>
            </div>
            <div class="bg bg-primary">
                <h3 style="font-weight: 700; padding: 1%; color: white;">Foto</h3>
            </div>
            <div class="py-2 px-4" style="overflow-x: hidden; overflow-y: scroll; height: 400px;">
                @foreach ($foto as $ft)
                <div class="row py-3 mb-2"
                     style="border: 2px solid black">
                    <div class="col-md-5">
                        <img src="{{ asset('storage/galeri/foto/'.$ft->file) }}" alt="" style="height: 400px; width: 100%; object-fit: cover;">
                    </div>
                    <div class="col-md-7">
                        <div class="d-flex justify-content-between align-items-end">
                            <h3 class="mb-0">{{ $ft->judul }}</h3>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-start">
                            <p class="text-start">{{ $ft->keterangan }}</p>
                        </div>
                        <hr>
                        <div class="d-flex flex-column gap-4">
                            <a href="{{ route('editft', Crypt::encrypt($ft->id)) }}" class="btn btn-sm btn-primary w-100">Edit</a>
                            <button class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="{{ Crypt::encrypt($ft->id) }}"
                                    data-type="foto"
                                    data-judul="{{ $ft->judul }}">
                                Hapus Foto
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="bg bg-primary">
                <h3 style="font-weight: 700; padding: 1%; color: white;">Video</h3>
            </div>
            <div class="py-2 px-4" style="overflow-x: hidden; overflow-y: scroll; height: 400px;">
                @foreach ($video as $vid)
                <div class="row py-3"
                     style="border: 2px solid black">
                    <div class="col-md-5">
                        <video style="height: 400px; width: 100%; object-fit: cover;" controls>
                            <source src="{{ asset('storage/galeri/video/'.$vid->file) }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="col-md-7">
                        <div class="d-flex justify-content-between align-items-end">
                            <h3 class="mb-0">{{ $vid->judul }}</h3>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-start">
                            <p class="text-start">{{ $vid->keterangan }}</p>
                        </div>
                        <hr>
                        <div class="d-flex flex-column gap-4">
                            <a href="{{ route('editvid', Crypt::encrypt($vid->id)) }}" class="btn btn-sm btn-primary w-100">Edit</a>
                            <button class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="{{ Crypt::encrypt($vid->id) }}"
                                    data-type="video"
                                    data-judul="{{ $vid->judul }}">
                                Hapus Video
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="p-4" style="background-color: rgb(19, 70, 134); height: 1rem;"></div>
        </div>
    </div>
    {{-- Modal Foto & Video --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin ingin menghapus <b id="itemKategori"></b> berjudul 
                    <b id="itemJudul"></b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="#" id="btnDelete" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const kategori = button.getAttribute('data-type'); // foto / video
        const judul = button.getAttribute('data-judul');

        // set teks di modal
        document.getElementById('itemKategori').textContent = kategori;
        document.getElementById('itemJudul').textContent = judul;

        // set href sesuai kategori
        let route = '';
        if (kategori === 'foto') {
            route = "{{ route('glrDelete', ['id' => ':id']) }}".replace(':id', id);
        } else if (kategori === 'video') {
            route = "{{ route('glrDelete', ['id' => ':id']) }}".replace(':id', id);
        }

        document.getElementById('btnDelete').href = route;
    });
    </script>
@endsection