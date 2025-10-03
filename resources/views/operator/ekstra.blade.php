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
                <h3 class="text-style">Ekstrakurikuler</h3>
                <a href="{{ route('addeks') }}" class="btn btn-success">Tambahan</a>
            </div>
            <div class="py-2 px-4" style="overflow-x: hidden; overflow-y: scroll; height: 360px;">
                @foreach ($ekskul as $eks)
                <div class="row py-3"
                     style="border: 2px solid black">
                    <img src="{{ asset('storage/ekskul/'.$eks->gambar) }}" alt="" class="col-md-2">
                    <div class="col-md-8 d-flex flex-column">
                        <h3>{{ $eks->nama_ekskul }}</h3>
                        <p>{{ $eks->deksripsi }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Pembian : {{ $eks->pembina }}</h6>
                            <h6 class="mb-0">Jadwal : {{ $eks->jadwal }}</h6>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex flex-column gap-4">
                        <a href="{{ route('editEks',Crypt::encrypt($eks->id)) }}" class="btn btn-sm btn-primary w-100">Edit</a>
                        <a href="{{ route('eksDelete',Crypt::encrypt($eks->id)) }}" class="btn btn-sm btn-danger w-100">Hapus</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="p-4" style="background-color: rgb(19, 70, 134); height: 1rem;"></div>
        </div>
    </div>
@endsection