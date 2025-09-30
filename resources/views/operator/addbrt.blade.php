@extends('operator.temp')
@section('operator')
    <img src="{{ asset('storage/berita.jpg') }}" alt=""
         style="width: 100%;
            height: 400px;
            object-fit: cover;border-left: 2px solid black;
            border-right: 2px solid black;">
    <div class="conteinter-fluid"
         style="height: fit-content;
            background-color: rgb(253, 244, 227);">
        <div class="rounded-bottom-3"
             style="width: 100%;
                height: fit-content;
                border-left: 2px solid black;
                border-right: 2px solid black;
                border-bottom: 2px solid black;">
            <div class="d-flex justify-content-between p-4"
                 style="background-color: rgb(19, 70, 134);">
                <h3 class="text-style">Tambah Berita</h3>
                <a href="#" class="btn btn-success">Tambah berita</a>
            </div>
            <div class="py-2 px-4" style="overflow-x: hidden; overflow-y: scroll; height: 360px;">
                <div class="row py-3"
                     style="border: 2px solid black">
                    <img src="{{ asset('storage/ujian.jpg') }}" alt="" class="col-md-2">
                    <div class="col-md-8 d-flex flex-column">
                        <h3>Ujian dimulai pada 12 juni 2026</h3>
                        <p>Pelaksanaan ujian akhir semester di sekolah berlangsung dengan tertib dan lancar.
                           Para siswa tampak serius mengerjakan soal yang diberikan, sementara pengawas
                           memastikan jalannya ujian sesuai aturan. Ujian ini menjadi salah satu tolak ukur
                           capaian belajar siswa selama satu semester sekaligus evaluasi bagi sekolah dalam
                           meningkatkan kualitas pendidikan.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0"><i class="fa-solid fa-user"></i> : opr123</h6>
                            <h6 class="mb-0">5 juni 2026</h6>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex flex-column gap-4">
                        <a href="#" class="btn btn-sm btn-primary w-100">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger w-100">Hapus</a>
                    </div>
                </div>
            </div>
            <div class="p-4" style="background-color: rgb(19, 70, 134); height: 1rem;"></div>
        </div>
    </div>
@endsection