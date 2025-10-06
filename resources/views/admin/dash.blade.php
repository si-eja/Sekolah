@extends('admin.temp')
@section('admin')
    <div class="container-fluid p-4"
         style="background: linear-gradient(315deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%);">
        <h3 class="text-style">Dashboard</h3>
    </div>
    <div style="background-color: rgb(253, 244, 227);
            display: flex;
            justify-content: center;
            width: 100%;">
        <div class="container py-4" 
        style="height: fit-content;">
            <div class="text-white d-flex justify-content-around row g-3">
                <div class="col-6 col-md-3">
                    <div class="bg bg-info p-3 rounded-3 h-100">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column align-items-start">
                                <h1>{{ $ekskul->count() }}</h1>
                                <h5>Ekstrakurikuler</h5>
                            </div>
                            <i class="fs-1 fa-solid fa-music opacity-75"></i>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="bg bg-primary p-3 rounded-3 h-100">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column align-items-start">
                                <h1>{{ $galeri->count() }}</h1>
                                <h5>Galeri</h5>
                            </div>
                            <i class="fs-1 fa-solid fa-photo-film opacity-75"></i>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="bg bg-warning p-3 rounded-3 h-100">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column align-items-start">
                                <h1>{{ $berita->count() }}</h1>
                                <h5>Berita</h5>
                            </div>
                            <i class="fs-1 fa-solid fa-bullhorn opacity-75"></i>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="bg bg-danger p-3 rounded-3 h-100">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column align-items-start">
                                <h1>{{ $user->count() }}</h1>
                                <h5>Pengurus</h5>
                            </div>
                            <i class="fs-1 fa-solid fa-user opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mt-5 d-flex justify-content-around g-4">
                <div class="bg bg-white rounded-3 col-md-6 p-4 mt-1" style="box-shadow: 2px 2px 4px black; border-top: 4px solid rgb(0, 132, 255);">
                    <h3>Rekan {{ Auth::user()->role }}</h3>
                    <hr>
                    <div class="overflow-auto h-75">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                            </tr>
                            </thead>
                            @foreach ($admin as $item)
                            <tbody>
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="bg bg-white rounded-3 col-md-6 mt-1" style="box-shadow: 2px 2px 4px black; border-top: 4px solid rgb(249, 65, 65);">
                    <div class="d-flex flex-column py-3 text-white">
                        <div class="w-100 rounded-2 p-3 bg-info d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column align-items-start">
                                <h3>Jumlah Siswa: {{ $siswa->count() }}</h3>
                            </div>
                            <i class="fs-1 fa-solid fa-user-graduate opacity-75"></i>
                        </div>
                        <hr>
                        <div class="w-100 rounded-2 p-3 bg-primary d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column align-items-start">
                                <h3>Jumlah Guru : {{ $guru->count() }}</h3>
                            </div>
                            <i class="fs-1 fa-solid fa-person-chalkboard opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div style="background-color: rgb(253, 244, 227);
            display: flex;
            justify-content: center;
            width: 100%;">
        <div class="container py-4" 
             style="height: fit-content;">
            <div class="bg bg-white w-100 p-3 rounded-5">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset('storage/'.$sch->ft_kepsek) }}" 
                            alt="" 
                            class="img-fluid rounded-5 mx-auto d-flex align-content-center">
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex flex-column">
                            <h3 class="fw-bold mb-4">{{ $sch->kepsek }}</h3>
                            <hr>
                            <h6 class="fw-medium mb-0">{{ $sch->deskripsi }}</h6>
                        </div>
                        <hr>
                        <a href="{{ route('editsch', Crypt::encrypt($sch->id)) }}" class="btn my-3 btn-primary w-100 fw-bold">Ubah Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4" style="background: linear-gradient(315deg, rgb(19, 70, 134) 0%, rgb(237, 63, 39) 50%); height: 1rem;"></div>
@endsection
