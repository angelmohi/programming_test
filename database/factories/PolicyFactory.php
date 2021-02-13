<?php

namespace Database\Factories;

use App\Models\Policy;
use Illuminate\Database\Eloquent\Factories\Factory;

class PolicyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Policy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->ean8,
            'plan_reference' => $this->faker->address,
            'first_name' => $this->faker->firstname,
            'last_name' => $this->faker->lastname,
            'investment_house' => $this->faker->company,
        ];
    }
}
