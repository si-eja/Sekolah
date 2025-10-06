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
                Ekstrakurikuler
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
             <div class="bg bg-white w-100 p-3 rounded-5 shadow row"
             data-aos="fade-up">
                <div class="col-12 col-md-4">
                    <h2 class="text-model"
                        style="font-weight: bold;
                            padding-top: 5px;
                            margin-right: 40px;"
                        data-aos="fade-right">
                        Ekstrakurikuler
                        <div class="w-100 p-1 rounded-5 m-1" style="background-color: rgb(19, 70, 134);"></div>
                    </h2>
                </div>
                <div class="col-12 col-md-8">
                    @foreach ($ekskul as $item)
                    <div class="row bg bg-dark rounded-3 mb-4">
                        <div class="col-12 col-md-3 rounded-start-3">
                            <img src="{{ asset('storage/ekskul/'.$item->gambar) }}" alt="" class="w-100 h-100 object-fit-fill">
                        </div>
                        <div class="col-12 col-md-9 text-style p-3">
                            <h4>{{ $item->nama_ekskul }}</h4>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h6>{{ $item->pembina }}</h6>
                                <h6>{{ $item->jadwal }}</h6>
                            </div>
                            <hr>
                            <a href="{{ route('eksInfo',Crypt::encrypt($item->id)) }}" class="btn btn-style w-100 text-white">Selengkapnya</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
