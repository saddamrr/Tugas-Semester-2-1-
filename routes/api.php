<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'petugascontroller@login');
Route::post('register', 'petugascontroller@register');
Route::put('/petugas/{id_petugas}', 'petugascontroller@update');
Route::delete('/petugas/{id_petugas}', 'petugascontroller@destroy');

Route::get('/buku', 'bukucontroller@index');
Route::post('/buku', 'bukucontroller@store');
Route::put('/buku/{id_buku}', 'bukucontroller@update');
Route::delete('/buku/{id_buku}', 'bukucontroller@destroy');

Route::get('/anggota', 'anggotacontroller@index');
Route::post('/anggota', 'anggotacontroller@store');
Route::put('/anggota/{id_anggota}', 'anggotacontroller@update');
Route::delete('/anggota/{id_anggota}', 'anggotacontroller@destroy');

