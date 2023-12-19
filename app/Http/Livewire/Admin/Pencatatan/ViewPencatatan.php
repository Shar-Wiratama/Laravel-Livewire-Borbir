<?php

namespace App\Http\Livewire\Admin\Pencatatan;

use Livewire\Component;
use App\Models\Pencatatan;
use App\http\Livewire\Admin\AdminComponent;

class ViewPencatatan extends AdminComponent
{
    public function render()
    {
        $pencatatans = Pencatatan::latest()->paginate(8);

        return view('livewire.admin.pencatatan.view-pencatatan', ['pencatatans' => $pencatatans]);
    }
}
