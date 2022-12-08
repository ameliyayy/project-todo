@extends('layout')

@section('content')

    @csrf
    
    {{-- auth()->user->username berguna untuk memanggil data spesifik yaitu username user yang sudah login --}}
    <div class="container">
        <div class="mt-5">
            <p class="display-4 text-center">Selamat Datang <i class="fst-italic"> {{ auth()->user()->username }}</i>!</p>
            <p class="lead text-center"><?= date('l, d.m.Y');?></p>
            <hr class="mt-4 mb-5">
            <p class="display-6 fs-4 text-center">Hallo! Bagaimana keadaanmu hari ini? Aku harap kamu selalu dalam keadaan baik! </p>
            <p class="display-6 fs-4 text-center mt-5">"Do You Want To Give Up Because It's Not Easy?"</p>
            <p class="display-6 fs-5 text-center fst-italic">-Amelia Zulkarnaen</p>
        </div>
    </div>

    @if (session('isGuest'))    
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Kamu sudah login!',
            })
        </script>
    @endif

    @if (session('success'))    
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Login berhasil!',
            })
        </script>
    @endif
@endsection
