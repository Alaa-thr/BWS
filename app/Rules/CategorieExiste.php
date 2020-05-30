<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Categorie;
class CategorieExiste implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $typeCategorie;
    public function __construct($typeCategorie)
    {
        $this->typeCategorie = $typeCategorie;
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

        $categories = Categorie::All();
        foreach($categories as $categorie) {
            if( $categorie->libelle == $value && $categorie->typeCategorie == $this->typeCategorie){
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
        return 'Ce categorie est déja utilisé.';
    }
}
