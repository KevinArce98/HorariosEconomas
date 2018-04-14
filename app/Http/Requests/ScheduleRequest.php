<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ScheduleRequest extends FormRequest
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
            'user_id'    => 'required|numeric|min:1',
            'market_id' => 'required|numeric|min:1',
            'week_id'   => 'required|numeric|min:1'
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.required'     => 'El colaborador es requerido.',
            'user_id.numeric'      => 'El id del colaborador tiene que ser numerico minimo 1.',
            'market_id.required'     => 'El punto de venta es requerido.',
            'market_id.numeric'      => 'El id del punto de venta tiene que ser numerico minimo 1.',
            'week_id.required'     => 'La semana es requerida.',
            'market_id.numeric'      => 'El id de la semana tiene que ser numerico minimo 1.',
        ];
    }
}
