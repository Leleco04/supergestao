<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;
use Mockery\Exception\NoMatchingExpectationException;

class SiteContatoSeeder extends Seeder
{

    public function run(): void
    {
        // $contato = new SiteContato();
        // $contato->nome = 'Sistema SG';
        // $contato->telefone = '(11) 9999-9999';
        // $contato->email = 'contato@sg.com';
        // $contato->motivo_contato = 1;
        // $contato->mensagem = 'Seja bem-vindo ao sistema Super Gestão';
        // $contato->save();

        // Comando para executar a factory SiteContato
        SiteContato::factory()->count(100)->create();
    }
}
