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
                 style="background: linear-gradient(315deg, rgb(237, 63, 39) 0%, rgb(19, 70, 134) 90%);">
                <h3 class="text-style">Galeri Sekolah</h3>
                <div class="d-flex gap-3">
                    <a href="{{ route('addvidA') }}" class="btn btn-success">Tambah Video</a>
                    <a href="{{ route('addftA') }}" class="btn btn-success">Tambah Foto</a>
                </div>
            </div>
            <table class="table table-hover display">
                <thead>
                <tr>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>Kategori</th>
                    <th>Tanggal Upload</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                @foreach ($glr as $items)
                <tbody>
                <tr>
                    <td>{{ $items->judul }}</td>
                    <td>{{ $items->keterangan }}</td>
                    <td>{{ $items->kategori }}</td>
                    <td>{{ $items->tanggal }}</td>
                    <td>
                        <!-- Tombol Detail -->
                        <button class="btn btn-info text-white"
                            data-bs-toggle="modal"
                            data-bs-target="#detailModal{{ $items->id }}">
                            Detail
                        </button>
                        <a href="{{ route('editGlrA', Crypt::encrypt($items->id)) }}" class="btn btn-primary">Edit</a>
                        <!-- Tombol Hapus -->
                        <button class="btn btn-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $items->id }}">
                            Hapus
                        </button>
                    </td>
                </tr>
                </tbody>
                <!-- Modal Detail -->
                <div class="modal fade" id="detailModal{{ $items->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $items->judul }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Keterangan:</strong> {{ $items->keterangan }}</p>
                                <p><strong>Kategori:</strong> {{ $items->kategori }}</p>
                                <p><strong>Tanggal:</strong> {{ $items->tanggal }}</p>

                                @if ($items->kategori == 'Foto')
                                    <img src="{{ asset('storage/galeri/foto/' . $items->file) }}" class="img-fluid" alt="Foto">
                                @elseif ($items->kategori == 'Video')
                                    <video class="w-100" controls>
                                        <source src="{{ asset('storage/galeri/video/' . $items->file) }}" type="video/mp4">
                                    </video>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Hapus -->
                <div class="modal fade" id="deleteModal{{ $items->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p>Yakin ingin menghapus data <strong>{{ $items->judul }}</strong>?</p>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('glrDeleteA', Crypt::encrypt($items->id)) }}" class="btn btn-danger">Hapus</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </table>
            <div class="p-4" style="background: linear-gradient(315deg, rgb(19, 70, 134) 0%, rgb(237, 63, 39) 50%); height: 1rem;"></div>
        </div>
    </div>
@endsection
