<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'age_range' => 'Senior',
            'gender' => 'female',
            'distance' => '200',
            'stroke' => 'Arm Stroke',
            'round' => '21'
        ];
    }
}