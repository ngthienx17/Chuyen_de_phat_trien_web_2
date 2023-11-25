<?php

namespace App\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class AdminSaleComponent extends Component
{
    public $sale_date;
    public $status;

    public function mount(){
        $sale = Sale::find(1);
        $this->sale_date = $sale->sale_date;
        $this->status = $sale->status;
    }
    
    public function updateSale() {
        $this->validate([
            'sale_date' => 'required|date', // Adjust the date format validation as needed.
            'status' => 'required', // Adjust the allowed status values as needed.
        ]);
        $sale = Sale::find(1);
        if ($sale) {
            $sale->sale_date = $this->sale_date;
        $sale->status = $this->status;
            $sale->save();
            session()->flash('message', __('Cập nhật thời gian sale thành công!'));
        } else {
            // Handle the case where the Sale model is not found.
            session()->flash('message', __('Không tìm thấy'));
        }
       
        
    }

    public function render()
    {
        return view('livewire.admin.admin-sale-component')->layout('layouts.admin-base');
    }
}
