<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('hosts', function (Blueprint $table) {
      $table->id();
      $table->string('Nom');
      $table->string('Prenom');
      $table->string('Fonction');
      $table->string('Telephone');
      $table->string('Numero_ipad');
      $table->string('Lieu');
      $table->string('Point');
      $table->string('Porte');
      $table->text('Commentaire');
      $table->foreignId('event_id')->constrained()->cascadeOnDelete();
      $table->boolean('isArrived');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('hosts');
  }
}
