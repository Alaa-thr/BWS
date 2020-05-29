<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Client;
use App\Vendeur;
use App\Employeur;
use App\Admin;
class EmailExist implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
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

        $clients = Client::All();
        $vendeurs = Vendeur::All();
        $employeurs = Employeur::All();
        $admins = Admin::All();
        if($this->data == 1){
            foreach($clients as $client) {
                if( $client->email == $value){
                    return false;
                }
            }
        }
        else if($this->data == 2){
            foreach($vendeurs as $vendeur) {
                if( $vendeur->email == $value){
                    return false;
                }
            }
        }
        else if($this->data == 3){
            foreach($employeurs as $employeur) {
                if( $employeur->email == $value){
                    return false;
                }
            }
        }
        else if($this->data == 4){
            foreach($admins as $admin) {
                if( $admin->email == $value){
                    return false;
                }
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
        return 'Ce :attribute est déja utilisé.';
    }
}
