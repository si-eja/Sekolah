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
                    <h1 class="text-center text-style">Berita</h1>
                </div>
            </div>
            <div class="container bg bg-white p-0 mt-3 shadow rounded-2">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <img src="{{ asset('storage/berita/'.$berita->gambar) }}" alt="" class="object-fit-cover w-100 h-100 rounded-start-2">
                    </div>
                    <div class="col-12 col-md-9 p-4">
                        <h4>{{ $berita->judul }}</h4>
                        <div class="d-flex justify-content-between">
                            <div class="h6 fw-medium">Di upload oleh: {{ $berita->user->name }}</div>
                            <div class="pe-3">Tanggal upload: {{ $berita->tanggal }}</div>
                        </div>
                        <hr>
                        <h5>Keterangan:</h5>
                        <p>{{ $berita->isi }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>