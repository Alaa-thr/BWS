<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CommandeRequest extends FormRequest {
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
          'numero_tlf' => ['required', 'string', 'max:10', 'min:10','regex:/0[5-7]+/'],
          'email' => ['required', 'string','email'],
          'code_postale' => ['required', 'string', 'max:5', 'min:5','regex:/[0-9]{5}+/'],
          'address' => ['required', 'string'],
        ];
    }
}

