<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCarros extends FormRequest
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
            'modeloCarro' => ['required', 'min:2', 'max: 20'],
            'marcaCarro' => ['required', 'min:2', 'max: 20'],
            'anoCarro' => ['required', 'min:4', 'max: 4'],
            'imagemCarro' => ['required', 'image'],
        ];
    }
}
