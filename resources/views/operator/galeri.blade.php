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
                <h3 class="text-style">Galeri Sekolah</h3>
                <a href="#" class="btn btn-success">Tambah Foto/Video</a>
            </div>
            <div class="py-2 px-4" style="overflow-x: hidden; overflow-y: scroll; height: 360px;">
                <div class="row py-3"
                     style="border: 2px solid black">
                    <div class="col-md-6">
                        <img src="{{ asset('storage/fotbar.jpg') }}" alt="" style="height: 400px; width: 100%; object-fit: cover;">
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between align-items-end">
                            <h3 class="mb-0">Foto guru</h3>
                            <h6 class="mb-0">Kategori : Foto</h6>
                        </div>
                        <hr>
                        <div class="d-flex flex-column gap-4">
                            <a href="#" class="btn btn-sm btn-primary w-100">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger w-100">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4" style="background-color: rgb(19, 70, 134); height: 1rem;"></div>
        </div>
    </div>
@endsection