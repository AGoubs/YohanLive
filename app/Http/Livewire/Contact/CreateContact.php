<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use App\Models\Event;
use Livewire\Component;

class CreateContact extends Component
{
  public $contact;
  public $eventId;
  public $event;

  protected $rules = [
    'contact.name' => 'required',
    'contact.firstname' => 'required',
    'contact.phone' => '',
    'contact.email' => '',
    'contact.comment' => '',
    'contact.model' => '',
  ];

  protected $messages = [
    'contact.name.required' => 'Le champs Nom est obligatoire',
    'contact.firstname.required' => 'Le champs Prénom est obligatoire',
  ];

  public function render()
  {
    $this->event = Event::find($this->eventId);
    return view('livewire.contact.create-contact');
  }

  public function mount()
  {
    $this->contact = new Contact();
  }

  public function submit()
  {
    $this->validate();
    $this->contact->event_id = $this->eventId;
    $this->contact->save();

    return redirect()->route('events.contact', [$this->eventId]);
  }
}
