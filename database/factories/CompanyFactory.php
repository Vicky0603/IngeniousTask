<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Infrastructure\Models\Company;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
    {
        return [
            'id' => Str::uuid(36),
            'name' => fake()->name(),
            'street' => fake()->streetName(),
            'city' => fake()->city(),
            'zip' => fake()->postcode(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
