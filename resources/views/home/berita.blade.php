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
            <h2 class="text-model"
                style="font-weight: bold;
                    padding-top: 5px;
                    margin-right: 40px;"
                data-aos="fade-right">
                Berita {{ $temp->nama }}
                <div class="w-50 p-1 rounded-5 m-1" style="background-color: rgb(19, 70, 134);"></div>
            </h2>
            <div class="bg bg-white w-100 p-3 rounded-5 shadow"
                 data-aos="fade-up">
                
            </div>
        </div>
    </div>
@endsection