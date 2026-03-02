<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'flight_id' => ['required'],
            'service' => ['required'],
            'client_name' => ['required', 'string', 'min:3', 'max:255'],
            'client_mobile' => ['required', 'string', 'min:3', 'max:255'],
            'client_email' => ['required', 'email', 'min:3', 'max:255'],
            'client_passport_number' => ['required', 'string', 'min:3', 'max:255'],
            'number_of_adult' => ['required', 'numeric'],
            'number_of_children' => ['required', 'numeric'],
            'number_of_babies' => ['required', 'numeric'],
            'nationality' => ['required', 'string', 'min:3', 'max:255'],
            'depature_country_id' => ['required'],
            'depature_date' => ['required', 'date'],
            'return_date' => ['required', 'date', 'after:depature_date'],
            'ticket_id' => ['required'],
            'economy_class_name' => ['required', 'string', 'min:3', 'max:255'],
            'economy_class_type' => ['required'],
            'notes' => ['required', 'string', 'min:10', 'max:1500'],
        ];
    }
}
