<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjetosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = array(
            [
                'aluno_id' => '1',
                'professor_id' => '1',
                'titulo' => 'Algoritimo de Busca para Casais',
                'ano' => '2020',
                'semestre' => '02',
            ],
            [
                'aluno_id' => '2',
                'professor_id' => '2',
                'titulo' => 'Sistema de Gerêncimento de Redes Sociais',
                'ano' => '2019',
                'semestre' => '01',
            ],
            [
                'aluno_id' => '3',
                'professor_id' => '2',
                'titulo' => 'Acessibilidade',
                'ano' => '2019',
                'semestre' => '02',
            ],
            [
                'aluno_id' => '4',
                'professor_id' => '4',
                'titulo' => 'Acessibilidade de Materiais Digitais',
                'ano' => '2019',
                'semestre' => '01',
            ],
            [
                'aluno_id' => '5',
                'professor_id' => '3',
                'titulo' => 'Chique',
                'ano' => '2019',
                'semestre' => '02',
            ],
        );

        DB::table('projetos')->insert($dados);
    }
}
