<?php

namespace App\Http\Requests\PostRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }

    public function failedValidation(Validator $Validator)
    {

        $response = response()->json('Verifique os campos obrigatorios e tente novamente');

        throw new HttpResponseException($response);

    }


    public function rules()
    {
        return [
            
            'title'      => 'required',
            'post_body' => 'required'

        ];
    }


}