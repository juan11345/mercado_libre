<?php

namespace Database\Factories;
use app\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this -> faker -> name(),
            'last_name' => $this -> faker -> name(),
            'email' => $this -> faker -> unique() -> safeEmail(),
            'password' => bcrypt(123456789)
        ];
    }
}
