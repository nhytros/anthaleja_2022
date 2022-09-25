<?php

namespace App\Rules;

use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Contracts\Validation\Rule;

class MatchOldPassword implements Rule
{
    public function passes($attribute, $value)
    {
        return Hash::check($value, Auth::user()->password);
    }

    public function message()
    {
        return 'The :attribute is match with old password.';
    }
}
