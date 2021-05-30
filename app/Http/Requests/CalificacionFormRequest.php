<?php

namespace escuela\Http\Requests;

use escuela\Http\Requests\Request;

class CalificacionFormRequest extends Request
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
            'idalumno'=>'required|max:100',
            'califuno'=>'required|max:200',
            'califdos'=>'required|max:200',
            'califtres'=>'required|max:200',
            'califcuatro'=>'required|max:200',
            'califcinco'=>'required|max:200',
            'promedio'=>'max:200'
        ];
    }
}
