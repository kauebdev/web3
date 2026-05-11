<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Se estiver editando, o model vem pela rota (route model binding)
        $produtoId = $this->route('produto')?->id;

        return [
            'nome' => [
                'required',
                'string',
                'max:100',
                Rule::unique('produtos', 'nome')->ignore($produtoId),
            ],
            'descricao' => 'nullable|string|max:500',
            'preco' => 'required|numeric|min:0',
            'ativa' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Informe o nome do produto.',
            'nome.max' => 'O nome deve ter no máximo :max caracteres.',
            'nome.unique' => 'Já existe um produto com este nome.',
            'descricao.max' => 'A descrição deve ter no máximo :max caracteres.',
            'preco.required' => 'Informe o preço do produto.',
            'preco.min' => 'O preço deve ser um valor positivo.',
        ];
    }
}
