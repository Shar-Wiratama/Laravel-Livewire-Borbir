<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Users\ListUsers;
use App\Http\Livewire\Admin\Dashboard\AdminDashboardController;
use App\Http\Livewire\Admin\Pengumuman\ListPengumuman;
use App\Http\Livewire\Admin\Pencatatan\SelectPencatatan;
use App\Http\Livewire\Admin\Pengumuman\CreatePengumumanForm;
use App\Http\Livewire\Admin\Pengumuman\UpdatePengumumanForm;

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
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function(){
    Route::get('admin/dashboard', AdminDashboardController::class)->name('admin.dashboard');

    Route::get('admin/users', ListUsers::class)->name('admin.users');

    Route::get('admin/pencatatan', SelectPencatatan::class)->name('admin.pencatatan');

    Route::get('admin/pengumuman', ListPengumuman::class)->name('admin.pengumuman');
    Route::get('admin/pengumuman/create', CreatePengumumanForm::class)->name('admin.pengumuman.create');
    Route::get('admin/pengumuman/{pengumuman}/edit', UpdatePengumumanForm::class)->name('admin.pengumuman.edit');
});


