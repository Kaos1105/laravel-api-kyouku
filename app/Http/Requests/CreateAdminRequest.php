<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
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
            'username'         => 'required|min:5|max:16|regex:/^[A-Za-z0-9\-\s]+$/|unique:admins,username,'.$this->id,
            'password'         => 'required|min:8|max:16|regex:/([A-Za-z0-9\-\_]+)/',
            'confirm_password' => 'required|regex:/([A-Za-z0-9\-\_]+)/|same:password',
            'id'               => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'username.regex' => '※ログインIDは英数字で指定してください。',
        ];
    }
}
