<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Anggota\Dashboard\AnggotaDashboardController;
use App\Http\Livewire\Anggota\Pengumuman\ViewPengumuman;
use App\Http\Livewire\Anggota\Pencatatan\CreatePencatatan;

Route::group(['middleware' => ['auth','anggota']], function(){
 Route::get('dashboard', AnggotaDashboardController::class)->name('dashboard');

 Route::get('pengumuman/view', ViewPengumuman::class)->name('pengumuman.view');

 Route::get('pencatatan/create', CreatePencatatan::class)->name('pencatatan.create');

});