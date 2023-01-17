<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('contacts', function (Blueprint $table) {
      $table->id();
      $table->string('event_id')->constrained()->onDelete('cascade');
      $table->string('user_id')->constrained()->onDelete('cascade');
      $table->string('name');
      $table->string('firstname');
      $table->string('phone')->nullable();
      $table->string('email')->nullable();
      $table->string('activity')->nullable();
      $table->string('company')->nullable();
      $table->string('country')->nullable();
      $table->string('city')->nullable();
      $table->string('address')->nullable();
      $table->string('postal')->nullable();
      $table->string('siret')->nullable();
      $table->string('date_appointment')->nullable();
      $table->string('user_appointment')->nullable();
      $table->text('comment')->nullable();
      $table->string('unique_id')->nullable();
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
    Schema::dropIfExists('contacts');
  }
}
