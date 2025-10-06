@extends('home.temp')
@section('content')
    <div style="position: relative; background: linear-gradient(135deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%);">
        <!-- Layer background -->
        <div style="background: url('{{ asset('storage/'.$temp->foto) }}') center center / cover no-repeat;
                opacity: 0.5;
                position: absolute;
                inset: 0;">
        </div>
        <!-- Layer konten (teks) -->
        <div class="container"
             style="position: relative;
                    padding-top: 20%;
                    padding-bottom: 15%;
                    color: white;
                    text-shadow: 2px 2px 4px rgb(19, 70, 134);"
             data-aos="fade-right">
            <h1>
                Guru
                {{ $temp->nama }}
            </h1>
            <br>
            <h6>Visi Sekolah</h6>
            <h3 class="col-8">{{ $temp->visi_misi }}</h3>
        </div>
    </div>
    <div class="container-fluid"
         style="height: fit-content;
            background-color: rgb(253, 244, 227);">
        <div class="container py-4"
             style="height: fit-content;">
            <div class="bg-white p-3 rounded-4" data-aos="zoom-in-down">
                <h2 class="text-color mb-4">
                    Data guru
                    <div class="p-1 rounded-5 m-1" style="background-color: rgb(19, 70, 134); width: 20%;"></div>
                </h2>
                <div class="row justify-content-center gap-3" style="overflow-x: scroll">
                    @foreach ($guru as $item)
                    <div class="col-md-3">
                        <div class="bg-dark rounded-2" style="box-shadow: 1px 1px 6px black;">
                            <img src="{{ asset('storage/guru/'.$item->foto) }}"
                                alt="{{ $item->nama }}"
                                class="object-fit-cover rounded-top-2 w-100"
                                style="height: fit-content">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="text-white fw-bolder text-start p-3">{{ $item->nama }}</h6>
                                <h6 class="text-white fw-bolder text-start p-3">{{ $item->mapel }}</h6>
                            </div>
                            <h6 class="text-white fw-bolder text-start p-3">NIP: {{ $item->nip }}</h6>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
