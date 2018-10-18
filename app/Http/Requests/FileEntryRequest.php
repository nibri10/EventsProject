<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileEntryRequest extends FormRequest
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
            'file' => 'image|max:100000'
        ];
    }

    public function messages()
    {
        return[
          'file.required'=>'Inserir imagem ao evento é um campo obrigatório / Arquivo de imagem grande!'
        ];
    }
}
