<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Organisation;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Admin\Country;

class OrganisationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Organisation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $country = Country::first();
        if (!$country) {
            $country = Country::factory()->create();
        }

        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 100)),
            'email' => $this->faker->email,
            'slug' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'phone' => $this->faker->numerify('0##########'),
            'website' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'physical_address' => $this->faker->address,
            'description' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'country_id' => $this->faker->word,
            'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
