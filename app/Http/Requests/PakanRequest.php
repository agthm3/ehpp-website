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
            'protein' => 'required|integer|max:10',
            'lemak' => 'required|integer|max:10',
            'serat' => 'required|integer|max:10',
            'energi' => 'required|integer|max:10',
            'ca' => 'required|integer|max:10',
            'p' => 'required|integer|max:10',
        ];
    }
}
