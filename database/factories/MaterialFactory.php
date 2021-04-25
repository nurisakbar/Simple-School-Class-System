<?php

namespace Database\Factories;

use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Material::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'             => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'description'       => $this->faker->text($maxNbChars = 600),
            'file'              =>  'file.pdf',
            'schdule_id'        => rand(1, 10),
        ];
    }
}
