<?php

namespace App\Http\Livewire\Anggota\Dashboard;

use Livewire\Component;
use App\Models\Pencatatan;
use Illuminate\Support\Facades\Auth;

class AnggotaDashboardController extends Component
{
    public function render()
    {
          // Retrieve data from the database and count meter usage every month
          $monthlyData = Pencatatan::selectRaw('MONTH(created_at) as month, SUM(usage_meter) as total')
          ->where('user_id', Auth::id())
          ->groupBy('month')
          ->get();
          
         // Convert the data for chart rendering
         $labels = $monthlyData->map(function ($data) {
            return date('M Y', strtotime("{$data->year}-{$data->month}-01"));
        })->toArray();

        $data = $monthlyData->pluck('total')->toArray();

        return view('livewire.anggota.dashboard.anggota-dashboard-controller', compact('labels', 'data'));
    }
}
