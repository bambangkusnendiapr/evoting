<?php

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

Route::get('/', function () {
    $title = 'E-Voting | Pemilihan Umum Berbasis Online';
    $logo = \App\Logo::all();
    return view('user.index', compact('logo', 'title'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', 'DashboardController@index');
    Route::post('user/voter/tambah', 'DashboardController@store');

    //kandidat
    Route::get('candidat', 'KandidatController@index');
    Route::post('candidat/tambah', 'KandidatController@store');
    Route::get('candidat/detail/{id}', 'KandidatController@detail');
    Route::put('candidat/edit/{id}', 'KandidatController@update');
    Route::delete('candidat/hapus/{id}', 'KandidatController@delete');
    Route::get('candidat/export', 'KandidatController@export');
    Route::get('category/candidat/{id}', 'KandidatController@postbyCategory');

    //Voter
    Route::get('voter', 'VoterController@index');
    Route::post('voter/tambah', 'VoterController@store');
    Route::post('voter/hapus', 'VoterController@delete');
    Route::get('voter/export', 'VoterController@export');


    //quic count
    Route::get('hitung_cepat', 'HitungCepatController@index');
    Route::get('hitung-bakal-calon', 'HitungCepatController@bakalCalon')->name('hitung.bakal');

    //users

    Route::get('users', 'UsersController@index');
    Route::get('users/add', 'UsersController@add');
    Route::post('users/add', 'UsersController@store');
    Route::get('users/edit/{id}', 'UsersController@edit');
    Route::put('users/ubahprofile', 'UsersController@updateprofile');
    Route::put('users/ubahpassword', 'UsersController@updatepassword');
    Route::get('profile', 'UsersController@profile');
    Route::delete('users/{id}', 'UsersController@delete');
    Route::get('users/reset', 'UsersController@reset');
    Route::get('users/verifikasi', 'UsersController@verify');
    Route::get('users/verify/{id}', 'UsersController@vertifikasi');
    Route::get('users/destroy', 'UsersController@destroy');

    //logo
    Route::get('logo', 'LogoController@index');
    Route::put('logo/update', 'LogoController@update');

    //category
    Route::get('category', 'CategoryController@index');
    Route::get('category/add', 'CategoryController@add');
    Route::post('category/add', 'CategoryController@store');
    Route::get('category/edit/{id}', 'CategoryController@edit');
    Route::put('category/ubah/{id}', 'CategoryController@update');
    Route::delete('category/delete/{id}', 'CategoryController@delete');
    
    //Bakal Calon Ketua
    Route::resource('bakal', 'BakalCalonController');
    Route::get('export-bakal', 'BakalCalonController@exportBakal')->name('export.bakal');
    Route::post('import-bakal', 'BakalCalonController@importBakal')->name('import.bakal');

    //Token Bakal Calon Ketua
    Route::get('token-bakal-calon', 'TokenBakalCalonController@index')->name('token.bakal');
    Route::post('token-bakal-calon', 'TokenBakalCalonController@store')->name('token.bakal.store');
    Route::post('hapus-token-bakal-calon', 'TokenBakalCalonController@destroy')->name('token.bakal.destroy');
    Route::get('export-token-bakal-calon', 'TokenBakalCalonController@export')->name('token.bakal.export');
});

//Bakal Calon
Route::get('bakal-calon', 'UserController@bakalCalon')->name('front.bakal.calon');
Route::get('bakal-calon/voting-login', 'UserController@bakal_calon_voting_login')->name('bakal.calon.voting.login');
Route::post('cektoken-bakal-calon', 'UserController@bakal_calon_cektoken')->name('cektoken.bakal.calon');
Route::get('voting-bakal-calon', 'VotingController@bakal_calon')->name('bakal.calon.form.voting');
Route::get('simpan-suara-bakal-calon/{id}', 'VotingController@simpan_suara_bakal_calon')->name('simpan.suara.bakal.calon');


//Voting
Route::get('user', 'UserController@index');
Route::get('user/voting_login', 'UserController@voting_login');
Route::post('cektoken', 'UserController@cektoken');
Route::get('category/kandidat/{id}', 'UserController@postbyCategory');
Route::get('about', 'UserController@about');

//Voting kandidat
Route::get('voting', 'VotingController@index');
Route::get('voting/detail/{id}', 'VotingController@voting_detail');
Route::get('simpan_suara/{id}', 'VotingController@simpan_suara');
Route::get('user/logout_voting', 'UserController@logout_voting');
Route::get('user/block', 'UserController@block');

//registrasi
Route::get('daftar', 'DaftarController@index');
Route::post('daftar/add', 'DaftarController@store');



Route::get('/home', function () {
    return redirect('dashboard');
});


Route::get('/keluar', function () {
    Auth::logout();
    return redirect('/');
});
