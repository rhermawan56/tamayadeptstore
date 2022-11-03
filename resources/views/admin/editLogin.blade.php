@extends('admin.template.header')

@section('appadmin')
    <div class="container-me border rounded px-5 shadow">
        <label class="h6 my-4">Ubah Data Karyawan</label>
        <form class="mb-4" action="/dashboard/employee/{{$employee->id}}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label ms-2">Email</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label ms-2">Sandi</label>
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="confirm-password" class="form-label ms-2">Konfirmasi Sandi</label>
                <input name="confirmPassword" type="password" class="form-control @error('confirmPassword') is-invalid @enderror"
                    id="confirm-password" required>
                @error('confirmPassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Ubah Data</button>
            <button id="btnEditLogin" type="button" class="btn btn-success">Edit Data Login</button>
        </form>
    </div>
@endsection
