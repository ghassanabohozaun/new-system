<?php

namespace App\Repositories\Dashboard;

use App\Models\Slider;

class SliderRepository
{
    // get slider
    public function getSlider($id)
    {
        return Slider::find($id);
    }

    // get sliders
    public function getSliders()
    {
        return Slider::latest()->paginate(10);
    }

    // create slider
    public function create($data)
    {
        return Slider::create($data);
    }

    // update slider
    public function update($slider, $data)
    {
        return $slider->update($data);
    }

    // destroy slider
    public function destroy($slider)
    {
        return $slider->forceDelete();
    }

    // update change status slider
    public function changeStatus($slider, $status)
    {
        return $slider->update([
            'status' => $status,
        ]);
    }
}
