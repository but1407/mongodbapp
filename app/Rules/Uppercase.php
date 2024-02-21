<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Uppercase implements Rule
{
    private $attribute;
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
        $this->attribute = $attribute;
        if($value === mb_strtoupper($value,'UTF-8')){

            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        // dd($this->attribute);
        $customMessage = 'validation.custom.' . $this->attribute . '.uppercase';
        if(trans($customMessage) !== $customMessage){

            return trans($customMessage);
        }
        return trans('validation.uppercase');
    }
}
