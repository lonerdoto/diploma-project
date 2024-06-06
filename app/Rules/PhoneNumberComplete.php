<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumberComplete implements Rule
{

    public function passes($attribute, $value)
    {

        return strpos($value, '_') === false;
    }


    public function message()
    {
        return 'Поле :attribute должно быть полностью заполнено.';
    }
}
