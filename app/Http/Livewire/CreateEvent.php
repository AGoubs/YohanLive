<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class CreateEvent extends Component
{
  public $Nom = '';
  public $Date = '';
  public $DateFin = '';

  protected $rules = [
    'Nom' => 'required',
    'Date' => 'required|before_or_equal:DateFin',
    'DateFin' => '',
  ];

  public function render()
  {
    return view('livewire.create-event');
  }

  public function createEvent()
  {
    if (!$this->DateFin) {
      $this->DateFin = $this->Date;
    }
    $this->validate();
    $event = Event::create([
      'Nom' => $this->Nom,
      'Date' => $this->Date,
      'DateFin' => $this->DateFin,
    ]);

    return redirect()->route('events.customization', ['eventId' => $event->id]);
  }
}
