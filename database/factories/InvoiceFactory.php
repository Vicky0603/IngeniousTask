<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Infrastructure\Models\Invoice;
use App\Infrastructure\Models\Company;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition()
    {
        $company = Company::factory()->create();

        return [
            'id' => Str::uuid(36),
            'number' => Str::uuid(36),
            'date' => fake()->dateTime->format('Y-m-d'),
            'due_date' => fake()->dateTime->format('Y-m-d'),
            'company_id' => $company->id,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
