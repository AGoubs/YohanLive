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
