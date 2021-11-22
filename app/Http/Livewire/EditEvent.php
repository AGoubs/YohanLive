<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class EditEvent extends Component
{
  public $event;
  public $Nom = '';
  public $Date = '';
  public $HeureArrive = '';
  public $HeureEvenement = '';
  public $HeureFinEvenement = '';
  public $type_event = '';

  protected $rules = [
    'Nom' => 'required',
    'Date' => 'required',
    'HeureArrive' => 'required',
    'HeureEvenement' => 'required',
    'HeureFinEvenement' => 'required',
    'type_event' => 'required',
  ];

  public function render()
  {
    return view('livewire.edit-event');
  }

  public function mount($eventId)
  {
    $this->event = Event::find($eventId);
    $this->Nom = $this->event->Nom;
    $this->Date = $this->event->Date;
    $this->HeureEvenement = date('H:i', strtotime($this->event->HeureEvenement));
    $this->HeureFinEvenement = date('H:i', strtotime($this->event->HeureFinEvenement));
    $this->HeureArrive = date('H:i', strtotime($this->event->HeureArrive));
    $this->type_event = $this->event->type_event;
  }

  public function updateEvent()
  {
    $this->validate();
    $this->event->Nom = $this->Nom;
    $this->event->Date = $this->Date;
    $this->event->HeureEvenement = $this->HeureEvenement;
    $this->event->HeureFinEvenement = $this->HeureFinEvenement;
    $this->event->HeureArrive = $this->HeureArrive;
    $this->event->type_event = $this->type_event;
    $this->event->save();
    // session()->flash('info',  "Evènement modifié avec succès");
    // return redirect()->route('events.show', $this->event->id);
    return redirect()->route('hosts.add', $this->event->id);
  }
}
