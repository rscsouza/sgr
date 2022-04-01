<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Bixo;

class BixoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bixos')->truncate();
        //Relativo ao membro que passou pelos estágios de bixo, morador e ex aluno.
        Bixo::create([
            'membro_id'=>1,
            'data_inicio'=>'2017-01-01',
            'data_fim'=>'2017-07-01',
            'processo_seletivo' => 0,
            'escolhido'=>1
        ]);

        //Relativo ao membro que passou pelos estágios de bixo e morador.
        Bixo::create([
            'membro_id'=>2,
            'data_inicio'=>'2019-08-01',
            'data_fim'=>'2021-02-01',
            'processo_seletivo' => 0,
            'escolhido'=>1
        ]);

        //Relativo ao membro que está no estágio de bixo.
        Bixo::create([
            'membro_id'=>3,
            'data_inicio'=>'2022-01-01',
            'processo_seletivo' => 1,
            'escolhido'=>0
        ]);
    }
}
