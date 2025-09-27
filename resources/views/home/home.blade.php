@extends('home.temp')
@section('content')
    <div style="background: url('{{ asset('asset/nedusi.jpg') }}') no-repeat center center; 
            background-size: cover; 
            width: 100%; 
            display: flex; 
            justify-content: space-between;
            padding-top: 20%;
            padding-bottom: 15%;">
        <div class="container">
            <h1 style="color: white; text-shadow: 2px 2px 4px rgb(19, 70, 134);">
                Selamat Datang di<br>
                {{ $temp->nama }}
            </h1><br>
            <h3 style="color: white; text-shadow: 2px 2px 4px rgb(19, 70, 134);">
                Mewujudkan peserta didik yang beriman, berkarakter,<br>
                cerdas, dan berdaya saing di era global.
            </h3>
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
                    margin-right: 40px;">
                Sambutan kepala sekolah
            </h2>
            <div class="rounded-5" 
                 style="height: fit-content;
                    width: 100%;
                    background-color: rgb(237, 63, 39);
                    border: 3px solid black;">
                <div class="rounded-5 py-3 px-5" style="background-color: rgb(19, 70, 134);">
                    <div class="row"
                        style="background-color: rgb(19, 70, 134);">
                        <div class="col-12 col-md-2 d-flex justify-content-center mb-3">
                            <img src="{{ asset('asset/'.$temp->ft_kepsek) }}" alt="" 
                                class="rounded-circle" 
                                style="height: 150px; width: 150px;
                                border: 5px solid rgb(254, 178, 26);">
                        </div>
                        <div class="col-12 col-md-6">
                            <h3 class="text-style">{{ $temp->kepsek }}</h3><br>
                            <h6 class="text-style">{{ $temp->nama }} adalah sekolah negeri berakreditasi A di Singaparna, Tasikmalaya.
                                Didirikan tahun {{ $temp->thn_berdiri }}, sekolah ini berkomitmen mencetak generasi cerdas dan berakhlak mulia.</h6>
                        </div>
                        <div class="col-md-4 mt-3 mt-md-0">
                            <div class="text-style">
                                <h5 class="fw-bold mb-3">Informasi Sekolah</h5>
                                <p class="mb-1"><i class="fas fa-chalkboard-teacher"></i> Jumlah guru: </p>
                                <p class="mb-1"><i class="fas fa-users"></i> Jumalh siswa:</p>
                                <p class="mb-0"><i class="fa-solid fa-school"></i> nspn: {{ $temp->nspn }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-5">
                    <h4 class="mt-3 text-color">
                        Tenaga kerja
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4"
         id="ekstra"
         style="background-color: rgb(19, 70, 134);
            height: fit-content;">
        <div class="container text-center">
            <h3 class="text-style">Ekstrakurikuler</h3>

        </div>
    </div>
    <div class="container-fluid py-4"
         id="berita"
         style="background-color: rgb(253, 244, 227);
            height: fit-content;">
        <div class="container text-center">
            <h3 class="text-model">Berita sekolah</h3>

        </div>
    </div>
@endsection