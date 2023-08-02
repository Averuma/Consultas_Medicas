<?php

namespace Database\Factories;

use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medico>
 */
class MedicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'especialidade' => $this->faker->randomElement(['Cardiologista', 'Dermatologista', 'Pediatra', 'Oftalmologista', 'Geriatra', 'Pneumologista', 'Neurologista']),
            'cidade_id' => function () {
                return \App\Models\Cidade::factory()->create()->id;
            },
        ];
    }
}