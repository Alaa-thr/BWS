<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Article; 
//php artisan make:rule OlympicYear => create new rule
class TitreDescriptionExist implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */


    public function __construct()
    {

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
        $articles = Article::All();

            foreach($articles as $article) {
                if( $article->titre == $value){
                    return false;
                }
            }


            foreach($articles as $article) {
                if( $article->description == $value){
                    return false;
                }
            }

            return true;
    
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is used before';
    }
}
