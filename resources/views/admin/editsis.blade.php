@extends('admin.temp')
@section('admin')
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
                <h3 class="text-style">Edit siswa</h3>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Validate Invalid</strong>
                    <ul>
                        @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('sisUpdate', Crypt::encrypt($siswa->id)) }}" method="post" class="p-2">
                @csrf
                <div class="mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" name="nisn" id="nisn" class="form-control" value="{{ $siswa->nisn }}">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $siswa->nama }}">
                        <label for="jk" class="form-label">Jenis kelamin</label>
                        <select name="jenis_kelamin" id="jk" class="form-select">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <label for="thn_masuk" class="form-label">Tahun masuk</label>
                        <input type="text" name="thn_masuk" id="thn_masuk" class="form-control" value="{{ $siswa->thn_masuk }}">
                </div>
                <input type="submit" value="Edit" class="w-100 btn btn-success">
            </form>
            <div class="p-4" style="background-color: rgb(19, 70, 134); height: 1rem;"></div>
        </div>
    </div>
@endsection