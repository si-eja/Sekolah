<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $temp->nama }}</title>
    <link rel="shortcut icon" href="{{ asset('storage/'.$temp->logo) }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('Boostrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aos-master/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('mySwiper/swiper.min.css') }}">
</head>
<style>
    .hovera{
        color: white;
    }
    .gepeng {
        font-weight: bold;
        display: inline-block;
        transform: scaleX(1.5);
        transform: scaley(1.4);
        margin-left: 5px;
        margin-right: 10px;
        text-shadow: 2px 2px 10px black;
    }
    .lonjong {
        font-weight: bold;
        display: inline-block;
        transform: scaleY(1.5);
        text-shadow: 2px 2px 10px black;
        padding-top: 5px;
        margin-right: 40px;
    }
    #navbar {
        background-color: transparent;
    }
    #navbar.scrolled {
        background: linear-gradient(315deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%);
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
        color: white;
        transition: background 0.2s, color 0.2s;
    }
    .navbar .dropdown-menu .dropdown-item:hover {
        background: rgb(19, 70, 134);
        color: #fff;
    }
    .text-style{
        color: white;
        text-shadow: 1px 1px 10px black;
    }
    .text-color{
        color: black;
        text-shadow: 1px 1px 10px whitesmoke;
    }
    .btn-style{
        background: linear-gradient(45deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%) !important;
        border: 2px solid whitesmoke;
    }
    .btn-style:hover{
        background: linear-gradient(315deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%) !important;
        border: 2px solid whitesmoke;
        transform: translateY(-5px);
        box-shadow: 0 8px 15px whitesmoke;
    }
    .btn-model{
        background: linear-gradient(45deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%) !important;
        border: 2px solid whitesmoke;
    }
    .btn-model:hover{
        background: black !important;
        border: 2px solid whitesmoke;
        transform: translateY(-5px);
        box-shadow: 0 8px 15px black;
    }
    .navbar-toggler {
        background: linear-gradient(45deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%) !important; /* background hitam */
        border: 1px solid whitesmoke;
        padding: 6px 10px;
        border-radius: 5px;
    }
    /* Styling umum untuk nav item */
    .navbar-nav .nav-item {
        margin: 6px 0;
    }
    .navbar-nav .nav-link {
        color: white !important;
        font-weight: 500;
        display: inline-block;
        transform: scaleY(1.5);
        text-shadow: 2px 2px 10px black;
        padding: 8px 12px;
        border-radius: 6px;
    }

    .navbar-nav .nav-link:hover {
        background: black;
        border: 2px solid white;
    }

    .dropdown-menu {
        background-color: black !important;
        border: none;
        border-radius: 6px;
    }

    .dropdown-item {
        color: white !important;
        padding: 8px 12px;
    }

    .dropdown-item:hover {
        background: linear-gradient(45deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%) !important;
    }

    /* Mobile khusus */
    @media (max-width: 991px) {
        .navbar-collapse.show {
            background-color: black !important;
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }

        .navbar-nav .nav-item {
            margin: 8px 0;
        }

        .dropdown-menu {
            background-color: black !important;
            border: 2px solid white;
            border-radius: 6px;
            margin-top: 5px;
        }
        .content-area {
            /* kasih jarak biar gak ketutup navbar */
            background: linear-gradient(315deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%) !important;
            height: 14%;
        }
        .navbar-nav .nav-link:hover {
            background: linear-gradient(315deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%);
            border: 2px solid white;
        }
        .berita{
            height: 20rem !important;
        }
    }
</style>
<body>
    <nav id="navbar" class="navbar navbar-expand-sm navbar-dark fixed-top" data-aos="fade-down">
    <div class="container py-3">
        <li class="nav-item list-unstyled">
            <a class="nav-link active d-flex align-items-center" href="/" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">
                <img src="{{ asset('storage/'.$temp->logo) }}" alt="" style="height: 70px; width: 70px;">
                <h5 class="hovera lonjong" style="font-weight: bolder;">{{ $temp->nama }}</h5>
            </a>
        </li>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <i class="fa-solid fa-bars" style="color:white; font-size:24px;"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hovera gepeng" href="#" role="button" data-bs-toggle="dropdown">Sekolah</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('info', Crypt::encrypt($temp->id)) }}">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Galeri</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link hovera gepeng" href="/#ekstra">Ekstrakurikuler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hovera gepeng" href="/#berita">Berita</a>
                </li>
            </ul>
        </div>
    </div>
    </nav>
    @yield('content')
    <footer class="container-fluid"
            style="height: fit-content; background: linear-gradient(135deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%);">
        <div class="container py-4">
            <div class="row"
                 style="margin-bottom: 3%;">
                <div class="col-12 col-md-5 d-flex justify-content-center mb-2">
                    <div class="d-flex gap-2">
                        <img src="{{ asset('storage/'.$temp->logo) }}" alt=""
                             style="height: 180px; width: 180px;">
                        <div class="text-style">
                            <h3>{{ $temp->nama }}</h3>
                            <hr class="text-color">
                            <p class="mb-1"><i class="fa-solid fa-location-dot me-2"></i>{{ $temp->alamat }}</p>
                            <p class="mb-1"><i class="fa-solid fa-phone me-2"></i>{{ $temp->kontak }}</p>
                        </div>
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
<script src="{{ asset('aos-master/dist/aos.js') }}"></script>
<script src="{{ asset('mySwiper/swiper.min.js') }}"></script>
<script>
    window.addEventListener('scroll', function () {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 170) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
    const navbarCollapse = document.getElementById('collapsibleNavbar');

    navbarCollapse.addEventListener('show.bs.collapse', function () {
    navbarCollapse.style.backgroundColor = "black";
    navbarCollapse.style.padding = "15px";
    navbarCollapse.style.borderRadius = "8px";
    navbarCollapse.style.boxShadow = "0 4px 8px rgba(0,0,0,0.3)";
    });

    navbarCollapse.addEventListener('hide.bs.collapse', function () {
    navbarCollapse.style.backgroundColor = "transparent";
    navbarCollapse.style.padding = "0";
    navbarCollapse.style.boxShadow = "none";
    });
    AOS.init();
</script>
