@extends('templog')
@section('login')
    <div style="background-color: rgb(253, 244, 227);
            height: fit-content;
            margin-top: 7%;
            width: 100%;
            padding: 15% 0%;">
        <div class="container">
            <form action="{{ route('authLogin') }}" method="post">
                @csrf
                <div class="row rounded-3"
                     style="background-color: rgb(237, 63, 39);
                        padding: 6% 0%;">
                    <div class="col-12 col-md-6 d-flex flex-column text-center">
                        <h1>
                            <img src="{{ asset('asset/'.$sch->logo) }}" alt="" style="height: 250px; width: 250px;">
                        </h1>
                        <h3 class="lonjong hovera">{{ $sch->nama }}</h3>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column">
                        <h4 class="lonjong hovera">Username</h4>
                        <input type="text" name="username" id="username" class="form-control mb-2">
                        <h4 class="lonjong hovera">Password</h4>
                        <input type="password" name="password" id="password" class="form-control">
                        <button class="btn lonjong hovera" type="submit" style="width: 100%; background-color: rgb(19, 70, 134); margin-top: 17%;">Masuk</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection