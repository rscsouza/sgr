<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Foto;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fotos')->truncate();
        //Relativo as fotos de uma República.
        Foto::create([
            'republica_id'=>1,
            'descricao'=>'Casa',
            'ativo' => 1
        ]);
        Foto::create([
            'republica_id'=>1,
            'descricao'=>'Sala de Estudos',
            'ativo' => 1
        ]);
        Foto::create([
            'republica_id'=>1,
            'descricao'=>'Quartos',
            'ativo' => 1
        ]);
    }
}
