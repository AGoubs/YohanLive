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
      $table->string('nom');
      $table->string('prenom');
      $table->string('fonction')->nullable();
      $table->string('telephone')->nullable();
      $table->string('numero_ipad')->nullable();
      $table->string('lieu')->nullable();
      $table->string('point')->nullable();
      $table->string('porte')->nullable();
      $table->text('commentaire')->nullable();
      $table->foreignId('event_id')->constrained();
      $table->boolean('is_arrived')->nullable()->default(0);
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
