{{-- @dd($data) --}}

@extends('admin.template.header')
@section('appadmin')
    {{-- <h5>Section title</h5> --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div id="messageDelete" class="alert alert-dismissible fade show" role="alert" style="display: none">
        <strong></strong><span></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $employee)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->role }}</td>
                        <td>{{ $employee->user->email }}</td>
                        <td>
                            <a id="updateEmployee" class="btn btn-warning badge"
                                href="/dashboard/employee/{{ $employee->id }}/edit"><span data-feather="edit"></span></a>
                            <button data-employee="{{ $employee->id }}" data-user="{{ $employee->user->id }}"
                                class="btn btn-danger badge btnDeleteEmployee"><span data-feather="trash-2"></span></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
