<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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
    if (Auth::check() && Auth::user()->isAdmin()) {
        return redirect('admin/dashboard');
    }
    elseif (Auth::check() && Auth::user()->isAnggota()) {
        return redirect('anggota/dashboard');
    } else {
        return redirect('login');
    }
});

Route::get('/home', function(){
    return redirect('login');
});


