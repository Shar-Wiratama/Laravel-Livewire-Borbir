<?php

namespace App\Http\Livewire\Anggota\Pencatatan;

use App\Models\User;
use Livewire\Component;
use App\Models\Pencatatan;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;

class CreatePencatatan extends Component
{
    use WithFileUploads;

    public $state = [];

    public $pencatatan;

    public $showEditModal = false;

    public $photo;

    public function addPencatatan()
    {
        $this->showEditModal = false;
        
        $this->dispatchBrowserEvent('show-pencatatan-form');
    }
    public function makePencatatan()
    {
        $validateData = Validator::make($this->state,[
            // 'user_id'=>'required',
            'updated_meter' =>'required', 
        ],
        )->validate();

        if ($this->photo) {
            $validateData['photo'] = $this->photo->store('/', 'foto_meteran');
        }

        // dd($validateData);
        Pencatatan::create($validateData);
        // dd('here');

        $this->dispatchBrowserEvent('hide-pencatatan-form', ['message'=>'Data User Berhasil Dibuat!']);

        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.anggota.pencatatan.create-pencatatan');
    }
}
