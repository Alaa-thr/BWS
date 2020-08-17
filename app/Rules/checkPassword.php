<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Hash;
use Auth;
class checkPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $newPassword;
    public function __construct($newPassword)
    {
        $this->newPassword = $newPassword;
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
        if($this->newPassword == null){
            if(Hash::check($value,Auth::user()->password)){
                 return true;
            }else{
                return false;
            }
        }
        else{
            if($value == $this->newPassword){
                return true;
            }
            return false;
        }
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The password is inccorect.';
    }
}
