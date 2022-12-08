@extends('layout') 

@section('content') 
<div class="container mt-5 pb-3">
    <div class="row ">
        <div>
            <div class="mb-2 d-flex justify-content-center">
                <h3>Your Todo</h3>
            </div>
            <div class="mb-1 d-flex justify-content-end">
                <a href="/create" class="btn btn-primary">Add Todo</a> 
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th> 
                        <th scope="col">Activity</th> 
                        <th scope="col">Description</th> 
                        <th scope="col">Deadline</th> 
                        <th scope="col">Status</th> 
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <?php $no=1; ?>
                <?php foreach ($todos as $todo) : ?>

                <tbody>
                    <tr>
                        {{-- tiap di looping, $no bakal ditambah 1--}}
                        <th scope="row">{{ $no++ }}</th> 
                        <td>{{ $todo['title'] }}</td> 
                        <td>{{ $todo['description'] }}</td> 

                        {{-- carbon : package date pada laravel, nantinya si date yang 2022-11-22 formatnya jadi 22 november, 2022--}} 
                        <td>{{ \Carbon\Carbon::parse($todo['date'])->format('d F Y') }}</td> 

                        {{-- Konsep ternary, if statusnya 1 nampilin teks complated kalo 0 nampilin teks on-process status tuh boolean kan? cuman antara 1 dan 0 --}} 
                        <td>{{ $todo['status'] ?  'Complated' : 'On-Process' }}</td>
                        <td>
                            <div class="d-flex">
                                {{-- karena path {$id} merupakan path dinamis, jadi kita harus isi path dinamis tersebut, karena kita mengisinya dengan data dinamis/data dari databse jadi buat isinya pake string kurawal dua kali --}}
                                @if ($todo['status'] == 0)
                                    <a href="/edit/{{$todo['id']}}">                                        
                                        <button type="submit" class="badge btn btn-primary ms-1">Edit</button>
                                    </a>
                                @endif
                                
                                {{-- button hanya muncul ketika statusnya masih on-proccess (0) --}}
                                @if ($todo['status'] == 0)
                                    <form action="/complated/{{$todo['id']}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="badge btn btn-success ms-1">Completed</button>
                                    </form>
                                @endif
    
                                {{-- fitur delete harus menggunakan form lagi, tombol hapusnya disimpan di tag button --}}
                                <form action="/delete/{{ $todo['id'] }}" method="post">
                                    @csrf
                                    {{-- menimpan method="POST", karena di routenya menggubakan method delete --}}
                                    @method('DELETE')
                                    <button type="submit" href="/delete/{{ $todo['id'] }}" class="badge btn btn-danger ms-1" onclick="return confirm('are you sure?');">delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>

                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

@if (session('done'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Selamat!',
            text: 'ToDo telah selesai dikerjakan',
        })
    </script>
@endif

@if (session('successUpdate'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Selamat!',
            text: 'ToDo berhasil diedit',
        })
    </script>
@endif

@if (session('delete'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Selamat!',
            text: 'ToDo berhasil dihapus',
        })
    </script>
@endif

@if (session('addTodo'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Selamat!',
            text: 'ToDo berhasil ditambahkan',
        })
    </script>
@endif
    
@endsection
