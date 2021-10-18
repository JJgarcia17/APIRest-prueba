<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->firstName();
        return [
            'username' => $name,
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('12345'), // password
            'S_nombres'=> $name,
            'S_apellidos' => $this->faker->lastName(),
            'S_foto_perfil_url' => $this->faker->imageUrl(400,400, 'people', true, 'Faker'),
            'S_activo' => $this->faker->boolean(),
            'verifed' => Str::random(50),
            'verification_token' => Str::random(50),
        ];
    }

}
