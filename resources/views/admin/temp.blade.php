<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $sch->nama }}</title>
    <link rel="shortcut icon" href="{{ asset('asset/'.$sch->logo) }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('Boostrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/fontawesome/css/all.min.css') }}">
    <style>
        .text-style{
            color: rgb(254, 178, 26);
            font-weight: bold;
            text-shadow: 3px 3px 4px rgb(237, 63, 39);
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
    <div class="row" style="height: 100vh;">
        <div class="col-2 "
             style="background-color: rgb(19, 70, 134);">
            <div class="d-flex flex-column align-items-center">
                <img src="{{ asset('asset/'.$sch->logo) }}" alt="" style="width: 80px; height: 80px;">
                <h4 class="text-center" 
                    style="color: rgb(254, 178, 26); 
                        font-weight: bold; 
                        text-shadow: 3px 3px 4px rgb(237, 63, 39);">
                    {{ $sch->nama }}
                </h4>
            </div>
            <hr class="border-3">
            <div class="d-flex flex-column align-items-start gap-2 mb-4"
                 style="color: rgb(254, 178, 26);
                    font-weight: bold;
                    text-shadow: 3px 3px 4px rgb(237, 63, 39);">
                <a href="{{ route('admin') }}" style="text-decoration: none;">
                    <h4 class="text-style">Dashboard</h4>
                </a>
                <h4 class="text-style">Warga Sekolah</h4>
                <a href="{{ route('guru') }}" class="text-style">Guru</a>
                <a href="#" class="text-style">Siswa</a>
                <h4 class="text-style">Kepengurusan</h4>
                <a href="#" class="text-style">Admin</a>
                <a href="#" class="text-style">Operator</a>
            </div>
            <hr class="border-3">
            <a href="{{ route('authlogout') }}" class="btn w-100 btn-danger text-center">Logout</a>
        </div>
        <div class="col-10"
             style="background-color: rgb(253, 244, 227);
                height: 100%;
                overflow: auto;">
            @yield('admin')
        </div>
    </div>
</div>
</body>
</html>