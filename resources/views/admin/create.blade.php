@extends('admin.template.header')

@section('appadmin')
    <div class="container-me border rounded px-5 shadow">
        <label class="h6 my-4">Tambah Data Karyawan</label>
        <form class="mb-4" action="/dashboard/employee" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nip" class="form-label ms-2">NIP</label>
                <input name="nip" type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" required>
                @error('nip')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label ms-2">Nama</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label ms-2">Alamat</label>
                <textarea name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                    style="height: 3rem" required></textarea>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label ms-2">Jenis Kelamin</label>
                <div class="block-jk d-flex flex-row">
                    <div class="form-check my-0">
                        <input name="gender" class="form-check-input" type="radio" name="flexRadioDefault" id="gender-m"
                            value="L" checked>
                        <label class="form-check-label" for="gender-m">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check mx-2 my-0">
                        <input name="gender" class="form-check-input" type="radio" name="flexRadioDefault" value="P"
                            id="gender-w">
                        <label class="form-check-label" for="gender-w">
                            Perempuan
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label ms-2">Jabatan</label>
                <input name="role" type="text" class="form-control @error('role') is-invalid @enderror" id="role" required>
                @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

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

            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
@endsection
