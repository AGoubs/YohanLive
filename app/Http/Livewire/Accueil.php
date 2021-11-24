<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Accueil extends Component
{
  public $user;
  public $events;
  public $todayEvent;
  public $users;

  public function render()
  {
    $this->user = Auth::user();
    $this->user = ucfirst($this->user->name);

    $this->events = Event::latest()->take(5)->get();
    $this->todayEvent = Event::where('Date', date("Y-m-d"))->first();

    $this->users = User::all();


    return view('livewire.accueil');
  }
  
  public function showEvent($eventId)
  {
    return redirect()->route('events.show', [$eventId]);
  }
}
