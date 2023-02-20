<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //1
        DB::table('categories')->insert([
            'name' => 'Electrodomesticos',
        ]);
        //2
        DB::table('categories')->insert([
            'name' => 'Comida',
        ]);
        //3
        DB::table('categories')->insert([
            'name' => 'Productos De limpieza',
        ]);
        //4
        DB::table('categories')->insert([
            'name' => 'Tecnologia',
        ]);
        //5
        DB::table('categories')->insert([
            'name' => 'Ropa',
        ]);
    }
}
