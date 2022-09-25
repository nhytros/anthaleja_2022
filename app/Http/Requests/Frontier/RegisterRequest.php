<?php

namespace App\Http\Requests\Frontier;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:users,username',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => [
                'required', 'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(3)
            ],
            'first_name' => 'required',
            'last_name' => 'required',
            'c_username' => 'required:unique:characters,username',
            'gender' => 'required',
            'height' => 'required',
            'date_of_birth' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username:required' => __('Character username is required'),
            'username:unique' => __('Character username already taken'),
        ];
    }
}
