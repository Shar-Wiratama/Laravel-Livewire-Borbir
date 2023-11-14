<?php

namespace App\Http\Livewire\Admin\Pengumuman;


use App\Models\Pengumuman;
use App\http\Livewire\Admin\AdminComponent;

class ListPengumuman extends AdminComponent
{
    protected $listeners = ['deleteConfirmed' => 'deletePengumuman'];

    public $pengumumanIdBeingRemoved = null;

    public $query;

    public function confirmPengumumanRemoval($pengumumanId)
    {
        // dd($pengumumanId);
        $this->pengumumanIdBeingRemoved = $pengumumanId;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deletePengumuman()
    {
        // dd('here');
        $pengumuman = Pengumuman::findOrFail($this->pengumumanIdBeingRemoved);

        $pengumuman->delete();

        $this->dispatchBrowserEvent('deleted', ['message' => "Pengumuman Berhasil Dihapus!"]);
    }

    public function render()
    {
        $pengumumans = Pengumuman::latest()->paginate(5);

        return view('livewire.admin.pengumuman.list-pengumuman',['pengumumans'=>$pengumumans]);
    }
}
