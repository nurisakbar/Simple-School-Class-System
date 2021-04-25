<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id'        =>  'ST'.rand(100, 900),
            'name'              =>  $this->faker->name(),
            'email'             =>  $this->faker->unique()->safeEmail(),
            'student_class_id'  =>  rand(1, 9),
            'address'           => $this->faker->address,
            'password'          =>  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }
}
