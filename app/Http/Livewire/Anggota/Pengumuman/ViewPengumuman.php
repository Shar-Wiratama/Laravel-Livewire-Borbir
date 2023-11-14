<?php

namespace App\Http\Livewire\Anggota\Pengumuman;

use Livewire\Component;
use App\Models\Pengumuman;
use App\http\Livewire\Admin\AdminComponent;

class ViewPengumuman extends AdminComponent
{
    public $showPengumumanId = null;

    public $pengumuman;

    public function showPengumumanModal($pengumumanId)
    {
        // dd($pengumumanId);
        $this->showPengumumanId = $pengumumanId;

        $this->dispatchBrowserEvent('show-pengumuman-modal');

        $pengumuman = Pengumuman::findOrFail($this->showPengumumanId);
    }
    public function render()
    {
        $pengumumans = Pengumuman::latest()->paginate(5);

        return view('livewire.anggota.pengumuman.view-pengumuman',['pengumumans'=>$pengumumans]);
    }
}
