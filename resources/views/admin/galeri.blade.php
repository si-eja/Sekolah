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
            <table class="table table-hover">
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
                        <button class="btn btn-info text-white"
                                data-bs-toggle="modal"
                                data-bs-target="#detailModal"
                                data-judul="{{ $items->judul }}"
                                data-keterangan="{{ $items->keterangan }}"
                                data-kategori="{{ $items->kategori }}"
                                data-file="{{ asset('storage/galeri/' . ($items->kategori == 'Video' ? 'video/' : 'foto/') . $items->file) }}">
                        Detail
                        </button>
                        <a href="{{ route('editGlrA', Crypt::encrypt($items->id)) }}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal"
                            data-id="{{ Crypt::encrypt($items->id) }}"
                            data-judul="{{ $items->judul }}">
                            Hapus
                        </button>
                    </td>
                </tr>
                </tbody>
                @endforeach
            </table>
            <div class="p-4" style="background: linear-gradient(315deg, rgb(19, 70, 134) 0%, rgb(237, 63, 39) 50%); height: 1rem;"></div>
        </div>
    </div>
    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah kamu yakin ingin menghapus <strong id="judulGaleri"></strong> ?</p>
            </div>
            <div class="modal-footer">
                <form id="formDelete" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailJudul" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <!-- Judul yang akan diubah via JS -->
                <h5 class="modal-title" id="detailJudul">Judul Default</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Keterangan:</strong></p>
                <p id="keteranganGaleri"></p>
                <div class="text-center mt-3" id="filePreview"></div>
            </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const judul = button.getAttribute('data-judul');
                const keterangan = button.getAttribute('data-keterangan');
                const kategori = button.getAttribute('data-kategori');
                const file = button.getAttribute('data-file');

                // ubah title modal jadi nama judul galeri
                document.getElementById('detailJudul').textContent = judul;

                // set action form memakai placeholder yang diganti di JS
                const form = document.getElementById('formDelete');
                form.action = "{{ route('glrDeleteA', ['id' => ':id']) }}".replace(':id', id);
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('detailModal');

            modal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const judul = button.getAttribute('data-judul');
                const keterangan = button.getAttribute('data-keterangan');
                const kategori = button.getAttribute('data-kategori');
                const file = button.getAttribute('data-file');

                // 🟢 Pastikan id di bawah sesuai dengan elemen di modal
                document.getElementById('detailJudul').textContent = judul;
                document.getElementById('keteranganGaleri').textContent = keterangan;

                const filePreview = document.getElementById('filePreview');
                filePreview.innerHTML = '';

                if (kategori.toLowerCase() === 'video') {
                const video = document.createElement('video');
                video.src = file;
                video.controls = true;
                video.style.width = '100%';
                video.style.maxHeight = '400px';
                filePreview.appendChild(video);
                } else {
                const img = document.createElement('img');
                img.src = file;
                img.alt = judul;
                img.style.width = '100%';
                img.style.maxHeight = '400px';
                img.style.objectFit = 'cover';
                filePreview.appendChild(img);
                }
            });
        });
    </script>
@endsection