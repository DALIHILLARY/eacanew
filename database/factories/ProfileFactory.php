<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Admin\User;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create();
        }

        return [
            'user_id' => $this->faker->word,
            'designation' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'phone_number' => $this->faker->numerify('0##########'),
            'date_joined' => $this->faker->date('Y-m-d H:i:s'),
            'date_of_birth' => $this->faker->date('Y-m-d H:i:s'),
            'passport_number' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'date_joined_organisation' => $this->faker->date('Y-m-d H:i:s'),
            'area_of_expertise' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'area_of_training_of_trainer' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
