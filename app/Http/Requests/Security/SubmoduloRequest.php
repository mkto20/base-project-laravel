<?php

namespace App\Http\Requests\Security;

use Illuminate\Foundation\Http\FormRequest;

class SubmoduloRequest extends FormRequest
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
            'modulo_id' => ['required', 'numeric'],
            'nome' => ['required', 'string', 'max:100'],
            'icone' => ['required', 'string', 'max:45'],
            'menu' => ['required', 'boolean'],
            'descricao' => ['sometimes', 'nullable', 'string', 'max:200'],
            'ordem' => ['sometimes', 'nullable', 'boolean'],
        ];
    }
}
