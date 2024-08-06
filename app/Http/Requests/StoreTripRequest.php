<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreTripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'destination' => 'required|string|max:64',
            'img_destination' => 'nullable|image',
            'departure_date' => 'nullable|date',
            'arrival_date' => 'nullable|date',
            'num_people' => 'nullable|numeric|min:0|max:30',
            'transport' => 'nullable|string|min:0|max:24',
            'price' => 'nullable|numeric|min:0|max:9999.99',
            'free' => 'nullable|boolean', // non presente nel db, solo per verifica nel frontend
            'reservation' => 'nullable|boolean',
            'food' => 'nullable|max:4096',
            'notes' => 'nullable|max:4096',
            'travel_completed' => 'nullable|boolean',
        ];
    }
}
