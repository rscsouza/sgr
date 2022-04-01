<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cidade;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('cidades')->truncate();
        Cidade::create([
            'nome' => 'Abaeté',
            'estado'=>'MG'
        ]);
        Cidade::create([
            'nome' => 'Belo Horizonte',
            'estado'=>'MG'
        ]);
        Cidade::create([
            'nome' => 'Conselheiro Lafaiete',
            'estado'=>'MG'
        ]);
        Cidade::create([
            'nome' => 'Ipatinga',
            'estado'=>'MG'
        ]);
        Cidade::create([
            'nome' => 'Itabira',
            'estado'=>'MG'
        ]);
        Cidade::create([
            'nome' => 'Ouro Preto',
            'estado'=>'MG'
        ]);
        Cidade::create([
            'nome' => 'Ponte Nova',
            'estado'=>'MG'
        ]);
        Cidade::create([
            'nome' => 'Uberaba',
            'estado'=>'MG'
        ]);

    }
}
