<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class FeedbackRequest
 * @package App\Http\Requests
 */
class FeedbackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'string|required',
            'subject' => 'string|required',
            'email' => 'email|required',
            'message' => 'string|max:200|required',
            'g-recaptcha-response' => 'recaptcha|required',
        ];
    }
}
