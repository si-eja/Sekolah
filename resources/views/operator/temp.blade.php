<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $sch->nama }}</title>
    <link rel="shortcut icon" href="{{ asset('storage/'.$sch->logo) }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('Boostrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/fontawesome/css/all.min.css') }}">
    <style>
        .text-style{
            color: white;
            font-weight: bold;
            text-shadow: 3px 3px 4px black;
            text-decoration: none;
        }
        /* Sidebar tetap biru di desktop */
        #sidebarMenu {
            background: linear-gradient(90deg, rgb(19, 70, 134) 0%, rgb(237, 63, 39) 120%);
        }
        .font-nav{
            color: white;
            text-shadow: 2px 2px 3px black;
        }
        /* Warna teks */
        #sidebarMenu .text-style, 
        #sidebarMenu .sidebar-title {
            color: white;
            font-weight: bold;
            text-shadow: 2px 2px 3px black;
            text-decoration: none;
        }

        /* Hover efek */
        #sidebarMenu .text-style:hover {
            color: white;
            text-shadow: none;
        }

        .content-area {
            background-color: rgb(253, 244, 227);
            height: 100vh;
            overflow-y: auto;
            padding-top: 0 !important; /* default untuk desktop */
        }
        /* Biar rapi offcanvas di mobile */
        @media (max-width: 991px) {
            #sidebarMenu {
                width: 55%; /* lebar pas di hp */
            }
            .content-area {
                padding-top: 3rem !important; /* kasih jarak biar gak ketutup navbar */
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark d-lg-none fixed-top"
         style="background: linear-gradient(270deg, rgb(19, 70, 134) 0%, rgb(237, 63, 39) 50%)">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <span class="navbar-brand mb-0 h5 font-nav">Menu {{ Auth::user()->role }}</span>
            </div>
            
            <!-- Button Offcanvas -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" 
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <!-- Sidebar -->
            <div class="offcanvas-lg offcanvas-start col-lg-2 p-3"
                tabindex="-1"
                id="sidebarMenu"
                aria-labelledby="sidebarMenuLabel">
                <!-- body -->
                <div class="offcanvas-body d-flex flex-column align-items-start align-items-lg-start text-white">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/'.$sch->logo) }}" alt="Logo" 
                            style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">
                        <span class="navbar-brand mb-0 h3 text-style">{{ $sch->nama }}</span>
                    </div>
                    <h6 class="text-style mt-4">User: {{ Auth::user()->username }}</h6>
                    <hr class="border-3 w-100">
                    <!-- Menu -->
                    <div class="d-flex flex-column align-items-start gap-2 mb-4 w-100 sidebar-menu">
                        <a href="{{ route('operator') }}" class="text-style">
                            <h6>Dashboard</h6>
                        </a>
                        <!-- Warga Sekolah -->
                        <button class="btn btn-link text-style p-0" data-bs-toggle="collapse" data-bs-target="#wrgskCollapse" aria-expanded="false" aria-controls="layananCollapse">
                            <h6>Warga Sekolah</h6>
                        </button>
                        <div class="collapse ps-3" id="wrgskCollapse">
                            <a href="{{ route('guruO') }}" class="text-style d-block mb-2">Guru</a>
                            <a href="{{ route('siswaO') }}" class="text-style d-block mb-2">Siswa</a>
                        </div>
                        <!-- Layanan -->
                        <button class="btn btn-link text-style p-0" data-bs-toggle="collapse" data-bs-target="#layananCollapse" aria-expanded="false" aria-controls="layananCollapse">
                            <h6>Layanan</h6>
                        </button>
                        <div class="collapse ps-3" id="layananCollapse">
                            <a href="{{ route('berita') }}" class="text-style d-block mb-2">Berita</a>
                            <a href="{{ route('galeri') }}" class="text-style d-block mb-2">Galeri</a>
                            <a href="{{ route('ekskul') }}" class="text-style d-block">Ekstrakurikuler</a>
                        </div>
                    </div>

                    <hr class="border-3 w-100">
                    <a href="{{ route('authlogout') }}" class="btn w-100 btn-danger text-center">Logout</a>
                </div>
            </div>

            <!-- Konten -->
            <div class="col-lg-10 content-area" style="background-color: rgb(253, 244, 227); height: 100vh; padding-top: 5rem; overflow-y: auto;">
                @yield('operator')
            </div>
        </div>
    </div>
</body>
</html>
<script src="{{ asset('Boostrap/js/bootstrap.bundle.min.js') }}"></script>