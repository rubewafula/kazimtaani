<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidRecipients implements Rule
{
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
        //
        $contacts= explode(',',$value);
        
        foreach($contacts as $key=> $value)
        {
           $phone= str_replace(' ','',$value);
            if(strlen($phone) < 10)
            {
                return FALSE;
            }

        }
        return  TRUE;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please  the  recepients  and  try  again';
    }
}
