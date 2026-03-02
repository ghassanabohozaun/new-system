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

    public function changeStatus($slider, $status)
    {
        $slider->update([
            'status' => $status,
        ]);
        return $slider;
    }
}
