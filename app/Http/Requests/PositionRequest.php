<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'payforhour' => 'required|numeric|min:1'
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
            'name.required'     => 'El campo nombre es requerido.',
            'name.string'      => 'El campo nombre tiene que ser texto.',
            'description.required'     => 'El campo descripción es requerido.',
            'description.string'      => 'El campo descripción tiene que ser texto.',
            'payforhour.required'     => 'El campo pago por hora es requerido.',
            'payforhour.numeric'      => 'El campo pago por hora tiene que ser numerico.',
            'payforhour.min'      => 'El campo pago por hora tiene que ser minimo 1.',
        ];
    }
}
