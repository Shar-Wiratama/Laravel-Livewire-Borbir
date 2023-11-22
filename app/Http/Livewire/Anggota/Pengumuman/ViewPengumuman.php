<?php

namespace App\Http\Livewire\Anggota\Pengumuman;

use Livewire\Component;
use App\Models\Pengumuman;
use App\http\Livewire\Admin\AdminComponent;

class ViewPengumuman extends AdminComponent
{
    public $pengumumanId = null;

    public $pengumuman;

    // public $modalPengumumanId;

    // public function showPengumumanModal($id)
    // {
    //     $this->modalPengumumanId = $id;
    //     $this->dispatchBrowserEvent('show-pengumuman-modal');
    // }

    // public function hideModal()
    // {
    //     $this->modalPengumumanId = null;
    //     $this->dispatchBrowserEvent('hide-pengumuman-modal');
    // }


    public function showPengumumanModal($pengumumanId)
    {
        
        $this->pengumumanId = $pengumumanId;
        // dd($pengumumanId);
        
        $this->dispatchBrowserEvent('show-pengumuman-modal', $pengumumanId);
        
        //  dd($pengumumanId);
    }
    public function render()
    {
        $pengumumans = Pengumuman::latest()->paginate(5);

        return view('livewire.anggota.pengumuman.view-pengumuman',['pengumumans'=>$pengumumans]);
    }
}
