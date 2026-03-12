<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsTimelineRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'year' => 'required|string',
            'sort_order' => 'required|numeric',
            'title.ar' => 'required|string',
            'title.en' => 'required|string',
            'text.ar' => 'required|string',
            'text.en' => 'required|string',
        ];
    }
}
