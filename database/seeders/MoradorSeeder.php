<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Morador;

class MoradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('moradors')->truncate();
        //Relativo ao membro que passou pelos estágios de bixo, morador e ex aluno.
        Morador::create([
            'membro_id'=>1,
            'hierarquia'=>1,
            'decano'=>0,
            'morando' => 0,
            'abandonou'=>0
        ]);

        //Relativo ao membro que passou pelos estágios de bixo.
        Morador::create([
            'membro_id'=>2,
            'hierarquia'=>1,
            'decano'=>1,
            'morando' => 1,
            'abandonou'=>0
        ]);
    }
}
