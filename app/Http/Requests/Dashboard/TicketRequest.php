<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title.*' => ['required', 'string', 'max:50'],
            'details.*' => ['required', 'string', 'min:10', 'max:5000'],
            'price' => ['required'],
            'from_country_id' => ['required'],
            'from_city_id' => ['required'],
            'to_country_id' => ['required'],
            'to_city_id' => ['required'],
            'status' => ['required', 'in:1,0'],
            'photo' => [$this->id ? 'nullable' : 'required', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
        ];
    }
}
