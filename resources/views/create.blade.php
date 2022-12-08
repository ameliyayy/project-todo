@extends('layout')

@section('content')
    <form action="/store" method="POST" style="max-width: 500px; margin: auto;">
        @csrf
        <div class="mt-5 d-flex justify-content-center">
            <h3>Add Your Todo</h3>
        </div>        
        <div class="mt-1 d-flex flex-column">
            <label class="form-label fw-bold">Title</label>
            <input type="text" name="title" class="form-control">
            @error('title')
                <p class="text-danger fw-bold mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mt-3 d-flex flex-column">
            <label class="form-label fw-bold">Date</label>
            <input type="date" name="date" class="form-control">
            @error('date')
                <p class="text-danger fw-bold mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="my-3 d-flex flex-column">
            <label class="fw-bold form-label">Description</label>
            <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
            @error('description')
                <p class="text-danger fw-bold mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="me-2 btn btn-primary">Submit</button>
            <a href="/data" class="btn btn-primary">Back</a>
        </div>
    </form>
@endsection
