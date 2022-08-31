<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $user = request()->route('user');
        return [
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email:rfc,dns|unique:users,email,' . $user->id,
        ];
    }

    public function messages()
    {
        return [
            'username.required' => trans('admin.users.username_required'),
            'username.unique' => trans('admin.users.username_unique'),
            'email.required' => trans('admin.users.email_required'),
            'email.unique' => trans('admin.users.email_unique'),
        ];
    }
}
