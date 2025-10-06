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
                Selamat Datang di<br>
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
            <h2 class="text-color"
                style="padding-top: 5px;
                    margin-right: 40px;"
                data-aos="fade-right">
                Sambutan kepala sekolah {{ $temp->nama }}
                <div class="w-50 p-1 rounded-5 m-1" style="background-color: rgb(19, 70, 134);"></div>
            </h2>
            <div class="bg bg-white w-100 p-3 rounded-5 shadow"
                 data-aos="fade-up">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset('storage/'.$temp->ft_kepsek) }}" 
                            alt="" 
                            class="img-fluid rounded-5 mx-auto d-flex align-content-center">
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex flex-column">
                            <h3 class="fw-bold mb-4">{{ $temp->kepsek }}</h3>
                            <hr>
                            <h6 class="fw-medium mb-0">{{ $temp->deskripsi }}</h6>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <p>Hormat kami dari {{ $temp->nama }}<br>
                                    {{ $temp->kepsek }}
                                </p>
                            </div>
                            <a href="{{ route('info', Crypt::encrypt($temp->id)) }}" class="btn p-4 btn-style">
                                <div class="d-flex align-items-center gap-4 text-white fw-bolder">
                                    <h6>Info</h6>
                                    <i class="fa-solid fa-circle-arrow-right"></i>
                                </div>  
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4"
         id="ekstra"
         style="background: linear-gradient(135deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%);
            height: fit-content;">
        <div class="container text-center">
            <h3 class="text-style">Ekstrakurikuler</h3>
            <hr class="text-white">
            <div class="swiper mySwiper" data-aos="fade-right">
            <div class="swiper-wrapper">
                @foreach ($ekskul as $item)
                <div class="swiper-slide d-flex justify-content-center">
                <div class="rounded-5 border border-dark border-2 bg-dark" style="box-shadow: 1px 1px 4px whitesmoke; width: 210px;">
                    <img src="{{ asset('storage/ekskul/'.$item->gambar) }}" alt="" class="rounded-top-5 col-12">
                    <h6 class="fw-bold m-2 text-style text-center">{{ $item->nama_ekskul }}</h6>
                    <div class="p-3">
                    <a href="{{ route('eksInfo', Crypt::encrypt($item->id)) }}" 
                        class="btn text-white w-100 btn-style"
                        style="background: linear-gradient(135deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%);">
                        Selengkapnya
                    </a>
                    </div>
                </div>
                </div>
                @endforeach
            </div>

            <!-- Tombol navigasi -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <!-- Pagination (opsional) -->
            <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4"
         id="berita"
         style="background-color: rgb(253, 244, 227);
            height: fit-content;">
        <div class="container text-center">
            <h3 class="text-color">Berita sekolah</h3>

        </div>
    </div>
@endsection