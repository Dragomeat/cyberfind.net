<?php

namespace App\Http\Requests;

use App\Models\Team\Roles;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class JoinTeamRequest extends FormRequest
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
            'role' => [
                'required',
                 Rule::in(Roles::getAll()),
            ],
        ];
    }
}
