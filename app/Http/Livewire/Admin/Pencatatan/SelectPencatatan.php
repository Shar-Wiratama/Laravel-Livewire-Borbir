<?php

namespace App\Http\Livewire\Admin\Pencatatan;

use Livewire\Component;
use App\Models\Pencatatan;
use App\http\Livewire\Admin\AdminComponent;

class SelectPencatatan extends AdminComponent
{
    public $query;

    public function pilihPencatatan()
    {
        // 
    }
    public function render()
    {
        $pencatatans = Pencatatan::with('user')->latest()->paginate(8);

        return view('livewire.admin.pencatatan.select-pencatatan',['pencatatans'=>$pencatatans]);
    }
}
