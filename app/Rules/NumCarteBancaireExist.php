<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Vendeur;
use App\Employeur;
use App\Admin;
class NumCarteBancaireExist implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
     private $typeCompte;
    private $idUser;

    public function __construct($typeCompte,$idUser)
    {
        $this->typeCompte = $typeCompte;
        $this->idUser = $idUser;
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

        $vendeurs = Vendeur::All();
        $employeurs = Employeur::All();
        $admins = Admin::All();
        if($this->idUser == 0){
             if($this->typeCompte == 2){
                foreach($vendeurs as $vendeur) {
                    if( $vendeur->Num_Compte_Banquaire  == $value){
                        return false;
                    }
                }
            }
            else if($this->typeCompte == 3){
                foreach($employeurs as $employeur) {
                    if( $employeur->num_compte_banquiare == $value){
                        return false;
                    }
                }
            }
            else if($this->typeCompte == 4){
                foreach($admins as $admin) {
                    if( $admin->numCarteBanquaire == $value){
                        return false;
                    }
                }
            }
            
                return true;
       

        }else{
            if($this->typeCompte == 2){
                foreach($vendeurs as $vendeur) {
                    if( $vendeur->Num_Compte_Banquaire  == $value && $vendeur->id != $this->idUser){
                        return false;
                    }
                }
            }
            else if($this->typeCompte == 3){
                foreach($employeurs as $employeur) {
                    if( $employeur->num_compte_banquiare == $value && $employeur->id != $this->idUser){
                        return false;
                    }
                }
            }
            else if($this->typeCompte == 4){
                foreach($admins as $admin) {
                    if( $admin->numCarteBanquaire == $value && $admin->id != $this->idUser){
                        return false;
                    }
                }
            }
            
                return true;
       
        }
       
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ce :attribute est déja utilisé.';
    }
}
