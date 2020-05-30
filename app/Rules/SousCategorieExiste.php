<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Sous_Categorie;
use DB;

class SousCategorieExiste implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $idCategorie;
    public function __construct($idCategorie)
    {
        $this->idCategorie = $idCategorie;
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

        $sous_categories = Sous_Categorie::All();
        $typeSCategorie = \DB::table('categories')->where('id',$this->idCategorie)->value('typeCategorie');
        foreach($sous_categories as $sous_categorie) {
            $typeSCategorieCourent = \DB::table('categories')->where('id',$sous_categorie->categorie_id)->value('typeCategorie');
            if( $sous_categorie->libelle == $value && $typeSCategorieCourent == $typeSCategorie){
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
        return 'Ce sous-categorie est déja utilisé.';
    }
}
