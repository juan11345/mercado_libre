<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        /**1
         * Usuario Administrador
         */
        DB::table('users')->insert([
            'name' => 'administrador',
            'last_name' => 'uno',
            'email'=>'emailadmin@gmail.com',
            'password' => bcrypt('123456789'),

        ]);
        /**2
         * Usuario  Cualquiera
         */
        DB::table('users')->insert([
            'name' => 'Juan Sebastian',
            'last_name' => 'Herrera Suarez',
            'email'=>'tab457893@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
