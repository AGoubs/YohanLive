<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  use HasFactory;

  public static function getContactsByEvent($eventId)
  {
    return Contact::where('event_id', $eventId)->get();
  }
}
