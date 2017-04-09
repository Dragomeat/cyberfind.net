<?php

namespace App\Http\Requests;

use App\Models\User\Gender;
use App\Models\User\Country;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'login' => 'required',
            'age' => 'max:2',
            'country' => 'in:'.implode(',', Country::getAll()),
            'city' => 'max:12',
            'gender' => 'in:'.implode(',', Gender::getAll()),
            'about' => 'max:2500',
            'skype' => 'max:14',
            'telephone' => 'nullable|regex:/(7)[0-9]{10}/',
            'old_password' => '',
            'password' => 'confirmed',
        ];
    }
}
