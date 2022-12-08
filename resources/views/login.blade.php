@extends('layout')

@section('content')
<form action="{{ route('Login-baru') }}" method="post">
    @csrf
    <div class="container" style="margin-top: 170px;">
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-body">
                    <center>
                        <img src="/assets/img/wikrama.png" alt="" width="70px" class="mb-3">
                    </center>
                    <div class="mb-3">
                        <center>
                            <h4>Login Page</h4>
                        </center>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Insert Email">
                        @error('email')
                            <p class="text-danger fw-bold mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Insert Password">
                        @error('password')
                            <p class="text-danger fw-bold mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>        
                    <button type="submit" class="btn btn-primary d-flex mb-2" style="padding-right: 2.65cm; padding-left: 2.65cm">Submit</button>
                    <center>
                        <a href="/register" class="isLogin text-decoration-none">Don't have an account?</a>
                    </center>

                    @if (session('error'))
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Masukan Email dan Password dengan benar!',
                            })
                        </script>
                    @endif

                    @if (session('isLogin'))
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Silahkan Login terlebih dahulu',
                            })
                        </script>
                    @endif

                </div>
            </div>
        </div>
    </div>
</form>
@endsection
