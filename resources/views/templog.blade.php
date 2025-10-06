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
    .text-style{
        color: white;
        text-shadow: 1px 1px 10px black;
    }
    .text-color{
        color: black;
        text-shadow: 1px 1px 10px whitesmoke;
    }
    .btn-style:hover{
        background: linear-gradient(45deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%) !important;
        border: 2px solid black;
        transform: translateY(-5px);
        box-shadow: 0 8px 15px whitesmoke;
        color: whitesmoke
    }
</style>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark"
         style="background: linear-gradient(315deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%) !important;">
        <div class="container py-3">
            <a class="nav-link active d-flex align-items-center" href="/" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">
                <img src="{{ asset('storage/'.$sch->logo) }}" alt="" style="height: 70px; width: 70px;">
                <h5 class="hovera lonjong" style="font-weight: bolder;">{{ $sch->nama }}</h5>
            </a>
        </div>
    </nav>
    @yield('login')
    <footer class="container-fluid" 
            style="height: fit-content; background: linear-gradient(135deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%);">
        <div class="container py-4">
            <div class="row"
                 style="margin-bottom: 3%;">
                <div class="col-12 col-md-5 d-flex justify-content-center mb-2">
                    <div class="d-flex gap-2">
                        <img src="{{ asset('storage/'.$sch->logo) }}" alt="" 
                             style="height: 180px; width: 180px;">
                        <div class="text-style">
                            <h3>{{ $sch->nama }}</h3>
                            <hr class="text-color">
                            <p class="mb-1"><i class="fa-solid fa-location-dot me-2"></i>{{ $sch->alamat }}</p>
                            <p class="mb-1"><i class="fa-solid fa-phone me-2"></i>{{ $sch->kontak }}</p>
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
                            <h6>@copyright {{ date('Y') }} {{ $sch->nama }}</h6>
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