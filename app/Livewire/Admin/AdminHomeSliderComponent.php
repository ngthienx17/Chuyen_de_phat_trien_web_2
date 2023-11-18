<?php

namespace App\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public function deleteSlider($slider_id)
    {
        $slider = HomeSlider::find($slider_id);
        if ($slider) {
            # code...
            $slider->delete();
            session()->flash('message', 'Xóa Slider thành công!');
        }else{
            session()->flash('error-message', 'Không tìm thấy slider này!');

        }
    }
    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component', ['sliders' => $sliders])->layout('layouts.admin-base');
    }
}
