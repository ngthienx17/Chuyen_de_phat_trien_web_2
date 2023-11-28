<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    #[Layout('layouts.admin-base')]

    public function render()
    {
        return view('livewire.admin.admin-dashboard-component');
    }
}
