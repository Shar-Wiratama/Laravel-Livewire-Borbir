<?php

namespace App\Http\Livewire\Admin\Pengumuman;

use Livewire\Component;
use App\Models\Pengumuman;
use App\http\Livewire\Admin\AdminComponent;

class ListPengumuman extends AdminComponent
{
    protected $listeners = ['deleteConfirmed' => 'deletePengumuman'];

    public $pengumumanIdBeingRemoved = null;

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
        $pengumuman = Pengumuman::latest()->paginate(3);

        return view('livewire.admin.pengumuman.list-pengumuman',['pengumuman'=>$pengumuman]);
    }
}
