<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'vision_title.*' => 'required|string|max:255',
            'vision_description.*' => 'required|string',
            'vision_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vision_list.*.*' => 'nullable|string',
            
            'mission_title.*' => 'required|string|max:255',
            'mission_description.*' => 'required|string',
            'mission_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stat_1_value' => 'required|string',
            'stat_1_label.*' => 'required|string',
            'stat_2_value' => 'required|string',
            'stat_2_label.*' => 'required|string',

            'why_us_title.*' => 'required|string|max:255',
            'why_us_description.*' => 'required|string',
            'why_us_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'feature_1_title.*' => 'required|string',
            'feature_1_description.*' => 'required|string',
            'feature_2_title.*' => 'required|string',
            'feature_2_description.*' => 'required|string',
        ];
    }
}
