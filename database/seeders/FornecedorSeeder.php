<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{

    public function run(): void
    {
        // Adicionando o fornecedor utilizando um objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'FornecedorSeeder';
        $fornecedor->site = 'FornecedorSeeder.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'FornecedorSeeder@gmail.com';
        $fornecedor->save();

        // Adicionando o fornecedor utilizando o método create (necessário atributo fillable em models (colocar quais campos podem ser preenchidos))
        Fornecedor::create([
            'nome' => 'Fornecedor200',
            'site' => 'Fornecedor200.com.br',
            'uf' => 'PR',
            'email' => 'Fornecedor200@gmail.com'
        ]);

        // Adicionando o fornecedor utilizando o insert *NÃO RECOMENDADO*
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor300',
            'site' => 'Fornecedor300.com.br',
            'uf' => 'RS',
            'email' => 'Fornecedor300@gmail.com'    
        ]);
    }
}
