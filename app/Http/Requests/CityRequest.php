<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'population' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Ime je obavezno polje",
            'name.min' => "Polje ime mora imati makar 2 karaktera",
            'population.required' => "Broj stanovnika je obavezno polje",
            'population.integer' => "Broj stanovnika je cijeli broj",
        ];
    }
}
