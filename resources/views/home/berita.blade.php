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
                Berita
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
                        Berita Terbaru
                        <div class="w-100 p-1 rounded-5 m-1" style="background-color: rgb(19, 70, 134);"></div>
                    </h2>
                </div>
                <div class="col-12 col-md-8">
                    @foreach ($berita as $item)
                    <div data-aos="fade-right" class="d-flex flex-column justify-content-center bg bg-dark text-style rounded-3 shadow mb-4 border-2 border-black p-1">
                        <img src="{{ asset('storage/berita/'.$item->gambar) }}" alt="" class="rounded-top-3 w-100 object-fit-cover berita" style="height: 35rem;">
                        <h4 class="text-style m-3 mb-4">{{ $item->judul }}</h4>
                        <div class="d-flex justify-content-between m-3">
                            <div class="h5"><i class="fa-solid fa-user"></i> {{ $item->user->name }}</div>
                            <div class="h5"><i class="fa-solid fa-calendar-days"></i> {{ $item->tanggal }}</div>
                        </div>
                        <a href="{{ route('brtInfo', Crypt::encrypt($item->id)) }}" class="btn btn-style text-style">Selengkapnya</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
