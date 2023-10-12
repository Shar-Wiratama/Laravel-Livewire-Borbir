<?php

namespace App\Http\Livewire\Admin\Pengumuman;

use App\Models\Pengumuman;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class UpdatePengumumanForm extends Component
{
    public $state = [];

    public $pengumuman;

    public function mount(Pengumuman $pengumuman)
    {
        $this->state = $pengumuman->toArray();

        $this->pengumuman = $pengumuman;
    }

    public function updatePengumuman()
    {
        Validator::make(
            $this->state,
            [
                'title' =>'required',
                'content' => 'required',
            ])->validate();
        
        $this->pengumuman->update($this->state);

        return redirect()->route('admin.pengumuman');
    }
    public function render()
    {
        return view('livewire.admin.pengumuman.update-pengumuman-form');
    }
}
