@extends('operator.temp')
@section('operator')
    <img src="{{ asset('asset/ekstra.jpg') }}" alt=""
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
                <h3 class="text-style">Ekstrakurikuler</h3>
                <a href="#" class="btn btn-success">Tambahan</a>
            </div>
            <div class="py-2 px-4" style="overflow-x: hidden; overflow-y: scroll; height: 360px;">
                <div class="row py-3"
                     style="border: 2px solid black">
                    <img src="{{ asset('asset/pmr.jpg') }}" alt="" class="col-md-2">
                    <div class="col-md-8 d-flex flex-column">
                        <h3>Palang Merah Remaja</h3>
                        <p>Palang Merah Remaja (PMR) sekolah melaksanakan kegiatan rutin dengan
                           penuh semangat dan kebersamaan. Anggota PMR tidak hanya belajar tentang
                           pertolongan pertama, tetapi juga dilatih disiplin, peduli, dan tanggap
                           terhadap lingkungan sekitar. Melalui kegiatan ini, diharapkan para
                           anggota semakin siap menjadi generasi muda yang berjiwa sosial serta
                           mampu memberikan manfaat bagi masyarakat.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Pembian : Usep</h6>
                            <h6 class="mb-0">Jadwal : Kamis</h6>
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