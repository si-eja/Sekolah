@extends('operator.temp')
@section('operator')
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
                 style="background: linear-gradient(315deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%);">
                <h3 class="text-style">Data guru</h3>
            </div>
            <div style="overflow-x: auto">
                <table class="table table-hover" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Mapel</th>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-4" style="background: linear-gradient(315deg, rgb(19, 70, 134) 0%, rgb(237, 63, 39) 50%); height: 1rem;"></div>
        </div>
    </div>
@endsection