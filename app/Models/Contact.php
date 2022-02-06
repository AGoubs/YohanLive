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

  public static function getContactsByEventAndDate($eventId, $date)
  {
    return Contact::where('event_id', $eventId)->whereDate('created_at', '=', $date)->get();
  }


  public static function getContactById($id)
  {
    return Contact::where('id', $id)->first();
  }
}
