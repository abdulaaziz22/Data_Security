<?php
use App\http\Controllers\AdditiveCipherController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/additive', function () {
    return view('additive-cipher');
});

Route::get('/autoplay', function () {
    return view('autoplay');
});

Route::get('/Modulo_Operation', function () {
    return view('Modulo_Operation');
});

Route::get('/keygernartion', function () {
    return view('keygernartion');
});

Route::get('/s_des', function () {
    return view('S-DES');
});