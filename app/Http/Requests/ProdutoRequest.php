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

            'categoria_id' => 'required|exists:categorias,id',

            'ativo' => 'nullable|boolean',

            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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
            'categoria_id.required' => 'Informe a categoria do produto.',
            'categoria_id.exists' => 'A categoria selecionada é inválida.',
            'ativo.boolean' => 'O campo ativo deve ser verdadeiro ou falso.',
            'imagem.image' => 'O arquivo deve ser uma imagem.',
            'imagem.mimes' => 'A imagem deve ser do tipo: jpg, jpeg, png ou webp.',
            'imagem.max' => 'A imagem deve ter no máximo :max kilobytes.',
        ];
    }
}
