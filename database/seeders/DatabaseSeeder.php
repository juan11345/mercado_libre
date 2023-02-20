<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\product;
use App\Models\Product as ModelsProduct;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\CategorySeed;
use Database\Seeders\UserSeed;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeed::class,
            UserSeed::class
        ]);

        User::factory(8)->create();
        Product::factory(100)->create();
    }
}
