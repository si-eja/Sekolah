@extends('admin.temp')
@section('admin')
    <img src="{{ asset('asset/siswa.jpg') }}" alt=""
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
                <h3 class="text-style">Data siswa</h3>
                <a href="{{ route('addsis') }}" class="btn btn-success">Tambah data</a>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tahun Masuk</th>
                    <th>Aksi Lainnya</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>404111</td>
                    <td>Udin</td>
                    <td>Laki-laki</td>
                    <td>2025</td>
                    <td>
                        <a href="{{ route('editsis') }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td>404222</td>
                    <td>Asep</td>
                    <td>Laki-laki</td>
                    <td>2025</td>
                    <td>
                        <a href="{{ route('editsis') }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td>404333</td>
                    <td>Tini</td>
                    <td>Perempuan</td>
                    <td>2025</td>
                    <td>
                        <a href="{{ route('editsis') }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="p-4" style="background-color: rgb(19, 70, 134); height: 1rem;"></div>
        </div>
    </div>
@endsection