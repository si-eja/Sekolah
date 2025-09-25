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
    .lonjong {
    font-weight: bold;
    display: inline-block;
    transform: scaleY(1.5);
    padding-top: 5px;
    margin-right: 40px;
    text-shadow: 3px 3px 4px rgb(19, 70, 134);
    }
</style>
<body>
    <nav class="navbar navbar-expand-sm fixed-top" style="background-color: rgb(237, 63, 39);">
        <div class="container py-3">
            <li class="nav-item list-unstyled">
                <a class="nav-link active d-flex align-items-center" href="/admin" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">
                    <img src="{{ asset('asset/'.$sch->logo) }}" alt="" style="height: 80px; width: 80px;">
                    <h2 class="hovera lonjong" style="font-weight: bolder;">{{ $sch->nama }}</h2>
                </a>
            </li>
        </div>
    </nav>
    @yield('login')
    <footer class="container-fluid" 
            style="height: fit-content;
                background-color: rgb(237, 63, 39);">
        <div class="container py-4">
            <div class="row"
                 style="margin-bottom: 8%;">
                <div class="col-12 col-md-6">
                    <div class="d-flex">
                        <img src="{{ asset('asset/'.$sch->logo) }}" alt="" 
                             style="height: 180px; width: 180px;">
                        <div>
                            <h2 style="color: rgb(254, 178, 26);
                                    text-shadow: 3px 3px 4px rgb(19, 70, 134);">
                                    {{ $sch->nama }}
                            </h2>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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