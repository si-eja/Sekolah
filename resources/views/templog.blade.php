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
</head>
<style>
    .text-style {
        font-weight: bold;
        text-shadow: 3px 3px 4px rgb(237, 63, 39);
        color: rgb(254, 178, 26);
    }
    .text-color{
        color: rgb(253, 244, 227);
        text-shadow: 3px 3px 4px rgb(19, 70, 134);
    }
</style>
<body>
    <nav class="navbar navbar-expand-sm fixed-top" style="background-color: rgb(19, 70, 134);">
        <div class="container py-3">
            <li class="nav-item list-unstyled">
                <a class="nav-link active d-flex align-items-center" href="/admin" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">
                    <img src="{{ asset('storage/'.$sch->logo) }}" alt="" style="height: 80px; width: 80px;">
                    <h2 class="text-style" style="font-weight: bolder;">{{ $sch->nama }}</h2>
                </a>
            </li>
        </div>
    </nav>
    @yield('login')
    <footer class="container-fluid" 
            style="height: fit-content; background-color: rgb(19, 70, 134);">
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
                <div class="col-12 col-md-3 mb-2">
                    <div id="maps" style="width: 100%; height: 280px; overflow: auto; white-space: nowrap">
                        <img src="{{ asset('storage/'.$sch->ft_lokasi) }}" alt="" style="display: block; max-width: none; max-height: none;">
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