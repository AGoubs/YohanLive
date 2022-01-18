<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $guarded = [];

  public static function getEventById($eventId)
  {
    return Event::where('id', $eventId)->first();
  }
}
