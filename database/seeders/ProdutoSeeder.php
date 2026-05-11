<?php
namespace Database\Seeders;
use App\Models\Produto;
use Illuminate\Database\Seeder;
class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        // Exemplos fixos (úteis para desenvolvimento)
        $fixas = [
            [
                'categoria_id' => 1, // Bebidas
                'nome' => 'teste',
                'descricao' => 'produto de teste',
                'preco' => 10.00,
                'ativo' => true
            ],
            [
                'categoria_id' => 2, // Lanches
                'nome' => 'coxinha',
                'descricao' => 'coxinha de frango',
                'preco' => 15.00,
                'ativo' => true
            ]
        ];
        foreach ($fixas as $c) {
            Produto::firstOrCreate(['nome' => $c['nome']], $c);
        }

        // Complemento com dados fake
        Produto::factory()->count(5)->create();
    }
}
