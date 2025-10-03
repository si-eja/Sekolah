@extends('admin.temp')
@section('admin')
    <div style="background: url('{{ asset('storage/'.$sch->foto) }}')
            no-repeat center center; 
            background-size: cover; 
            width: 100%; 
            display: flex; 
            justify-content: space-between;
            padding-top: 20%;
            padding-bottom: 15%;">
        <div class="container">
            <h1 style="color: white; text-shadow: 2px 2px 4px black">
                Kami {{ $sch->nama }}
            </h1><br>
            <h5 class="col-7" style="color: white; text-shadow: 2px 2px 4px black">
                {{ $sch->visi_misi }}
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
            <h2 class="text-dark fw-bold text-center">
                Kepala sekolah saat ini
            </h2>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('storage/'.$sch->ft_kepsek) }}" 
                        alt="" 
                        class="img-fluid rounded-5 border border-4 border-dark">
                </div>
                <div class="col-md-9">
                    <div class="d-flex flex-column">
                        <h3 class="fw-bold mb-4">{{ $sch->kepsek }}</h3>
                        <hr>
                        <h5 class="fw-bold mb-0">{{ $sch->deskripsi }}</h5>
                    </div>
                    <hr>
                    <a href="{{ route('editsch', Crypt::encrypt($sch->id)) }}" class="btn my-3 btn-primary w-100 fw-bold">Ubah Profile</a>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4" style="background: linear-gradient(315deg, rgb(19, 70, 134) 0%, rgb(237, 63, 39) 50%); height: 1rem;"></div>
@endsection
