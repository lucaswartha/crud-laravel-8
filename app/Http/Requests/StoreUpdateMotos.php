<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateMotos extends FormRequest
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
            'modeloMoto' => ['required', 'min:2', 'max: 20'],
            'marcaMoto' => ['required', 'min:2', 'max: 20'],
            'anoMoto' => ['required', 'min:4', 'max: 4'],
            'imagemMoto' => ['required', 'image'],
        ];
    }
}
