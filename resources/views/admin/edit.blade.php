@extends('admin.template.header')

@section('appadmin')
    <div class="container-me border rounded px-5 shadow">
        <label class="h6 my-4">Ubah Data Karyawan</label>
        <form class="mb-4" action="/dashboard/employee/{{ $employee->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label ms-2">Nama</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    value="{{ $employee->name }}" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label ms-2">Alamat</label>
                <textarea name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                    style="height: 3rem" required>{{ $employee->address }}</textarea>
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
                            value="L" @if ($employee->gender == 'L') checked @endif>
                        <label class="form-check-label" for="gender-m">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check mx-2 my-0">
                        <input name="gender" class="form-check-input" type="radio" name="flexRadioDefault" value="P"
                            id="gender-w" @if ($employee->gender == 'P') checked @endif>
                        <label class="form-check-label" for="gender-w">
                            Perempuan
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label ms-2">Jabatan</label>
                <input name="role" type="text" class="form-control @error('role') is-invalid @enderror" id="role"
                    value="{{ $employee->role }}" required>
                @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Ubah Data</button>
            <button id="btnEditLogin" data-id="{{ $employee->id }}" type="button" class="btn btn-success">Edit Data Login</button>
        </form>
    </div>
@endsection
