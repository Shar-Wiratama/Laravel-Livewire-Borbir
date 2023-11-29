<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\http\Livewire\Admin\AdminComponent;

class ListUsers extends AdminComponent
{
    public $state = [];

    public $user;

    public $showEditModal = false;

    public $userIdBeingRemoved = null;

    public $searchTerm = null;

    public $query;

    public function addUser()
    {   
        $this->showEditModal = false;
        
        $this->dispatchBrowserEvent('show-form');
    }

    public function createUser()
    {
        $validateData = Validator::make($this->state,[
            'name' =>'required',
            'address' => 'required',
            'initial_meter' => 'required',
            'email' => 'required|email|unique:users',
            'password' =>'required|confirmed',
        ])->validate();

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        // session()->flash('message', 'User berhasil ditambahkan!');

        $this->dispatchBrowserEvent('hide-form', ['message'=>'Data User Berhasil Dibuat!']);

        return redirect()->back();
    }

    public function edit(User $user)
    {
        $this->showEditModal = true;
        $this->user = $user;
        $this->state =$user->toArray();
        $this->dispatchBrowserEvent('show-form');
    }

    public function updateUser()
    {
        $validateData = Validator::make($this->state,[
            'name' =>'required',
            'address' => 'required',
            'initial_meter' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' =>'sometimes|confirmed',
        ])->validate();

        if(!empty($validateData['password']))
        $validateData['password'] = bcrypt($validateData['password']);

        $this->user->update($validateData);

        $this->dispatchBrowserEvent('hide-form', ['message'=>'Data User Berhasil Diubah!']);

        return redirect()->back(); 
    }

    public function confirmUserRemoval($userId)
    {
        $this->userIdBeingRemoved = $userId;

        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteUser()
    {
        $user = User::findOrFail($this->userIdBeingRemoved);
        
        // dd($user);
        $user->delete();   

        $this->dispatchBrowserEvent('hide-delete-modal', ['message'=>'Data User Berhasil Dhapus!']);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

    public function render()
    {
        $users = User::query()
                ->where('name', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('email', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('address', 'like', '%'.$this->searchTerm.'%')
                ->latest()->paginate(10);

        return view('livewire.admin.users.list-users',['users'=>$users]);
    }
}
