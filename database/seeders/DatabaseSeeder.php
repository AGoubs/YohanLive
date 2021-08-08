<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Host;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    User::factory()->create([
      'name' => 'Yohan',
      'email' => 'yohan@britti.fr',
      'password' => Hash::make('Yohan123')
    ]);
    Event::factory(10)->create();
    Host::factory(100)->create();
  }
}
