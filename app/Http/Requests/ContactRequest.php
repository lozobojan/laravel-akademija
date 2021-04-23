<?php

namespace App\Http\Requests;

use App\Rules\MnePhoneNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|min:2|max:255',
            'phone' => ['required', new MnePhoneNumberRule()],
            'profile_image' => 'nullable',
            'city_id' => 'required|integer',
        ];
    }

    public function validated()
    {
        $data = $this->validate($this->rules());
        if($this->profile_image){
            $data['profile_image'] = 'storage/' . $this->file('profile_image')->store('profile-images');
        }
        $data['user_id'] = auth()->id();
        return $data;
    }
}
