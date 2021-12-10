<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Host;
use App\Models\TypeEvent;
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

    User::factory()->create([
      'name' => 'Arnaud Goubier',
      'email' => 'arnaud@goubier.fr',
      'password' => Hash::make('Arnaud123'),
      'role' => 'admin'
    ]);


    TypeEvent::factory()->create([
      'type_event' => 'Basique',
      'fields' => 'Nom,Prénom,Fonction,Téléphone,Commentaire'
    ]);
    TypeEvent::factory()->create([
      'type_event' => 'Stade',
      'fields' => 'Nom,Prénom,Fonction,Téléphone,Numéro Ipad,Point,Commentaire'
    ]);
    TypeEvent::factory()->create([
      'type_event' => 'FDL',
      'fields' => 'Nom,Prénom,Fonction,Téléphone,Lieu,Porte,Commentaire'
    ]);


    Event::factory(30)->create();
    Host::factory(100)->create();
  }
}
