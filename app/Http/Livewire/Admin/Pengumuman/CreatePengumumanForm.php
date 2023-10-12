<?php

namespace App\Http\Livewire\Admin\Pengumuman;

use App\Models\Pengumuman;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class CreatePengumumanForm extends Component
{   
    public $state = [];

    public $pengumuman;

    public function createPengumuman()
    {
        $validateData = Validator::make($this->state,[
            'title' =>'required',
            'content' => 'required',
        ])->validate();

        Pengumuman::create($validateData);

        // $this->dispatch('alert', ['message'=>'Pengumuman Berhasil Dibuat!']);

        return redirect()->route('admin.pengumuman');
    }

    public function render()
    {
        return view('livewire.admin.pengumuman.create-pengumuman-form');
    }
}
