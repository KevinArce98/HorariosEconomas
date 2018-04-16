<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketRequest extends FormRequest
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
            'name'    => 'required|string',
            'location' => 'required|string',
            'description'   => 'required|string',
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048'
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
            'location.required'     => 'El campo ubicación es requerido.',
            'location.string'      => 'El campo ubicación tiene que ser texto.',
            'description.required'     => 'El campo descripción es requerido.',
            'description.string'      => 'El campo descripción tiene que ser texto.',
            'picture.required'      => 'El campo foto es requerido.',
            'picture.image'      => 'El campo foto tiene que ser una imagen.',
            'picture.required'      => 'El campo foto es requerido.',
            'picture.max'      => 'El tamaño de la imagen tiene que ser menor a 2mb.',
            'picture.mimes'      => 'El formato de la imagen tiene que ser jpeg, png o jpg.',
        ];
    }
}
