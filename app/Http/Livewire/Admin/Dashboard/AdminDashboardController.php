<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Pencatatan;
use Livewire\Component;

class AdminDashboardController extends Component
{

    public function render()
    {
          // Retrieve data from the database and count meter usage every month
        $monthlyData = Pencatatan::selectRaw('MONTH(created_at) as month, SUM(usage_meter) as total')
          ->groupBy('month')
          ->latest()
          ->get();

      // Convert the data for chart rendering
    //   $labels = $monthlyData->pluck('month')->toArray();
      // Convert the data for chart rendering
      $labels = $monthlyData->map(function ($data) {
        return date('M Y', strtotime("{$data->year}-{$data->month}-01"));
    })->toArray();
      $data = $monthlyData->pluck('total')->toArray();

        return view('livewire.admin.dashboard.admin-dashboard', compact('labels', 'data'));
    }
}
