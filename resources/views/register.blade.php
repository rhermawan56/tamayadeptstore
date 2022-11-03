@extends('logintemplate.header')
@section('applogin')
    <form action="/register/member" method="POST">
        @csrf
        {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
        <h1 class="mb-3 f-joan">Tamaya</h1>
        <h1 class="h5">Registrasi Member</h1>

        <div class="form-floating">
            <input name="name" type="text" class="form-control rounded-0 rounded-top @error('name') is-invalid @enderror"
                id="floatingName" placeholder="Nama Lengkap" >
            <label for="floatingName" class="text-start">Nama Lengkap</label>
            @error('name')
                <div class="invalid-feedback text-start mt-0" style="display: block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-floating">
            <textarea name="address" type="text" class="form-control rounded-0 @error('address') is-invalid @enderror"
                id="floatingAddress" placeholder="Alamat Lengkap" style="height: 100px" ></textarea>
            <label for="floatingAddress" class="text-start">Alamat Lengkap</label>
            @error('address')
                <div class="invalid-feedback text-start mt-0" style="display: block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-floating">
            <input name="phone" type="text" class="form-control rounded-0 @error('phone') is-invalid @enderror"
                id="floatingPhone" placeholder="No Telepon" >
            <label for="floatingPhone" class="text-start">No Telepon</label>
            @error('phone')
                <div class="invalid-feedback text-start mt-0" style="display: block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-floating">
            <input name="email" type="email" class="form-control rounded-0 @error('email') is-invalid @enderror"
                id="floatingEmail" placeholder="Email" >
            <label for="floatingEmail" class="text-start">Email</label>
            @error('email')
                <div class="invalid-feedback text-start mt-0" style="display: block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-floating">
            <input name="password" type="password" class="form-control mb-0 rounded-0 @error('password') is-invalid @enderror"
                id="floatingPassword" placeholder="Sandi" >
            <label for="floatingPassword" class="text-start">Sandi</label>
            @error('password')
                <div class="invalid-feedback text-start mt-0" style="display: block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-floating">
            <input name="confirmpassword" type="confirmpassword" class="form-control rounded-0 rounded-bottom mb-3 @error('confirmpassword') is-invalid @enderror"
                id="floatingConfPassword" placeholder="Konfirmasi Sandi">
            <label for="floatingConfPassword" class="text-start">Konfirmasi Sandi</label>
            @error('confirmpassword')
                <div class="invalid-feedback text-start mt-0" style="display: block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div> --}}
        <button class="w-100 btn btn-lg btn-primary fs-6" type="submit">Buat Akun</button>
        {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p> --}}
    </form>
    <div class="ads">
        <a href="/login" style="font-size: 0.7rem">Login</a>
    </div>
@endsection
