<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Article; 
class TitreDescriptionExist implements Rule// rule di n3aytoulha f "ArticleRequest" 
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
    public function passes($attribute, $value)//ki n3ayto l had Rule le system y executer had la fcnt di 3andha 2 parametre "$value"(fih valuer di ra f titre ou description) et "$attribute" w tretourni true ou false, le role ta7a howa t vérifyi ida le titre ta3 article di reni habin n ajoutiwah kyn déja kifo f la table article ou nn(psq rena 3amlin titre et description unique) si kyn elle return false, sinon true(méme choose pour description)
    {
        $articles = Article::All();

            foreach($articles as $article) {//une boucle dans l'attribut "articles" di fih kml les articles ta3 la table
                if( $article->titre == $value){//si le titre de l'article courent est = a le titre d'article di rena machyin najoutiwah return false (c a d erreur)
                    return false;
                }
            }


            foreach($articles as $article) {//méme choose mais pour la description
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
    public function message()//cette method tetéxecuta ki la fcnt passes() treturni false, cette fcnt return un message di yen7at f tableau message di f la vue
    {
        return 'Ce :attribute est déja utilisé.';// ida kant kayna erreur f titre ":attribute" ykoun egale a "titre"(méme choose pour description)
    }
}
