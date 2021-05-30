<?php

namespace escuela\Http\Requests;

use escuela\Http\Requests\Request;

class AlumnoFormRequest extends Request
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
            'nombre'=>'max:100',
            'apellidos'=>'max:100',
            'responsable'=>'max:100',
            'emailresponsable'=>'max:100',
            'condicion'=>'max:100',

        ];
    }
}
