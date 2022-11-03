<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>{{ $title }}</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/fonts.css">
    <link href="/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <main class="form-signin w-100 m-auto">
        @if (session()->has('authorization'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p class="m-0"><strong>Thanks</strong>, {{ session('authorization') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p class="m-0"><strong>Thanks</strong>, {{ session('gagal') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p class="m-0"><strong>Thanks</strong>, {{ session('success') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @yield('applogin')

    </main>
</body>

</html>
