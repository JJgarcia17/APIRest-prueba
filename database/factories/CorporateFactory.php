<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Corporate;
use Illuminate\Database\Eloquent\Factories\Factory;

class CorporateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Corporate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->company();
        return [
            'user_id' => User::all()->random()->id,
            'S_nombre_corto' => $name,
            'S_nombre_completo' => $name,
            'S_logo_url' => $this->faker->imageUrl(400, 400),
            'S_db_name' => $name,
            'S_db_usuario' =>$this->faker->userName(),
            'S_db_password'=> $this->faker->password(),
            'S_system_url' => $this->faker->url(),
            'S_activo'=> $this->faker->boolean(),
            'D_fecha_incorporacion' => $this->faker->dateTime(),
        ];
    }
}
