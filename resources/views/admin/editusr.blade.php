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
                <h3 class="text-style">Edit User</h3>
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
            <form action="{{ route('userUpdate', Crypt::encrypt($user->id)) }}" method="post" class="p-2">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="name" id="nama" class="form-control" value="{{ $user->name }}">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}">
                    <label for="role" class="form-label">Level</label>
                    <select name="role" id="role" class="form-select">
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="operator" {{ $user->role == 'operator' ? 'selected' : '' }}>Operator</option>
                    </select>
                    <label for="password" class="form-label">Password</label>
                    <input type="text" name="password" id="password" class="form-control" placeholder="Ubah password(optional)">
                </div>
                <input type="submit" value="Edit" class="w-100 btn btn-success">
            </form>
            <div class="p-4" style="background: linear-gradient(315deg, rgb(19, 70, 134) 0%, rgb(237, 63, 39) 50%); height: 1rem;"></div>
        </div>
    </div>
@endsection