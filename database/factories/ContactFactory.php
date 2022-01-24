<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Contact::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'name' => $this->faker->lastName(),
      'firstname' => $this->faker->firstName(),
      'phone' => $this->faker->phoneNumber,
      'email' => $this->faker->email,
      'comment' => $this->faker->word(2),
      'model' => $this->faker->word(),
      'event_id' => Event::all()->random()->id,
    ];
  }
}
