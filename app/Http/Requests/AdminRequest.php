<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'no'=>'required|numeric',
            'no_hp'=>'numeric|unique:suppliers'
        ];
    }

    public function messages(){
        return [
        'no.numeric'=>'no hp tidak boleh ada huruf',
        'no_hp.numeric'=>'no sudah ada'
        ];
    } 
}
