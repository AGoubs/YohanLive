<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use App\Models\Event;
use Illuminate\Http\Request;
use Livewire\Component;

class CreateContact extends Component
{
  public $contact;
  public $eventId;
  public $event;
  public $uniqueId;

  protected $rules = [
    'contact.user_id' => '',
    'contact.name' => 'required',
    'contact.firstname' => '',
    'contact.phone' => 'required',
    'contact.email' => 'required',
    'contact.activity' => '',
    'contact.company' => '',
    'contact.country' => '',
    'contact.city' => '',
    'contact.address' => '',
    'contact.postal' => '',
    'contact.siret' => '',
    'contact.date_appointment' => '',
    'contact.user_appointment' => '',
    'contact.comment' => '',
  ];

  protected $messages = [
    'contact.name.required' => 'Le Nom est obligatoire',
    'contact.phone.required' => 'Le Téléphone est obligatoire',
    'contact.email.required' => 'L\'Email est obligatoire',
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
    $this->contact->name = trim($this->contact->name);
    $this->contact->firstname = trim($this->contact->firstname);
    $this->contact->phone = trim($this->contact->phone);
    $this->contact->email = trim($this->contact->email);
    $this->contact->activity = trim($this->contact->activity);
    $this->contact->company = trim($this->contact->company);
    $this->contact->country = trim($this->contact->country);
    $this->contact->city = trim($this->contact->city);
    $this->contact->address = trim($this->contact->address);
    $this->contact->postal = trim($this->contact->postal);
    $this->contact->siret = trim($this->contact->siret);
    $this->contact->date_appointment = trim($this->contact->date_appointment);
    $this->contact->user_appointment = trim($this->contact->user_appointment);
    $this->contact->comment = trim($this->contact->comment);
    if ($this->uniqueId) {
      $this->contact->unique_id = $this->uniqueId;
    }

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
