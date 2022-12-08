@extends('layout')

@section('content')

    <form action="/update/{{ $todo['id'] }}" method="POST" style="max-width: 500px; margin: auto;">

        {{-- fungsi csrf untuk mengirim data ke controller yang ditampung oleh request $request --}}
        @csrf

        {{-- karena attribute method pada tag form cuman bisa get atau post sedangkan buat update data itu pake method patch jadi methof post di form ditimpa sama method patch ini --}}
        @method('PATCH')

        <div class="mt-5 d-flex justify-content-center">
            <h3>Edit Your Todo</h3>
        </div>

        <div class="mt-1 d-flex flex-column">
            <label class="form-label fw-bold">Title</label>

            {{-- attribute value berfungsi untuk menampilkan data di inputnya, data yang ditampilin merupakan data yang diambil di controller dan dikirim input compact tadi --}}
            <input type="text" name="title" value="{{ $todo['title'] }}" class="form-control">

            @error('title')
            <p class="text-danger fw-bold mt-2">
                {{ $message }}
            </p>            
            @enderror
        </div>

        <div class="mt-3 d-flex flex-column">
            <label class="form-label fw-bold">Date</label>
            <input type="date" name="date" value="{{ $todo['date'] }}" class="form-control">
            @error('date')
                <p class="text-danger fw-bold mt-2">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="my-3 d-flex flex-column">
            <label class="fw-bold form-label">Description</label>

            {{-- kenapa text area gak punya value? karena textarea bukan termasuk tag input/select dan dia punya penutup tag, jadi buat nampilinnya langsung tanpa attribute value (sebelum penutup text area) --}}
            <textarea name="description" cols="30" rows="10" class="form-control"> {{ $todo['description'] }} </textarea>
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
