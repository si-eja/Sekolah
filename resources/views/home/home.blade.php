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
                            <a href="{{ route('info', Crypt::encrypt($temp->id)) }}" class="btn p-4 btn-model">
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
         id="warga"
         style="background: linear-gradient(135deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%);
            height: fit-content;">
        <div class="container text-center">
            <h3 class="text-style">Data Guru</h3>
            <hr class="text-white">
            <!-- Untuk Desktop tampil semua -->
            <div class="d-none d-md-flex justify-content-center flex-wrap gap-5">
                @foreach ($guru as $item)
                <div class="rounded-5 border border-dark border-2 bg-dark text-white"
                    style="box-shadow: 1px 1px 4px whitesmoke; width: 210px;">
                    <img src="{{ asset('storage/guru/'.$item->foto) }}"
                        alt="{{ $item->foto }}"
                        class="rounded-top-5 w-100"
                        style="height: 180px; object-fit: cover;">
                        <h6 class="fw-bold m-2 text-style text-center">{{ $item->mapel }}</h6>
                        <hr>
                        <h6 class="fw-bold m-2 text-style text-center">{{ $item->nama }}</h6>
                </div>
                @endforeach
            </div>

            <!-- Untuk Mobile tampil 1 per slide -->
            <div id="carouselEkskul" class="carousel slide d-md-none" data-bs-ride="carousel">
                <div class="carousel-inner text-center">

                    @foreach ($guru as $index => $item)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="d-flex justify-content-center">
                            <div class="rounded-5 border border-dark border-2 bg-dark text-white"
                                style="box-shadow: 1px 1px 4px whitesmoke; width: 210px;">
                                <img src="{{ asset('storage/guru/'.$item->foto) }}"
                                    alt="{{ $item->foto }}"
                                    class="rounded-top-5 w-100"
                                    style="height: 180px; object-fit: cover;">
                                    <h6 class="fw-bold m-2 text-style text-center">{{ $item->mapel }}</h6>
                                    <hr>
                                    <h6 class="fw-bold m-2 text-style text-center">{{ $item->nama }}</h6>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <!-- Navigasi Carousel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselEkskul" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselEkskul" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
            <hr class="text-white">
            <a href="{{ route('guruS') }}" class="w-100 btn btn-model fw-bold text-white p-3">Lihat Guru</a>
        </div>
    </div>
    <div class="container-fluid py-4"
         id="berita"
         style="background-color: rgb(253, 244, 227);
            height: fit-content;">
        <div class="container text-center">
            <h3 class="text-color">Berita sekolah</h3>
            <hr class="text-dark">
            <div class="d-flex justify-content-center row">
                @foreach ($berita as $item)
                <div class="col-12 col-md-4">
                    <div class="bg bg-dark rounded-2" style="box-shadow: 1px 1px 6px black">
                        <img src="{{ asset('storage/berita/'.$item->gambar) }}" alt="" class="object-fit-cover rounded-top-2" style="width: 100%; height: 240px;">
                        <h5 class="text-white fw-bolder text-start p-3">{{ $item->judul }}</h5>
                        <div class="d-flex justify-content-between px-3 text-white">
                            <p><i class="fa-solid fa-user"></i> {{ $item->user->name }}</p>
                            <p><i class="fa-solid fa-calendar-days"></i> {{ $item->tanggal }}</p>
                        </div>
                        <a href="{{ route('brtInfo', Crypt::encrypt($item->id)) }}" class="btn w-100 btn-model border-0 fw-bolder text-white">Selengkapnya</a>
                    </div>
                </div>
                @endforeach
            </div>
            <hr class="text-dark">
            <a href="{{ route('beritaS') }}" class="w-100 btn btn-model fw-bold text-white p-3">Berita Lainnya</a>
        </div>
    </div>
    <div class="container-fluid py-4"
        id="ekstra"
        style="background: linear-gradient(135deg, rgb(237,63,39) 0%, rgb(19,70,134) 90%);
                height: fit-content;">
        <div class="container text-center">
            <h3 class="text-style text-white mb-3">Ekstrakurikuler</h3>
            <hr class="text-white">
            <!-- Untuk Desktop tampil semua -->
            <div class="d-none d-md-flex justify-content-center flex-wrap gap-5">
                @foreach ($ekskul as $item)
                <div class="rounded-5 border border-dark border-2 bg-dark text-white"
                    style="box-shadow: 1px 1px 4px whitesmoke; width: 210px;">
                    <img src="{{ asset('storage/ekskul/'.$item->gambar) }}"
                        alt="{{ $item->nama_ekskul }}"
                        class="rounded-top-5 w-100"
                        style="height: 180px; object-fit: cover;">
                    <h6 class="fw-bold m-2 text-style text-center">{{ $item->nama_ekskul }}</h6>
                    <a href="{{ route('eksInfo', Crypt::encrypt($item->id)) }}"
                    class="btn btn-model text-white w-100">
                    Selengkapnya
                    </a>
                </div>
                @endforeach
            </div>

            <!-- Untuk Mobile tampil 1 per slide -->
            <div id="carouselEkskul" class="carousel slide d-md-none" data-bs-ride="carousel">
                <div class="carousel-inner text-center">

                    @foreach ($ekskul as $index => $item)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="d-flex justify-content-center">
                            <div class="rounded-5 border border-dark border-2 bg-dark text-white"
                                style="box-shadow: 1px 1px 4px whitesmoke; width: 210px;">
                                <img src="{{ asset('storage/ekskul/'.$item->gambar) }}"
                                    alt="{{ $item->nama_ekskul }}"
                                    class="rounded-top-5 w-100"
                                    style="height: 180px; object-fit: cover;">
                                <h6 class="fw-bold m-2 text-style text-center">{{ $item->nama_ekskul }}</h6>
                                <a href="{{ route('eksInfo', Crypt::encrypt($item->id)) }}"
                                class="btn btn-model text-white w-100">
                                Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <!-- Navigasi Carousel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselEkskul" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselEkskul" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
            <hr class="text-white">
            <a href="{{ route('ekskulS') }}" class="btn btn-model fw-bold text-white p-3 w-100">Ekstrakurikuler Lainnya</a>
        </div>
    </div>
    <div class="container-fluid py-4"
         id="galeri"
         style="background-color: rgb(253, 244, 227);
            height: fit-content;">
        <div class="container">
            <h3 class="text-color text-center">Galeri sekolah</h3>
            <hr class="text-dark">
            <h2 class="text-color mb-4"
                data-aos="fade-right">
                Galeri Foto
                <div class="p-1 rounded-5 m-1" style="background-color: rgb(19, 70, 134); width: 20%;"></div>
            </h2>
            <div class="d-flex justify-content-center row">
                @foreach ($foto as $item)
                <div class="col-12 col-md-4">
                    <div class="bg bg-dark rounded-2" style="box-shadow: 1px 1px 6px black">
                        <img src="{{ asset('storage/galeri/foto/'.$item->file) }}" alt="" class="object-fit-cover rounded-top-2" style="width: 100%; height: 240px;">
                        <h5 class="text-white fw-bolder text-start p-3">{{ $item->judul }}</h5>
                        <div class="d-flex justify-content-between px-3 text-white">
                            <p><i class="fa-solid fa-calendar-days"></i> {{ $item->tanggal }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <hr class="text-dark">
            <h2 class="text-color mb-4"
            data-aos="fade-right">
            Galeri Video
            <div class="p-1 rounded-5 m-1" style="background-color: rgb(19, 70, 134); width: 20%;"></div>
            </h2>
            <div class="d-flex justify-content-center row">
                @foreach ($video as $item)
                <div class="col-12 col-md-4">
                    <div class="bg bg-dark rounded-2" style="box-shadow: 1px 1px 6px black">
                        <video class="object-fit-cover rounded-top-2"
                            style="width: 100%; height: 240px;"
                            controls>
                            <source src="{{ asset('storage/galeri/video/'.$item->file) }}" type="video/mp4">
                            Browser kamu tidak mendukung pemutaran video.
                        </video>
                        <h5 class="text-white fw-bolder text-start p-3">{{ $item->judul }}</h5>
                        <div class="d-flex justify-content-between px-3 text-white">
                            <p><i class="fa-solid fa-calendar-days"></i> {{ $item->tanggal }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <hr class="text-dark">
            <a href="{{ route('galeriS') }}" class="w-100 btn btn-model fw-bold text-white p-3">Galeri Lainnya</a>
        </div>
    </div>
@endsection
