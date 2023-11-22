<?php

namespace App\Http\Livewire\Anggota\Pencatatan;

use App\Models\User;
use Livewire\Component;
use App\Models\Pencatatan;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\http\Livewire\Admin\AdminComponent;

class CreatePencatatan extends AdminComponent
{
    use WithFileUploads;

    // public $state = [];

    public $pencatatan;

    public $showEditModal = false;

    public $photo;

    public $user_id;
    public $updated_meter;

    protected $rules = [
        'user_id' => 'required',
        'updated_meter' => 'required',
    ];

    public function addPencatatan()
    {
        $this->showEditModal = false;
        
        $this->dispatchBrowserEvent('show-pencatatan-form');
    }
    public function makePencatatan()
    {

        $this->user_id = Auth::user()->id; 
        
        $validateData = $this->validate();

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
        $pencatatans = Pencatatan::with('user')->latest()->paginate(8);

        return view('livewire.anggota.pencatatan.create-pencatatan',['pencatatans'=>$pencatatans]);
    }
}
