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
                <h3 class="text-style">Ekstrakurikuler</h3>
                <a href="{{ route('addeksA') }}" class="btn btn-success">Tambahan</a>
            </div>
            <div class="py-2 px-4" style="overflow-x: hidden; overflow-y: scroll; height: 50vh;">
                @foreach ($ekskul as $eks)
                <div class="rounded-5 row bg bg-white my-1">
                    <div class="col-md-2 p-0">
                        <img src="{{ asset('storage/ekskul/'.$eks->gambar) }}" alt="" class="rounded-start-5 w-100 h-100">
                    </div>
                    <div class="col-md-7">
                        <h3 class="pt-3">{{ $eks->nama_ekskul }}</h3>
                        <hr>
                        <p>{{ $eks->deksripsi }}</p>
                    </div>
                    <div class="col-md-3 py-4">
                        <a href="{{ route('editEksA',Crypt::encrypt($eks->id)) }}" class="btn btn-primary w-100 mb-2">Edit</a>
                        {{-- <a href="{{ route('eksDelete',Crypt::encrypt($eks->id)) }}" class="btn btn-danger w-100">Hapus</a> --}}
                        <button type="button" class="btn btn-danger w-100"
                            data-bs-toggle="modal"
                            data-bs-target="#hapusModal{{ $eks->id }}">
                            Hapus
                        </button>
                        <hr>
                        <div class="d-flex justify-content-between px-2">
                            <div class="">
                                <i class="fa-solid fa-user"></i> {{ $eks->pembina }}
                            </div>
                            <div class="">
                                <i class="fa-solid fa-calendar-days"></i> {{ $eks->jadwal }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="hapusModal{{ $eks->id }}" tabindex="-1" aria-labelledby="hapusModalLabel{{ $eks->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-4 shadow">
                            <div class="modal-header bg-danger text-white rounded-top-4">
                                <h5 class="modal-title" id="hapusModalLabel{{ $eks->id }}">
                                    Konfirmasi Hapus Ekstrakurikuler
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                Apakah kamu yakin ingin menghapus Ekstrakurikuler <strong>"{{ $eks->nama_ekskul }}"</strong>?
                                <br><small class="text-muted">Tindakan ini tidak bisa dibatalkan.</small>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <a href="{{ route('glrDeleteA', Crypt::encrypt($eks->id)) }}" class="btn btn-danger">Ya, Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="p-4" style="background: linear-gradient(315deg, rgb(19, 70, 134) 0%, rgb(237, 63, 39) 50%); height: 1rem;"></div>
        </div>
    </div>
@endsection