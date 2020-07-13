<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Produit;
class ModifieLibelleDescriptionProduit implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
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
        $produits = Produit::All();
           foreach($produits as $produit){
            if($produit->id != $this->id && $produit->Libellé == $value){
                return false;
            }
           }
           foreach($produits as $produit){
             if($produit->id != $this->id && $produit->description == $value){
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
        return'Ce :attribute est déja utilisé.';
    }
}
