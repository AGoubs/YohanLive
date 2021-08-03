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
      $table->string('Fonction')->nullable();
      $table->string('Telephone')->nullable();
      $table->string('Numero_ipad')->nullable();
      $table->string('Lieu')->nullable();
      $table->string('Point')->nullable();
      $table->string('Porte')->nullable();
      $table->text('Commentaire')->nullable();
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
