<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\TypeEvent;
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
      'Nom' => $this->faker->company,
      'Date' => $this->faker->dateTimeThisMonth(),
      'HeureArrive' => $this->faker->time(),
      'HeureEvenement' => $this->faker->time(),
      'HeureFinEvenement' => $this->faker->time(),
      'type_event' => TypeEvent::all()->random()->type_event,
    ];
  }
}
