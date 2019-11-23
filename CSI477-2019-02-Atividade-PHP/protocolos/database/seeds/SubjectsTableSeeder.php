<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();
        $subjects = [
            [
                'name' => 'Certidão de Débitos Relativos a Créditos Tributários Federais e à Dívida Ativa da União',
                'price' => '127.90',
                'created_at' => now(),
                'updated_at' =>  now()
            ],
            [
                'name' => 'Certificado de regularidade do FGTS',
                'price' => '89.90',
                'created_at' => now(),
                'updated_at' =>  now()
            ],
            [
                'name' => 'Certidão Negativa de Débito Estadual',
                'price' => '145.90',
                'created_at' => now(),
                'updated_at' =>  now()
            ],
            [
                'name' => 'Certidão Negativa de Débitos Trabalhistas',
                'price' => '230.90',
                'created_at' => now(),
                'updated_at' =>  now()
            ],
            [
                'name' => 'Certidão Negativa de Tributos Mobiliários e Imobiliários',
                'price' => '449.90',
                'created_at' => now(),
                'updated_at' =>  now()
            ],
            [
                'name' => 'Certidão Negativa de Protesto',
                'price' => '49.90',
                'created_at' => now(),
                'updated_at' =>  now()
            ],
        ];

        DB::table('subjects')->insert($subjects);
    }
}
