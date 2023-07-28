<?php

namespace Database\Factories\Admin;

use App\Models\Admin\InformationRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Admin\User;

class InformationRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InformationRequest::class;

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
            'description' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'reason' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
