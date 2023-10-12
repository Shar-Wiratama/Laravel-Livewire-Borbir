<?php

namespace App\Http\Livewire\Admin\Pengumuman;

use Livewire\Component;
use App\Models\Pengumuman;
use App\http\Livewire\Admin\AdminComponent;

class ListPengumuman extends AdminComponent
{
    public $pengumumanIdBeingRemoved = null;

    public function confirmPengumumanRemoval($pengumumanId)
    {
        $this->pengumumanIdBeingRemoved = $pengumumanId;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deletePengumuman()
    {
        $Pengumuman = Pengumuman::findOrFail($this->PengumumanIdBeingRemoved);

        $Pengumuman->delete();

        $this->dispatchBrowserEvent('deleted', ['message' => 'Pengumuman deleted successfully!']);
    }

    public function render()
    {
        $pengumuman = Pengumuman::latest()->paginate(3);

        return view('livewire.admin.pengumuman.list-pengumuman',['pengumuman'=>$pengumuman]);
    }
}
