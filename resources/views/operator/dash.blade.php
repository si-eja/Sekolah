@extends('operator.temp')
@section('operator')
    <div style="background: url('{{ asset('storage/'.$sch->foto) }}') no-repeat center center; 
            background-size: cover; 
            width: 100%; 
            display: flex; 
            justify-content: space-between;
            padding-top: 20%;
            padding-bottom: 15%;">
        <div class="container">
            <h1 style="color: white; text-shadow: 2px 2px 4px rgb(19, 70, 134);">
                Kami {{ $sch->nama }}
            </h1><br>
            <h5 style="color: white; text-shadow: 2px 2px 4px rgb(19, 70, 134);">
                Mewujudkan peserta didik yang beriman, berkarakter,<br>
                cerdas, dan berdaya saing di era global.
            </h5>
        </div>
    </div>
    <div class="container-fluid py-4"
         style="background: linear-gradient(315deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%);">
        <h3 class="text-style">Dashboard</h3>
    </div>
    <div style="background-color: rgb(253, 244, 227);
            display: flex;
            justify-content: center;
            width: 100%;">
        <div class="container py-4" 
        style="height: fit-content;">
            <h2 style="font-weight: bold;
                    padding-top: 5px;
                    margin-right: 40px;
                    text-shadow: 3px 3px 4px rgb(254, 178, 26);
                    color: rgb(19, 70, 134);">
                Kepala sekolah saat ini
            </h2>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('storage/'.$sch->ft_kepsek) }}" 
                        alt="" 
                        class="img-fluid rounded-5 border border-4 border-dark mx-auto d-flex align-content-center">
                </div>
                <div class="col-md-9">
                    <div class="d-flex flex-column">
                        <h3 class="fw-bold mb-4">{{ $sch->kepsek }}</h3>
                        <hr>
                        <h5 class="fw-bold mb-0">{{ $sch->deskripsi }}</h5>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4" style="background: linear-gradient(315deg, rgb(19, 70, 134) 0%, rgb(237, 63, 39) 50%); height: 1rem;"></div>
@endsection
