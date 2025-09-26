@extends('operator.temp')
@section('operator')
    <div style="background: url('{{ asset('asset/nedusi.jpg') }}') no-repeat center center; 
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
                    color: rgb(237, 63, 39);">
                Kepala sekolah saat ini
            </h2>
            <div class="rounded-5" 
                 style="height: fit-content;
                    width: 100%;
                    background-color: rgb(237, 63, 39);
                    border: 3px solid black;">
                <div class="rounded-5 d-flex flex-column justify-content-center py-3 px-5"
                     style="background-color: rgb(19, 70, 134);">
                    <div class="row">
                        <div class="col-12 col-md-2 d-flex justify-content-center mb-3">
                            <img src="{{ asset('asset/'.$sch->ft_kepsek) }}" alt="" 
                                class="rounded-circle" 
                                style="height: 150px; width: 150px;
                                border: 5px solid rgb(254, 178, 26);">
                        </div>
                        <div class="col-12 col-md-6">
                            <h3 style="color: white; text-shadow: 2px 2px 4px rgb(254, 178, 26);">{{ $sch->kepsek }}</h3><br>
                            <h6 style="color: white; text-shadow: 2px 2px 4px rgb(254, 178, 26);">{{ $sch->nama }} adalah sekolah negeri berakreditasi A di Singaparna, Tasikmalaya.
                                Didirikan tahun {{ $sch->thn_berdiri }}, sekolah ini berkomitmen mencetak generasi cerdas dan berakhlak mulia.</h6>
                        </div>
                        <div class="col-md-4 mt-3 mt-md-0">
                            <div style="color: white; text-shadow: 2px 2px 4px rgb(254, 178, 26);">
                                <h5 class="fw-bold mb-3">Informasi Sekolah</h5>
                                <p class="mb-1"><i class="fas fa-chalkboard-teacher"></i> Jumlah guru: </p>
                                <p class="mb-1"><i class="fas fa-users"></i> Jumalh siswa:</p>
                                <p class="mb-0"><i class="fa-solid fa-school"></i> {{ $sch->nspn }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-5">
                    <h4 class="my-3 lonjong hovera">
                        Lokasi sekolah
                    </h4>
                    <img src="{{ asset('asset/'.$sch->ft_lokasi) }}" alt="" style="width: 100%; margin-bottom: 40px;" class="rounded-4">
                </div>
            </div>
        </div>
    </div>
@endsection
