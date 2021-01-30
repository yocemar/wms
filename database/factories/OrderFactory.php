<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        
            'user_id' => $this->faker->numberBetween(1,20),
            'customer_id' => $this->faker->numberBetween(1,20),
            'number' => $this->faker->numberBetween(1,999),
            'shipment' => $this->faker->city(),
            'type' => $this->faker->randomDigit(),
            'payment' => $this->faker->randomDigit(),
            'value' => $this->faker->randomDigit(),
            'invoice' => $this->faker->randomDigit(),
            'date' => $this->faker->date('Y-m-d'),

        ];
    }
}
