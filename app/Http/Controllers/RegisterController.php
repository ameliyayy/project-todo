<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function register(Request $request) 
    {
        $validateData = $request->validate([
            'email' => 'required',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $validateData['password']= bcrypt($validateData['password']);

        User::create($validateData);

        alert()->success('Success', 'Registrasi Berhasil, Silahkan Login!');

        //with fungsinya untuk membawa pemberitahuan ke halaman yang di redirect
        return redirect('/');
    }
}