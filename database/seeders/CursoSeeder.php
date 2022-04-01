<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Curso;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->truncate();
        Curso::create([
            'nome' => 'Arquitetura'
        ]);
        Curso::create([
            'nome' => 'Ciência da Computação'
        ]);
        Curso::create([
            'nome' => 'Engenharia Civil'
        ]);
        Curso::create([
            'nome' => 'Farmácia'
        ]);
        Curso::create([
            'nome' => 'Medicina'
        ]);
    }
}
