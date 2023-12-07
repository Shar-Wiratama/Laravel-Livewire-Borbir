<?php

namespace App\Http\Livewire\Admin\Pencatatan;

use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Pencatatan;
use Illuminate\Support\Carbon;
use App\http\Livewire\Admin\AdminComponent;
use Illuminate\Support\Facades\Storage;

class SelectPencatatan extends AdminComponent
{
    public $query;

    public function acceptPencatatan($pencatatanId)
    {
        $pencatatans = Pencatatan::find($pencatatanId);
        $users = $pencatatans->user;

        if ($pencatatans && $pencatatans->status !== 'Diterima' && $pencatatans->status !== 'Ditolak') {

            $usageMeter = $pencatatans->updated_meter - $users->initial_meter;
            $initialPrice = $usageMeter * 4000;
            $price =  $initialPrice + 10000;

            $tanggal_buat = Carbon::parse($pencatatans->tanggal_buat);
            if ($tanggal_buat->day > 5) {
                $fine = 5000;
                $price += $fine;
            } else {
                $fine = 0;
                $price += $fine;
            }

            $pencatatans->update([
                'usage_meter' => $usageMeter,
                'initial_price' => $initialPrice,
                'fine' => $fine,
                'total_price' => $price,
                'status' => 'Diterima',
            ]);

            if ($users) {
                $users->update(['initial_meter' => $pencatatans->updated_meter]);
            }

            $pdf = PDF::loadView('livewire.anggota.pencatatan.bill-pencatatan', ['pencatatans' => $pencatatans]);

            // Save the PDF or return it as a response
            // For example, save to storage:
            // $pdf->save(storage_path('/' , 'invoice_meteran'. $pencatatans->id . '.pdf'));
            
            $content = $pdf->download()->getOriginalContent();
            Storage::put('public/invoice_meteran/invoice'. $pencatatans->id . '.pdf', $content);
            // return $pdf->stream('invoice_meteran' . $pencatatans->id . '.pdf');

        }
    }

    public function refusedPencatatan($pencatatanId)
    {
        $pencatatans = Pencatatan::findOrFail($pencatatanId);

        if ($pencatatans && $pencatatans->status !== 'Diterima' && $pencatatans->status !== 'Ditolak') {
            $pencatatans->update(['status' => 'Ditolak']);

            $pencatatans->delete();
        }
    }

    public function render()
    {
        $pencatatans = Pencatatan::with('user')->latest()->paginate(8);

        return view('livewire.admin.pencatatan.select-pencatatan', ['pencatatans' => $pencatatans]);
    }
}
