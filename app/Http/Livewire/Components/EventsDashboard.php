<?php

namespace App\Http\Livewire\Components;

use App\Models\Event;
use Livewire\Component;

class EventsDashboard extends Component
{
  public $events;
  public function render()
  {
    return view('livewire.components.events-dashboard');
  }
}
