<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $users = [
            [
                'name' => "Carlos Henrique Pereira Abreu",
                'email' => "carloshpa.mg4@me.com",
                'password' => Hash::make("123456"), // password
                'type' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Fernando Bernardes Oliveira",
                'email' => "fboliveira@ufop.edu.br",
                'password' => Hash::make("123456"), // password
                'type' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        
        DB::table('users')->insert($users);
    }
}
