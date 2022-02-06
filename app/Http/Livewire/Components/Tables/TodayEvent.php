<?php

namespace App\Http\Livewire\Components\Tables;

use Livewire\Component;

class TodayEvent extends Component
{
  public $todayEvent;

  public function render()
  {
    return view('livewire.components.tables.today-event');
  }
  public function showEvent($eventId)
  {
    return redirect()->route('events.show', [$eventId]);
  }
}
