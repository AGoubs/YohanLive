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


  public static function getTodayEventByUser($userId)
  {
    $event_by_user = EventByUser::where('user_id', $userId)->get();

    foreach ($event_by_user as $event) {
      if (self::isBetweenDates(self::getEventById($event->event_id))) {
        return self::getEventById($event->event_id);
      }
    }
    return false;
  }


  public static function isBetweenDates($event)
  {
    $dateBetween = self::getBetweenDates($event->Date, $event->DateFin);
    if (in_array(date('Y-m-d'), $dateBetween)) {
      return $event;
    }
    return false;
  }

  /** 
   * Permet de retrouver les dates entres deux valeurs
   *
   * @return response()
   */
  public static function getBetweenDates($startDate, $endDate)
  {
    $rangArray = [];

    $startDate = strtotime($startDate);
    $endDate = strtotime($endDate);

    for (
      $currentDate = $startDate;
      $currentDate <= $endDate;
      $currentDate += (86400)
    ) {

      $date = date('Y-m-d', $currentDate);
      $rangArray[] = $date;
    }

    return $rangArray;
  }
}
