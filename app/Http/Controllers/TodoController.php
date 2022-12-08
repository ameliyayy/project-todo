<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Menampilkan halaman awal dan semua data
        return view('login');
    }

    public function dashboard()
    {
        //Menampilkan halaman awal dan semua data
        return view('dashboard');
    }

    public function register()
    {
        //Menampilkan halaman awal dan semua data
        return view('register');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Menampilkan halaman form input tambah data
        return view('create');
    }

    public function data()
    {
        // ambil data dari table todos
        $todos = Todo::all();
        // compact untuk mengirim data ke bladenya
        // isi di compact harus sama kaya nama variablenya
        return view('data', compact('todos'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Mengirim data baru ke database
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8',
        ]);

        //yang ''= nama column
        //yang $request-> = value name di input
        /* kenapa kirim 5 data padahal di input ada 3 inputan? kalau di cek di table todos itukan ada 6 column yang harus diisi, salah satunya column done_date yang nullable, kalau nullable itu gausa diisi gapapa jadi ga usah diisi dulu*/
        //user_id ngambil dari id dari fitur auth (history login), supaya tau itu todo punya siapa
        //column status kan boolean, jadi kalau status todo belum dikerjain = 0

        Todo::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status' => 0,
        ]);

        return redirect('/data')->with('addTodo', 'Berhasil menambahkan data Todo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //Menampilkan satu data spesific
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan form edit
        //parameter $id mengambil data path dinamis {id}
        /*ambil satu baris data yang memiliki value column id sama dengan data path dinamis id yang dikirim ke route*/
        $todo = Todo::where('id', $id)->first();
        /*Kemudian arahkan tampilan file view yang bernama edit.blade.php dan kirim data dari $todo ke file edit tersebut dengan bantuan compact */
        return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update data daatabase
        //validasi
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8',
        ]);

        //cari baris data yang punya value column id sama dengan id yang dikirim ke route
        Todo::where('id', $id)->update([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status' => 0,
        ]);

        return redirect('/data')->with('successUpdate', 'Berhasil Mengubah Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Menghapus data secara spresific
        //Cari data yang mau dihapus, kalau ketemu langsung hapus datanya
        Todo::where('id', $id)->delete();
        // kalau berhasil arahin lagi ke halaaman data dengan notifikasi
        return redirect('/data')->with('delete', 'a');
    }
    
    public function updateToComplated(Request $request, $id)
    {
        //cari data yang akan di update
        //baru setelahnya data di update ke database melalui model
        //status tipenya boolean (0/1) : 0 (on-proccess) & 1 (complated)
        //carbon : package laravel yang mengelola segala hal yang berhubungan dengan date
        //now() : mengambil tanggal hari ini
        Todo::where('id', '=', $id)->update([
            'status' => 1,
            'done_time' => \Carbon\Carbon::now(),
        ]);
        //Jika berhasil, akan dibalikan ke halaman awal (halaman tempat button complated berada), kembalikan dengan pemberitahuan
        return redirect()->back()->with('done', 'a');
    }
}