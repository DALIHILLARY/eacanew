<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Country;
use Illuminate\Database\Eloquent\Factories\Factory;


class CountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'code' => $this->faker->text($this->faker->numberBetween(5, 5)),
            'name' => $this->faker->text($this->faker->numberBetween(5, 100)),
            'description' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
