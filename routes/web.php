<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\BukuController;
use App\Models\Buku;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('index', [
//         "title" => "Beranda"
//     ]);
// });
Route::get('/', [BukuController::class, 'tampil'])->name('buku.tampil');

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "nama" => "Ihza Dzikri Fauzi",
        "email" => "ihzafauzi03@gmail.com",
        "gambar" => "solaire.jpg"
    ]);
});

Route::get('/gallery', function () {
    return view('gallery', [
        "title" => "Gallery"
    ]);
});

// Route::get('/buku/detail', function ($id) {
//     $buku = Buku::find($id);
//     return view('detail', compact('buku'));
// });

Route::get('/book/detail/{id}', [BukuController::class, 'detailbook']);


//Route::resource('/contacts', ContactController::class);
//Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
//Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');

Route::get('/menu', [BukuController::class, 'tampil'])->name('tampil.index');
Route::get('/buku/show/{id}', [BukuController::class, 'show']);

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::get('/buku/index', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::post('/buku/{id}/update', [BukuController::class, 'update'])->name('buku.update');
    Route::get('/buku/{id}/destroy', [BukuController::class, 'destroy'])->name('buku.destroy');
    Route::get('/export-buku', [BukuController::class, 'export_excel'])->name('export');
});

/*
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/contacts/index', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::post('/contacts/{id}/update', [ContactController::class, 'update'])->name('contacts.update');
    Route::get('/contacts/{id}/destroy', [ContactController::class, 'destroy'])->name('contacts.destroy');
});*/