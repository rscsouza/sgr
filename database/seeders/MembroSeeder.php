<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Membro;

class MembroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bixos')->truncate();
        DB::table('moradors')->truncate();
        DB::table('ex_alunos')->truncate();
        //Relativo ao membro que passou pelos estágios de bixo, morador e ex aluno.
        Membro::create([
            'curso_id'=>1,
            'cidade_id'=>1,
            'nome' => 'Joaquim Silva',
            'apelido'=>'Quinzinho',
            'email'=>'joaquim@yahoo.com.br',
            'filiacao_pai'=>'João Pedro',
            'filiacao_mae'=>'Maria José',
            'telefone_pai'=>'31999999999',
            'telefone_mae'=>'31888888888',
            'perfil'=>3
        ]);

        //Relativo ao membro que passou pelos estágios de bixo e morador.
        Membro::create([
            'curso_id'=>2,
            'cidade_id'=>2,
            'nome' => 'Paulo Mateus',
            'apelido'=>'Paulinho',
            'email'=>'paulinho@uol.com.br',
            'filiacao_pai'=>'Antônio Carlos',
            'filiacao_mae'=>'Pauliana Andrade',
            'telefone_pai'=>'31777777777',
            'telefone_mae'=>'31666666666',
            'perfil'=>2
        ]);

        //Relativo ao membro que está no estágio de bixo.
        Membro::create([
            'curso_id'=>3,
            'cidade_id'=>3,
            'nome' => 'José Mario',
            'apelido'=>'Mineirão',
            'email'=>'jose_mario@gmail.com',
            'filiacao_pai'=>'Marcos Pereira',
            'filiacao_mae'=>'Efigênia Duarte',
            'telefone_pai'=>'31555555555',
            'telefone_mae'=>'31444444444',
            'perfil'=>1
        ]);

    }
}
