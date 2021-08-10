<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Host;
use Livewire\Component;

class ShowEvent extends Component
{
    public $event;
    public ?int $eventId;
    public $hosts;
    public $tableField;
    public $typeEvenement;

    public function render()
    {
        $this->typeEvenement = $this->event->type_event;

        return view('livewire.show-event');
    }

    public function mount()
    {
        if (isset($this->eventId)) {
            $this->event = Event::find($this->eventId);
        } else {
            $this->event = Event::where('Date', date("Y-m-d"))->first();
            $this->eventId = $this->event->id;
            if (!isset($this->event)) {
                session()->flash('info',  "Pas d'évènement aujourd'hui");
                return redirect()->route('évènements');
            }
        }
    }
}
