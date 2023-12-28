<?php

namespace App\Http\Livewire\Anggota\Pencatatan;

use App\Models\User;
use Livewire\Component;
use App\Models\Pencatatan;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\http\Livewire\Admin\AdminComponent;

class CreatePencatatan extends AdminComponent
{
    use WithFileUploads;

    public $pencatatan;
    public $showEditModal = false;
    public $photo;
    public $user_id;
    public $updated_meter;
    public $created_date;
    public $fine_amount = 5000;

    protected $rules = [
        'user_id' => 'required',
        'updated_meter' => 'required',
        'created_date' => 'required',
        // 'fine' => 'nullable|numeric',
    ];

    ///modal tambah pencatatan
    public function addPencatatan()
    {
        $this->showEditModal = false;
        $this->dispatchBrowserEvent('show-pencatatan-form');
    }

    ///tambah pencatatan
    public function makePencatatan()
    {
        $this->user_id = Auth::user()->id; 
        $this->created_date = Carbon::now()->format('Y-m-d');

        // Check if the user has already uploaded this month
        $existingPencatatan = Pencatatan::where('user_id', $this->user_id)
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->first();

        if ($existingPencatatan) {
            // User has already uploaded this month, show an error or take appropriate action
            // $this->dispatchBrowserEvent('show-exist-pencatatan', ['message'=>'Data Pencatatan Bulan Ini Sudah Dibuat!']);
            return redirect()->back();
        }

        // if ($user_id && $this->updated_meter <= $user_id->initial_meter) {
        //     $this->addError('updated_meter', 'Updated meter must be more than the initial meter.');
        //     return;
        // }

        $validateData = $this->validate();

        if ($this->photo) {
            $validateData['photo'] = $this->photo->store('/', 'foto_meteran');
        }

        Pencatatan::create($validateData);
        $this->dispatchBrowserEvent('hide-pencatatan-form', ['message'=>'Data Pencatatan Berhasil Dibuat!']);
        return redirect()->back();
    }

    public function render()
    {
        $pencatatans = Pencatatan::where('user_id', auth()->id())
                                ->latest()
                                ->paginate(8);


        return view('livewire.anggota.pencatatan.create-pencatatan',
        [
            'pencatatans'=>$pencatatans, 
        ]);
    }
}
