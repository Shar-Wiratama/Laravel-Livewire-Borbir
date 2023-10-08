<?php

namespace App\http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class AdminComponent extends Component  
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
}