<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => trans('admin.users.username_required'),
            'username.unique' => trans('admin.users.username_unique'),
            'email.required' => trans('admin.users.email_required'),
            'email.unique' => trans('admin.users.email_unique'),
            'password.required' => trans('admin.users.password_required'),
            'password.confirmed' => trans('admin.users.password_confirmed'),
            'password.min' => trans('admin.users.password_min'),
        ];
    }
}
