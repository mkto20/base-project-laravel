<?php

namespace App\Http\Requests\Security;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ModuloRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:100'],
            'icone' => ['required', 'string', 'max:45'],
            'url' => ['required', 'string', 'max:20', Rule::unique('modulo')->ignore($this->modulo)],
            'descricao' => ['sometimes', 'string', 'max:200'],
        ];
    }
}
