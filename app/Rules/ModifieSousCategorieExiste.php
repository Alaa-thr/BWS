<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Sous_Categorie;
use DB;

class ModifieSousCategorieExiste implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $id;
    private $idCategorie;
    public function __construct($id,$idCategorie)
    {
        $this->id = $id;
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
        $souscategories = Sous_Categorie::All();
        $typeSCategorie = \DB::table('categories')->where('id',$this->idCategorie)->value('typeCategorie');
            foreach($souscategories as $souscategorie) {
                $typeSCategorieCourent = \DB::table('categories')->where('id',$souscategorie->categorie_id)->value('typeCategorie');
                if( $souscategorie->id != $this->id && $souscategorie->libelle == $value && $typeSCategorieCourent == $typeSCategorie){
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
