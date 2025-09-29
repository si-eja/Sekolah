@extends('admin.temp')
@section('admin')
    <img src="{{ asset('storage/guru.jpg') }}" alt=""
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
                    @foreach ($guru as $data)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/guru/'.$data->foto) }}" alt="" style="height: 80px; width: 80px;">
                        </td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->mapel }}</td>
                        <td>
                            <a href="{{ route('editgr',Crypt::encrypt($data->id)) }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ route('grDelete',Crypt::encrypt($data->id)) }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus dari keranjang?')">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4" style="background-color: rgb(19, 70, 134); height: 1rem;"></div>
        </div>
    </div>
@endsection