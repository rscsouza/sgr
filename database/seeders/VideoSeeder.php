<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->truncate();
        //Relativo aos vídeos de uma República.
        Video::create([
            'republica_id'=>1,
            'titulo'=>'Homem Amarelo da República Alforria - Campeã do concurso da SKOL',
            'descricao'=>'https://www.youtube.com/watch?v=A2rXn0W7d8U',
            'ativo' => 1
        ]);
    }
}
