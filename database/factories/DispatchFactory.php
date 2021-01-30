<?php

namespace Database\Factories;

use App\Models\Dispatch;
use Illuminate\Database\Eloquent\Factories\Factory;

class DispatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dispatch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'invoice' => $this->faker->numberBetween(1,999),
            'item' => $this->faker->numberBetween(1,999),
            'built' => $this->faker->numberBetween(1,20),
            'user_id' => $this->faker->numberBetween(1,20),
            'description' => $this->faker->sentence(6,true),
            'out' => $this->faker->numberBetween(1,3),
        ];
    }
}
