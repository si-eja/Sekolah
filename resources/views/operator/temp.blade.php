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
    text-shadow: 3px 3px 4px rgb(19, 70, 134);
    }
    .lonjong {
    font-weight: bold;
    display: inline-block;
    transform: scaleY(1.5);
    padding-top: 5px;
    margin-right: 40px;
    text-shadow: 3px 3px 4px rgb(19, 70, 134);
    }   
    #navbar {
    background-color: transparent;
    }
    #navbar.scrolled {
        background-color: rgb(237, 63, 39);
    }
</style>
<body>
    <nav id="navbar" class="navbar navbar-expand-sm navbar-dark fixed-top">
        <div class="container py-3">
            <li class="nav-item list-unstyled">
                <a class="nav-link active d-flex align-items-center" href="/admin" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">
                    <img src="{{ asset('asset/logo_nedusi.png') }}" alt="" style="height: 80px; width: 80px;">
                    <h5 class="hovera lonjong" style="font-weight: bolder;">{{ $sch->nama }}</h5>
                </a>
            </li>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link hovera gepeng" href="#">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hovera gepeng" href="#">Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hovera gepeng" href="#">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hovera gepeng btn" href="#" style="background-color: rgb(255, 0, 0); border: 1px solid black; width: 100%;">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('admin')
    <div class="container-fluid mb-auto" 
         style="background-color: rgb(254, 178, 26);
            height: fit-content;
            padding: 10px 0%;">
            <div class="container text-center">
                <h6>@copyright {{ date('Y') }}</h6>
            </div>
    </div>
</body>
</html>
<script src="{{ asset('Boostrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    window.addEventListener('scroll', function () {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>