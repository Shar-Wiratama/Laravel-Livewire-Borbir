<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\Users\ListUsers;
use App\Http\Livewire\Admin\Pencatatan\ViewPencatatan;
use App\Http\Livewire\Admin\Pengumuman\ListPengumuman;
use App\Http\Livewire\Admin\Pencatatan\SelectPencatatan;
use App\Http\Livewire\Admin\Pengumuman\CreatePengumumanForm;
use App\Http\Livewire\Admin\Pengumuman\UpdatePengumumanForm;
use App\Http\Livewire\Admin\Dashboard\AdminDashboardController;

Route::group(['middleware' => ['auth','admin']], function(){
    Route::get('dashboard', AdminDashboardController::class)->name('dashboard');

    Route::get('users', ListUsers::class)->name('users');

    Route::get('pencatatan', SelectPencatatan::class)->name('pencatatan');
    Route::get('pencatatan/view', ViewPencatatan::class)->name('pencatatan.view');

    Route::get('pengumuman', ListPengumuman::class)->name('pengumuman');
    Route::get('pengumuman/create', CreatePengumumanForm::class)->name('pengumuman.create');
    Route::get('pengumuman/{pengumuman}/edit', UpdatePengumumanForm::class)->name('pengumuman.edit');
});