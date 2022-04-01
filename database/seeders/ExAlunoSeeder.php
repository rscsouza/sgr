<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ExAluno;

class ExAlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ex_alunos')->truncate();
        //Relativo ao membro que passou pelos estágios de bixo, morador e ex aluno.
        ExAluno::create([
            'membro_id'=>1,
            'data_formatura'=>'2021-02-01'
        ]);
    }
}
