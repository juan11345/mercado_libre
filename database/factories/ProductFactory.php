<?php

namespace Database\Factories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'category_id' => $this -> faker -> randomElement([1,2,3,4,5]),
            'name' => $this -> faker -> word(),
            'description' => $this -> faker -> paragraph(),
            'price' => $this -> faker -> randomDigit(),
            'stock' => $this -> faker -> randomDigit(),
        ];
    }
}
