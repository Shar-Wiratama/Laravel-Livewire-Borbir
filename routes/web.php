<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\Users\ListUsers;
use App\Http\Livewire\Admin\Pengumuman\ListPengumuman;
use App\Http\Livewire\Admin\Pencatatan\SelectPencatatan;
use App\Http\Livewire\Admin\Pengumuman\CreatePengumumanForm;
use App\Http\Livewire\Admin\Pengumuman\UpdatePengumumanForm;
use App\Http\Livewire\Admin\Dashboard\AdminDashboardController;

use App\Http\Livewire\Anggota\Pengumuman\ViewPengumuman;
use App\Http\Livewire\Anggota\Pencatatan\CreatePencatatan;


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

Route::group(['middleware' => ['auth','admin']], function(){
        Route::get('/admin/dashboard', AdminDashboardController::class)->name('admin.dashboard');

        Route::get('users', ListUsers::class)->name('admin.users');

        Route::get('pencatatan', SelectPencatatan::class)->name('admin.pencatatan');

        Route::get('pengumuman', ListPengumuman::class)->name('admin.pengumuman');
        Route::get('pengumuman/create', CreatePengumumanForm::class)->name('admin.pengumuman.create');
        Route::get('pengumuman/{pengumuman}/edit', UpdatePengumumanForm::class)->name('admin.pengumuman.edit');

    
        // Route::get('anggotaDashboard', AnggotaDashboardController::class)->name('anggotaDashboard');

        Route::get('pengumuman/view', ViewPengumuman::class)->name('anggota.pengumuman.view');

        Route::get('pencatatan/create', CreatePencatatan::class)->name('anggota.pencatatan.create');
});



    





// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
