@extends('layout')

@section('content')                    
<form method="POST" action="/register">
    @csrf
    <div class="container" style="margin-top: 100px;">
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-body">
                    <center>
                        <img src="/assets/img/wikrama.png" alt="" width="70px" class="mb-3">
                    </center>
                    <div class="mb-3">
                        <center>
                            <h4>Register Page</h4>
                        </center>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Insert Email">
                        @error('email')
                            <p class="text-danger fw-bold mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Insert Name">
                        @error('name')
                            <p class="text-danger fw-bold mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Insert Username">
                        @error('username')
                            <p class="text-danger fw-bold mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input  type="password" class="form-control" name="password" placeholder="Insert Password">
                        @error('password')
                            <p class="text-danger fw-bold mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary d-flex mb-2" style="padding-right: 2.65cm; padding-left: 2.65cm"">Submit</button>
                    <center>
                        <a href="/" class="isLogin text-decoration-none">Have an account?</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
