<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PakanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
              return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
   
        return [
            'name'=> 'required|max:255',
            'description' => 'required',
            'price'=>'required|integer', 
            'description' => 'required|string', 
            'protein' => 'required|varchar',
            'lemak' => 'required|varchar',
            'serat' => 'required|varchar',
            'energi' => 'required|varchar',
            'ca' => 'required|varchar',
            'p' => 'required|varchar',
            'mixing'=> 'required|varchar',
            'gprotein' => 'between:0,9999|required',
            'glemak'=>'between:0,99999|required',
            'gkasar' => 'between:0,99999|required',
            'generg'=> 'between:0,99999|required',
            'gca'=> 'between:0,99999|required',
            'gp'=>'between:0,99999|required'

        ];
    }
}
