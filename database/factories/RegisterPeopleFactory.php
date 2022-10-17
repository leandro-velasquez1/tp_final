<?php

namespace Database\Factories;

use App\Models\RegisterPeople;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RegisterPeopleFactory extends Factory
{

    protected $model = RegisterPeople::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'phone_number' => fake()->unique()->phoneNumber(),
            'address' => fake()->address()
        ];
    }
}
