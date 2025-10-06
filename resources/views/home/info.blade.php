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
                Profile
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
            <h2 class="text-model"
                style="font-weight: bold;
                    padding-top: 5px;
                    margin-right: 40px;"
                data-aos="fade-right">
                Kepala sekolah {{ $temp->nama }}
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg bg-white w-100 p-3 rounded-5 shadow mt-4"
                 data-aos="fade-up">
                <div class="row p-3">
                    <div class="col-12 col-md-6 mb-2">
                        <h5><i class="fa-solid fa-location-dot"></i> Lokasi kami</h5>
                        <div class="col-12">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d596.7648583442657!2d108.10823190514452!3d-7.355780411327492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f544e3a959a47%3A0x27478067a4776f04!2sSmpn%202%20singaparna!5e0!3m2!1sid!2sid!4v1759656632267!5m2!1sid!2sid"
                                width="100%"
                                height="450"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <h5 class="text-center">Informasi Sekolah<hr></h5>
                        <div class="row">
                            <div class="col-md-6 text-center mt-3">
                                <img src="{{ asset('storage/'.$temp->logo) }}" 
                                    alt="Logo Sekolah" 
                                    style="width: 200px; height: auto; object-fit: contain;">
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-6">
                                        <p>NSPN</p>
                                        <p>Kontak</p>   
                                        <p>Tahun berdiri</p>   
                                        <p>Guru</p>
                                        <p>Siswa</p>
                                        <p>Berita</p>
                                    </div>
                                    <div class="col-6">
                                        <p>: {{ $temp->nspn }}</p>
                                        <p>: {{ $temp->kontak }}</p>
                                        <p>: {{ $temp->thn_berdiri }}</p>
                                        <p>: {{ $guru->count() }}</p>
                                        <p>: {{ $siswa->count() }}</p>
                                        <p>: {{ $berita->count() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection