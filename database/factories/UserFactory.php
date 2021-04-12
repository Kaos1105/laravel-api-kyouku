<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Users::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = ['A', 'B'];

        return [
            'id'            => $this->faker->uuid,
            'email'         => $this->faker->unique()->safeEmail,
            'security_code' => strtoupper(Str::random(8)),
            'video_type'    => $type[array_rand($type)],
            'token_key'     => Str::random(8),
            'order'         => $this->faker->randomDigit
        ];
    }
}
