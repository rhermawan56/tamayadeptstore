@extends('logintemplate.header')
@section('applogin')
    @if (session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <form action="/login" method="POST">
        @csrf
        {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
        <h1 class="f-joan">Tamaya</h1>
        <h1 class="h5 mb-3">Login Member</h1>

        <div class="form-floating">
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput" class="text-start">Email</label>
            @error('email')
                <div class="invalid-feedback text-start" style="display: block">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating">
            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                id="floatingPassword" placeholder="Password">
            <label for="floatingPassword" class="text-start">Password</label>
            @error('password')
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
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p> --}}
    </form>
    <div class="ads">
        <p style="font-size: 0.7rem">Apakah anda sudah memiliki akun? <br>
            Dapatkan penawaran menarik dengan memiliki akun di website kami! <a href="/register/member">Buat Akun</a></p>
    </div>
@endsection
