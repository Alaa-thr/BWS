<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TitreDescriptionExist;
class ArticleRequest extends FormRequest {//Request 2asmo "ArticleRequest" ytestilna les info di rena 7abin n2ajoutiwhom ida yetmechaw 3la 7sab les regles tawa3na ou nn(si oui y ajouti w ykml khademto, sinon yretourni des erreur)) 
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()//hadou des ram b yellow houma les regles di ytesti ida ram yrispictiwhom ou nn
    {
        return [
          'titre' => ['required', 'string', 'max:150', 'min:3','regex:/^[A-Z0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/',new TitreDescriptionExist()],
          'description' => ['required', 'string','regex:/^[A-Z0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/',new TitreDescriptionExist()],// ^[a-z0-9A-Z] c a d bedya ta3 titre tbeda b a-z ou A-Z ou 0-9
          'image' =>['required','regex:/^data:image/'],
        ];
        //required => khas ydakhel haja (c a d maykhalich l input vide)
        //string => khas ykoun de type string (c a d ketba)
        //max:150 => khas titre max ykoun fih 150 caractere
        //min:3 => khas titre min ykoun fih 3 caractere
        //regex:/^[a-z0-9A-Z][a-z0-9A-Z,."_éçè!?$àâ(){}]+ => ^: c a d bedya ta3 la chaine
        //                                                   ^ [a-z0-9A-Z]: khas bedya ta3 la chaine tbeda b a-z ou 0-9 ou A-Z
        //                                                   [a-z0-9A-Z,."_éçè!?$àâ(){}]:c a d menmour [a-z0-9A-Z] tenjem tekteb ey caractere m di ram hna 'a-z0-9A-Z,."_éçè!?$àâ(){}'
        //                                                   +: c a d t2ad tekteb plusieur caracter w khas ykoun au moin un caractere f la chaine
        //new TitreDescriptionExist() => appele l constructeur de Rule "TitreDescriptionExist" di tejebrouha f "app/Rules"
    }
}

