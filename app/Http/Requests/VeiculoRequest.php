<?php

namespace FederalSt\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VeiculoRequest extends FormRequest
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

        // $this->request->get("proprietario")

        return [
            'placa' => ['bail', 'required','min:3','max:20'],
            'renavam' =>  ['bail', 'required','min:3','max:20'],
            'modelo' =>  ['bail', 'required','min:3','max:20'],
            'marca' =>  ['bail', 'required','min:3','max:20'],
            'ano' =>   ['bail', 'required','integer',"digits_between:4,5"],
            'proprietario' =>  ['bail', 'required','integer',"exists:users,id"]
        ];
    }


   public function messages()
   {
       return [
           'proprietario.exists' => 'Proprietário não Encontrado'
       ];
   }


}
