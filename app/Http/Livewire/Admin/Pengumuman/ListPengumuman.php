<?php

namespace App\Http\Livewire\Admin\Pengumuman;

use Livewire\Component;
use App\Models\Pengumuman;
use App\http\Livewire\Admin\AdminComponent;

class ListPengumuman extends AdminComponent
{
    public function addPengumuman()
    {
        //
    }
    public function createPengumuman()
    {
        //
    }

    public function render()
    {
        return view('livewire.admin.pengumuman.list-pengumuman');
    }
}
