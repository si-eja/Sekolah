<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMPN 2 Singaparna</title>
    <link rel="shortcut icon" href="{{ asset('asset/logo_nedusi.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('Boostrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/fontawesome/css/all.min.css') }}">
</head>
<style>
    .hovera{
        color: rgb(254, 178, 26);
    }
    .gepeng {
        font-weight: bold;
        display: inline-block;
        transform: scaleX(1.5);
        transform: scaley(1.4);
        margin-left: 5px;
        margin-right: 10px;
        text-shadow: 1px 1px 4px rgb(19, 70, 134);
    }
    .lonjong {
        font-weight: bold;
        display: inline-block;
        transform: scaleY(1.5);
        padding-top: 5px;
        margin-right: 40px;
        text-shadow: 1px 1px 4px rgb(19, 70, 134);
    }
    #navbar {
        background-color: transparent;
    }
    #navbar.scrolled {
        background-color: rgb(19, 70, 134);
    }
    .navbar .dropdown-menu {    
        border-radius: 12px;
        padding: 10px;
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        border: none;
        transform: translateY(10px);
        opacity: 0;
        visibility: hidden;
        transition: all 1s ease;
    }
    .navbar .dropdown-menu.show {
        transform: translateY(0);
        opacity: 1;
        visibility: visible;
    }
    .navbar .dropdown-menu .dropdown-item {
        border-radius: 8px;
        padding: 8px 15px;
        font-weight: 500;
        color: #333;
        transition: background 0.2s, color 0.2s;
    }
    .navbar .dropdown-menu .dropdown-item:hover {
        background: rgb(19, 70, 134);
        color: #fff;
    }
    .text-style{
        color: rgb(254, 178, 26);
        text-shadow: 3px 3px 4px rgb(237, 63, 39);
    }
    .text-color{
        color: rgb(253, 244, 227);
        text-shadow: 3px 3px 4px rgb(19, 70, 134);
    }
    .text-model{
        color: rgb(19, 70, 134);
        text-shadow: 3px 3px 4px rgb(254, 178, 26);
    }
</style>
<body>
    <nav id="navbar" class="navbar navbar-expand-sm navbar-dark fixed-top">
    <div class="container py-3">
        <li class="nav-item list-unstyled">
            <a class="nav-link active d-flex align-items-center" href="/" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">
                <img src="{{ asset('asset/'.$temp->logo) }}" alt="" style="height: 80px; width: 80px;">
                <h5 class="hovera lonjong" style="font-weight: bolder;">{{ $temp->nama }}</h5>
            </a>
        </li>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hovera gepeng" href="#" role="button" data-bs-toggle="dropdown">Profile</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Sekolah</a></li>
                        <li><a class="dropdown-item" href="#">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="#">Galeri</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link hovera gepeng" href="#ekstra">Ekstrakurikuler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hovera gepeng" href="#berita">Berita</a>
                </li>
            </ul>
        </div>
    </div>
    </nav>
    @yield('content')
    <footer class="container-fluid" 
            style="height: fit-content; background-color: rgb(19, 70, 134);">
        <div class="container py-4">
            <div class="row"
                 style="margin-bottom: 3%;">
                <div class="col-12 col-md-5 d-flex justify-content-center mb-2">
                    <div class="d-flex gap-2">
                        <img src="{{ asset('asset/'.$temp->logo) }}" alt="" 
                             style="height: 180px; width: 180px;">
                        <div class="text-style">
                            <h3>{{ $temp->nama }}</h3>
                            <hr class="text-color">
                            <p class="mb-1"><i class="fa-solid fa-location-dot me-2"></i>{{ $temp->alamat }}</p>
                            <p class="mb-1"><i class="fa-solid fa-phone me-2"></i>{{ $temp->kontak }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <div id="maps" style="width: 100%; height: 280px; overflow: auto; white-space: nowrap">
                        <img src="{{ asset('asset/'.$temp->ft_lokasi) }}" alt="" style="display: block; max-width: none; max-height: none;">
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center">
                    <div>
                        <h3 class="text-style" style="text-align: center">Media Sosial</h3>
                        <hr class="text-color">
                        <div class="row">
                            <div class="d-flex justify-content-center align-items-center fs-3 gap-3">
                                <a href="https://www.instagram.com/nedusi_official/"
                                   class="text-style">
                                   <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a href="https://www.youtube.com/@smpnegeri2singaparna989"
                                   class="text-style">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                                <a href="https://www.facebook.com/p/SMPN-2-Singaparna-100083679584425/"
                                   class="text-style">
                                    <i class="fa-brands fa-square-facebook"></i>
                                </a>
                            </div>
                        </div>
                        <hr class="text-color">
                        <div class="container text-center text-style">
                            <h6>@copyright {{ date('Y') }} {{ $temp->nama }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
<script src="{{ asset('Boostrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    window.addEventListener('scroll', function () {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 200) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
    window.addEventListener("load", function() {
        let container = document.getElementById("maps");
        container.scrollLeft = (container.scrollWidth - container.clientWidth) / 2;
        container.scrollTop = (container.scrollHeight - container.clientHeight) / 2;
    });
</script>