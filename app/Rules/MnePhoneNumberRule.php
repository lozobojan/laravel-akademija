<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MnePhoneNumberRule implements Rule
{

    private $allowed_prefixes = ['063', '066', '067', '068', '069'];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array(substr($value, 0,3), $this->allowed_prefixes);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Mozete cuvati samo brojeve sa prefiksima: '.implode(',', $this->allowed_prefixes);
    }
}
