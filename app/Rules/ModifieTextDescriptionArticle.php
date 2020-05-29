<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Article; 
class ModifieTextDescriptionArticle implements Rule// rule di n3aytoulha f method "updateArticleButton" di f controller "AdminController"
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $id;
    public function __construct($id)//counstructeur di na3tiwlo comme parametre l id ta3 l'article di rena habin nmodifyiwah
    {
        $this->id = $id;//nhato l id ta3 article f l'attributs "private $id"
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)//ki n3ayto l had Rule le system y executer had la fcnt di 3andha 2 parametre "$value"(fih valuer di ra f titre ou description) et "$attribute" w tretourni true ou false, le role ta7a howa t vérifyi ida le titre ta3 article di reni modifyinah (c a d le nouveaux titre) id kyn déja kifo f la table article ou nn(psq rena 3amlin titre et description unique) si kyn elle return false, sinon true(méme choose pour description)
    {
        $articles = Article::All();
            foreach($articles as $article) {//une boucle dans l'attribut "articles" di fih kml les articles ta3 la table
                if( $article->id != $this->id && $article->titre == $value){//si l'id ta3 article courent est = a $id(di zafetnah f constructeur) ("$article" ra fih kml les articles mm l'article di rena nmodifyiw fih alors bach mantestich le titre jdid m3a titre la2dim ta3 méme article zedt "$article->id != $this->id") et le titre de l'article courent est = a le titre d'article nouveaux return false (c a d erreur)
                    return false;
                }
            }


            foreach($articles as $article) {//méme choose mais pour la description
                if( $article->id != $this->id && $article->description == $value){
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
    public function message()//cette method tetéxecuta ki la fcnt passes() treturni false, cette fcnt return un message di yen7at f tableau "message" di f la vue
    {
        return 'Ce :attribute est déja utilisé.';// ida kant kayna erreur f titre ":attribute" ykoun egale a "titre"(méme choose pour description)
    }
}
