<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="/assets/img/wikrama.png" type="image/x-icon">
    <title>Todo4u</title>
  </head>
  <body>
    @if (Auth::check()) {{-- supaya navbar muncul setelah login --}}
    <nav class="navbar navbar-expand-lg bg-light justify-content-between">
      <div class="ms-5">
        <a class="navbar-brand" href="/dashboard"><img src="/assets/img/wikrama.png" alt="" width="50px"></a>
      </div>
      <div class="container-fluid">
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNavAltMarkup">
          <div class="navbar-nav align-items-center">
            <a class="nav-link text-black" href="/dashboard">Home</a>
            <a class="nav-link text-black" href="/data">Todo</a>
            {{-- <a class="nav-link text-black" href="/create">Create</a> --}}
          </div>
        </div>
      </div>
      <button class="btn btn-danger me-5">
        <a class="nav-link" href="/logout">Logout</a>
      </button>
    </nav>
    @endif
    @yield('content')
    @include('sweetalert::alert')
  </body>
</html>
