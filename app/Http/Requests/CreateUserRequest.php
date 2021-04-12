<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'email'         => 'required|email:rfc,dns|unique:users,email',
            'security_code' => 'required|min:8|max:8|regex:/^(?=.*[0-9])(?=.*[A-Z])([A-Z0-9]+)$/|unique:users,security_code',
            'video_type'    => 'required|in:A,B',
        ];
    }

    public function messages()
    {
        return [
            'video_type.in' => '※配信動画区分に値を指定してください。',
        ];
    }
}
