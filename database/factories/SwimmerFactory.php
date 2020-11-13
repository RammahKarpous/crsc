<?php

namespace Database\Factories;

use App\Models\Swimmer;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SwimmerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Swimmer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'slug' => Str::slug($this->faker->name),
            'gender' => 'female',
            'dob' => '1995/09/23',
            'status' => 'active',
        ];
    }
}