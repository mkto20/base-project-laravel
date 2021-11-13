<?php

namespace App\Http\Requests\Security;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OperacaoRequest extends FormRequest
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
            'submodulo_id' => ['required', 'numeric'],
            'nome' => ['required', 'string', 'max:100'],
            'url' => ['required', 'string', 'max:20', Rule::unique('modulo')->ignore($this->modulo)],
            'icone' => ['required', 'string', 'max:45'],
            'target' => ['sometimes', 'nullable'],
            'descricao' => ['sometimes', 'nullable', 'string', 'max:200'],
        ];
    }
}
