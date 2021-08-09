<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\TypeEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeEventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TypeEvent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_event' =>  $this->faker->word(),
            'fields' => $this->faker->word(),
        ];
    }
}
