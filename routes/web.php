<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//mengelompokan route-route yang akan diberi akses 'isGuest'
Route::middleware('isGuest')->group(function () 
{
    Route::get('/', [TodoController::class, 'index']);
    //Buat route baru
    Route::post('/login', [LoginController::class, 'login'])->name('Login-baru');
    // Route::get('/', [TodoController::class, 'index'])->name('Login'); 
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/register', [TodoController::class, 'register']);
});

Route::middleware('isLogin')->group(function () 
{
    Route::get('/dashboard', [TodoController::class, 'dashboard']);
    Route::get('/create', [TodoController::class, 'create'])->name('create');
    Route::post('/store', [TodoController::class, 'store'])->name('store');
    Route::get('/data', [TodoController::class, 'data'])->name('data');
    /* path yang ada di {} artinya path dinamis, path dinamis merupakan path yang datanya diisi dari database, path dinamis ini nantinya akan berubah-ubah tergantung data yang diberikan, apabila dalam routenya ada path dinamis maka nantinya data path dinamis ini dapat diakses oleh controller melalui parameter di functionnya */

    //dalam satu route boleh lebih dari 1 path dinamis
    Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');

    // method route buat update data ke database itu pake patch
    Route::patch('/update/{id}', [TodoController::class, 'update'])->name('update');
    
    // method route buat delete data di database itu pake delete
    Route::delete('/delete/{id}', [TodoController::class, 'destroy'])->name('destroy');
    Route::patch('/complated/{id}', [TodoController::class, 'updateToComplated'])->name('update-complated');
});

//Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//end logout

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('isLogin');
//End buat route  

// method route buat update data ke database itu pake patch/put

//});