<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TitreDescriptionExist;
class ArticleRequest extends FormRequest
{
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
    public function rules()
    {
        return [
          'titre' => ['required', 'string', 'max:150', 'min:3','regex:/[a-z0-9A-Z][a-z0-9A-Z,."_éçè!?$àâ(){}]+/',new TitreDescriptionExist()],
          'description' => ['required', 'string','regex:/[a-z0-9A-Z][a-z0-9A-Z,."_éçè!?$àâ(){}]+/',new TitreDescriptionExist()],
          'image' => ['required'],
        ];
    }
}
