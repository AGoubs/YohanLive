<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
  use HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $table = 'users';

  protected $guarded = [];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    // 'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function isAdmin()
  {
    return $this->role === 'admin';
  }
  public function isUser()
  {
    return $this->role === 'user';
  }

  public static function getUsersIdsByEvent($eventId)
  {
    $usersIds = EventByUser::where('event_id', $eventId)->pluck('user_id')->toArray();
    return $usersIds;
  }

  public static function getUsersByEvent($eventId)
  {
    $usersIds = EventByUser::where('event_id', $eventId)->pluck('user_id');
    $usersByEvent = User::whereIn('id', $usersIds)->get();
    return $usersByEvent;
  }
}
