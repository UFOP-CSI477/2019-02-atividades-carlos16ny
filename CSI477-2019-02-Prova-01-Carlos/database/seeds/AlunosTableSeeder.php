<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlunosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados=array(
            [
                "name" => "Carlos Abreu",
                "curso" => "SJM"
            ],
            [
                "name" => "Sander Santos",
                "curso" => "SJM"
            ],
            [
                "name" => "Paloma Gomes",
                "curso" => "SJM"
            ],
            [
                "name" => "Leticia Martins",
                "curso" => "SJM"
            ],
            [
                "name" => "Mateus Pereira",
                "curso" => "SJM"
            ],
        );

        DB::table('alunos')->insert($dados);
    }
}
