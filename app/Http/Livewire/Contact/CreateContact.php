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
    'contact.user_id' => '',
  ];

  protected $messages = [
    'contact.name.required' => 'Le champs Nom est obligatoire',
    'contact.firstname.required' => 'Le champs Prénom est obligatoire',
  ];

  public function render()
  {
    return view('livewire.contact.create-contact');
  }

  public function mount()
  {
    $this->contact = new Contact();
    $this->event = Event::find($this->eventId);
  }

  public function submit()
  {
    $this->validate();
    $this->contact->event_id = $this->eventId;
    $this->contact->user_id = auth()->id();
    $this->contact->save();

    if (auth()->user()->isAdmin()) {
      return redirect()->route('events.show', [$this->eventId]);
    } else {
      return redirect()->route('events.contact', [$this->eventId]);
    }
  }
}
