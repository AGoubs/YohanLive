<?php

namespace App\Http\Livewire;

use App\Models\Event;
use DateTime;
use Livewire\Component;

class TodayEvent extends Component
{
  public $event;
  public function render()
  {
    $todayDate = date("Y-m-d");
    $this->event = Event::where('Date', $todayDate)->first();

    return view('livewire.today-event');
  }
}
