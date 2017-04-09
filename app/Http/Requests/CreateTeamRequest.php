<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTeamRequest extends FormRequest
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
            'title' => 'string|unique:teams,title|required',
            'age' => 'required',
            'city' => 'string|required',
            'goal' => 'string|required',
            'goal_text' => 'string|required',
            'join_additional' => 'string|required',
            'maps' => 'maps|array|required',
            'contacts.email' => 'nullable|email',
            'contacts.teamspeak' => 'nullable|active_url',
            'socials.vk' => 'nullable|active_url',
            'socials.fb' => 'nullable|active_url',
        ];
    }
}
