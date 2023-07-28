<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Finding;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Admin\User;

class FindingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Finding::class;

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
            'title' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'content' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'user_id' => $this->faker->word,
            'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
