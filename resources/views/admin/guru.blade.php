@extends('admin.temp')
@section('admin')
    <img src="{{ asset('asset/guru.jpg') }}" alt=""
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
                <h3 class="text-style">Data guru</h3>
                <a href="{{ route('addgr') }}" class="btn btn-success">Tambah data</a>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Mapel</th>
                    <th>Aksi Lainnya</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <img src="{{ asset('asset/ft_guru.png') }}" alt="" style="height: 80px; width: 80px;">
                    </td>
                    <td>Udin Sp.</td>
                    <td>98070320251001</td>
                    <td>Penjas Orkes</td>
                    <td>
                        <a href="{{ route('editgr') }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="{{ asset('asset/ft_guru.png') }}" alt="" style="height: 80px; width: 80px;">
                    </td>
                    <td>Baban Sp. Skom</td>
                    <td>90070320251002</td>
                    <td>Bimbingan konseling</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="{{ asset('asset/ft_guru.png') }}" alt="" style="height: 80px; width: 80px;">
                    </td>
                    <td>Kokom Sp. S.Pai</td>
                    <td>89070320252003</td>
                    <td>Pendidikan agama islam</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="p-4" style="background-color: rgb(19, 70, 134); height: 1rem;"></div>
        </div>
    </div>
@endsection