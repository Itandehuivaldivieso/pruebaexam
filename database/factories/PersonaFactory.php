<?php

namespace Database\Factories;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Persona::class;
    public function definition()
    {
        return [
            //
            'nombre' => $this->faker->nombre,
            'edad' => $this->faker->edad,
            'domicilio' => $this->faker->domicilio
        ];
        
    }
}
