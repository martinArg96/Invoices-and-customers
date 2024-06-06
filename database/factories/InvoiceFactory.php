<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['B', 'P', 'V']);
        return [
            //
            "customer_id" => Customer::factory(),
            "amount" => $this->faker->numberBetween(100, 1000),
            "status" => $status,
            "billed_dated" => $status === 'B' ? $this->faker->dateTimeBetween('-1 year', 'now') : null,
            "paid_dated" => $status === 'P' ? $this->faker->dateTimeBetween('-1 year', 'now') : null,
            
        ];
    }
}
