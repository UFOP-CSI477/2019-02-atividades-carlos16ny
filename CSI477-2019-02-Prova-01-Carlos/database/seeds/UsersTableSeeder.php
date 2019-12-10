<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
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
                "name" => 'Bruno Hott',
                "email" => "brhott@ufop.edu.br",
                "area" => "Algoritmo e Estrutura de Dados",
                "password" => Hash::make("euamoocarlos"),
            ],
            [
                'name' => 'Fernando Oliveira',
                'email' => 'fboliveira@ufop.edu.br',
                'area' => 'Aplicações Web',
                'password' => Hash::make('eusoulindo'),
            ],
            [
                'name' => 'Paganini Barcellos',
                'email' => 'pbarcellos@ufop.edu.br',
                'area' => 'Economia',
                'password' => Hash::make('funcaodamoeda'),
            ],
            [
                'name' => 'George Fonseca',
                'email' => 'ggfonseca@ufop.edu.br',
                'area' => 'Economia',
                'password' => Hash::make('formeiem3anos'),
            ]
        );

        DB::table('users')->insert($dados);
    }
}
