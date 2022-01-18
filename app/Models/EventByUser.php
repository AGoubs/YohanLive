<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventByUser extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'event_id',
  ];

  public static function eventByUserExist($userId, $eventId)
  {
    return EventByUser::where('user_id', $userId)->where('event_id', $eventId)->exists();
  }

  public static function createEventByUser($userId, $eventId)
  {
    EventByUser::create([
      'user_id' => $userId,
      'event_id' => $eventId
    ]);
  }

  public static function deleteEventByUser($userId, $eventId)
  {
    EventByUser::where('event_id', $eventId)->where('user_id', $userId)->delete();
  }
}
