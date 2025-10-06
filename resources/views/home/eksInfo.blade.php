@extends('home.temp')
<div class="content-area">
    @section('content')
        <div style="height: 100vh; background-color: rgb(253, 244, 227);">
            <div style="background: linear-gradient(315deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%); opacity: 50%;">
                <!-- Layer background -->
                <div style="backgound-color: rgb(253, 244, 277);
                        opacity: 0.5;
                        inset: 0;">
                </div>
                <!-- Layer konten (teks) -->
                <div class="container" 
                    style="padding: 8% 0%;"
                    data-aos="fade-up">
                    <h1 class="text-center text-style">Ekstrakurikuler</h1>
                </div>
            </div>
            <div class="container bg bg-white p-0 mt-3 shadow rounded-2">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <img src="{{ asset('storage/ekskul/'.$ekskul->gambar) }}" alt="" class="object-fit-cover w-100 h-100 rounded-start-2">
                    </div>
                    <div class="col-12 col-md-9 p-4">
                        <h4>{{ $ekskul->nama_ekskul }}</h4>
                        <div class="d-flex justify-content-between">
                            <div class="h6 fw-medium">Pembina: {{ $ekskul->pembina }}</div>
                            <div class="pe-3">Jadwal: {{ $ekskul->jadwal }}</div>
                        </div>
                        <hr>
                        <h5>Keterangan:</h5>
                        <p>{{ $ekskul->deksripsi }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>