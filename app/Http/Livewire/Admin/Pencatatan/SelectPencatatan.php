<?php

namespace App\Http\Livewire\Admin\Pencatatan;

use App\Models\User;
use Livewire\Component;
use App\Models\Pencatatan;
use Illuminate\Support\Carbon;
use App\http\Livewire\Admin\AdminComponent;

class SelectPencatatan extends AdminComponent
{
    public $query;

    public function acceptPencatatan($pencatatanId)
    {
        $pencatatans = Pencatatan::find($pencatatanId);
        $users = $pencatatans->user;
        
        if($pencatatans && $pencatatans->status !== 'Diterima' && $pencatatans->status !== 'Ditolak'){

            $usageMeter = $pencatatans->updated_meter - $users->initial_meter;
            $price = ($usageMeter * 4000) + 10000 ;

            $tanggal_buat = Carbon::parse($pencatatans->tanggal_buat);
            if ($tanggal_buat->day > 5) {
                // Apply the fine (adjust the fine amount as needed)
                $fine = 5000;
                $price += $fine;
            }

            $pencatatans->update([
                'usage_meter' => $usageMeter,
                'price' => $price,
                'status' => 'Diterima', 
            ]);

            if($users){
                $users->update(['initial_meter' => $pencatatans->updated_meter]);
            }

        }
    }

    public function refusedPencatatan($pencatatanId)
    {
        $pencatatans = Pencatatan::findOrFail($pencatatanId); 

        if($pencatatans && $pencatatans->status !== 'Diterima' && $pencatatans->status !== 'Ditolak'){
            $pencatatans->update(['status' => 'Ditolak']);

            $pencatatans->delete();
        }
    }

    public function render()
    {
        $pencatatans = Pencatatan::with('user')->latest()->paginate(8);

        return view('livewire.admin.pencatatan.select-pencatatan',['pencatatans'=>$pencatatans]);
    }
}
