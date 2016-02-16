<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PersonaRequest extends Request
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
        $tipo_documento_valor = Request::get('per_dcmto_tipo');
        $doc_numero = 'required';
        $per_dcmto_tipo = 'required';
        $per_ruc = 'sometimes';

        if (Request::get('per_tipo') == '0002') {
            $per_ruc = 'required';
        }

        if ($tipo_documento_valor == '0001') {
            $doc_numero = 'required|numeric|digits:8|unique:persona,per_dcmto_numero';
        } else if ($tipo_documento_valor == '0002') {
            $doc_numero = 'required|max:12';
        } else if ($tipo_documento_valor == '0003') {
            $doc_numero = 'required|numeric|digits:11';
        } else if ($tipo_documento_valor == '0006' || $tipo_documento_valor == '0004' || $tipo_documento_valor == '0005') {
            $doc_numero = 'required|max:12';
        }

        if (Request::get('per_nacion') == '0002') {
            $per_dcmto_tipo = 'required|same:0002';
        }

        return [
            'per_tipo' => 'required',
            'per_nacion' => 'sometimes|required',
            'per_dcmto_tipo' => 'sometimes|'.$per_dcmto_tipo,
            'per_dcmto_numero' => 'sometimes|'.$doc_numero,
            'per_ape_paterno' => 'sometimes|required',
            'per_ape_materno' => 'sometimes|required',
            'per_nombre1' => 'sometimes|required',
            'per_nombre2' => 'sometimes|sometimes',

            'per_razon_social' => 'sometimes|required',
            'per_ruc' => $per_ruc,

            'per_direccion' => 'required',
            'per_ubg_id' => 'required|numeric',
            'per_direc_referencia' => 'required'
        ];
    }
}
