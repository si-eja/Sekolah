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
                <h3 class="text-style">Data User</h3>
                <a href="{{ route('adduser') }}" class="btn btn-success">Tambah data</a>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Aksi Lainnya</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($user as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->role }}</td>
                        <td>
                            <a href="{{ route('edituser',Crypt::encrypt($data->id)) }}" class="btn btn-sm btn-primary">Edit</a>
                            {{-- <a href="{{ route('sisDelete',Crypt::encrypt($data->id)) }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus dari data?')">Hapus</a> --}}
                            <button class="btn btn-sm btn-danger" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#deleteUserModal"
                                    data-id="{{ Crypt::encrypt($data->id) }}"
                                    data-nama="{{ $data->name }}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                Apakah kamu yakin ingin menghapus User <b id="namaUser"></b>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <a href="#" id="btnDeleteUser" class="btn btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </table>
            <div class="p-4" style="background: linear-gradient(315deg, rgb(19, 70, 134) 0%, rgb(237, 63, 39) 50%); height: 1rem;"></div>
            <script>
                const deleteUserModal = document.getElementById('deleteUserModal');
                deleteUserModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const id = button.getAttribute('data-id');
                    const nama = button.getAttribute('data-nama');

                    // Tampilkan nama user di modal
                    document.getElementById('namaUser').textContent = name;

                    // Isi link hapus sesuai route sisDelete
                    const deleteBtn = document.getElementById('btnDeleteUser');
                    deleteBtn.href = "{{ route('userDelete', ['id' => ':id']) }}".replace(':id', id);
                });
            </script>
        </div>
    </div>
@endsection