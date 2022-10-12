<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //melakukan pengecekan apakha sudah login atau tidak, kalau sudah login baru bisa akses 
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        //memasukkan validasi menggunakan form request 
        return [
            'name'=> 'required|max:255',
            'price'=>'required|integer', 
            'description' => 'required'
        ];
    }
}
