@extends('admin.temp')
@section('admin')
    <img src="{{ asset('storage/siswa.jpg') }}" alt=""
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
                <h3 class="text-style">Tambah siswa</h3>
            </div>
            <form action="" method="post" class="p-2">
                @csrf
                <div class="mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" name="nisn" id="nisn" class="form-control">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                        <label for="jk" class="form-label">Jenis kelamin</label>
                        <select name="jk" id="jk" class="form-select">
                            <option value="">Laki-laki</option>
                            <option value="">Perempuan</option>
                        </select>
                        <label for="thn_masuk" class="form-label">Tahun masuk</label>
                        <input type="text" name="thn_masuk" id="thn_masuk" class="form-control">
                </div>
                <input type="submit" value="Tambah" class="w-100 btn btn-success">
            </form>
            <div class="p-4" style="background-color: rgb(19, 70, 134); height: 1rem;"></div>
        </div>
    </div>
@endsection