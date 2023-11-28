<?php

namespace App\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public $selectedItem;
    public function selectItem($selectedItem)
    {
        $this->selectedItem = $selectedItem;
        $slider = HomeSlider::find($this->selectedItem);
        if ($slider) {
            # code...
            $slider->delete();
            session()->flash('message', 'Xóa Slider thành công!');
        } else {
            session()->flash('error-message', 'Không tìm thấy slider này!');
        }
    }
    public function deleteSlider()
    {
        $slider = HomeSlider::find($this->selectedItem);
        if ($slider) {
            # code...
            $slider->delete();
            session()->flash('message', 'Xóa Slider thành công!');
        } else {
            session()->flash('error-message', 'Không tìm thấy slider này!');
        }
    }
    #[Layout('layouts.admin-base')]
    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component', ['sliders' => $sliders]);
    }
}
