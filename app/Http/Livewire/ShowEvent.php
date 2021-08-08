<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class ShowEvent extends Component
{
    public $event;
    public function render()
    {
        $todayDate = date("Y-m-d");
        $this->event = Event::where('Date', $todayDate)->first();
        return view('livewire.show-event');
    }
}
