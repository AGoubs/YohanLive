<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Host;
use Illuminate\Database\Eloquent\Factories\Factory;

class HostFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Host::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'Nom' => $this->faker->lastName(),
      'Prenom' => $this->faker->firstName(),
      'Fonction' => $this->faker->company,
      'Telephone' => $this->faker->phoneNumber,
      // 'Numero_ipad' => $this->faker->numberBetween(1, 50),
      // 'Lieu' => $this->faker->city,
      // 'Point' => $this->faker->numberBetween(1, 50),
      // 'Porte' => $this->faker->numberBetween(1, 50),
      'Numero_ipad' => null,
      'Lieu' => null,
      'Point' => null,
      'Porte' => null,
      'Commentaire' => $this->faker->paragraph(1),
      'event_id' => Event::all()->random()->id,
      'is_arrived' => '0',
      'time_arrived' => null,
    ];
  }
}
