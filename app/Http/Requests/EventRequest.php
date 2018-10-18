<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'description' => 'required|max:300',
            'date_initial'=> 'required',
            'date_finish'=> 'required',
            'local' => 'required|max:100',
            'time' => 'required',
            'time_expiration'=> 'required',
            'city'=> 'required|max:100',
            'vacancies'=>'required|integer',
            'target_audience'=>'required|string|max:50',
            'arquivo'=>'required'
        ];
    }


    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'=> 'O nome do evento é um campo obrigatório',
            'description.required'=>'A descricação do evento é um campo obrigatório',
            'date_initial.required'=>'A data de início do evento é um campo obrigatório',
            'date_finish.required'=>'A data de término do evento é um campo obrigatório',
            'local.required'=>'O local do evento é um campo obrigatório ',
            'time'=>'O horário de início do evento é um campo obrigatório',
            'time_expiration.required'=>'O horário de término do evento é um campo obrigatório',
            'city'=>'A cidade é um campo obrigatório',
            'vacancies.required'=>'O número de vagas é um campo obrigatório ',
            'target_audience.required'=>'O publíco alvo é um campo obrigatório',
            'arquivo'=>'Imagem do evento é um campo obrigatório'
     ];
    }
}
