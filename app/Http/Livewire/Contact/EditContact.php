<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use App\Models\Event;
use Livewire\Component;

class EditContact extends Component
{
  public $contact;
  public $event;
  public $contactId;
  public $eventId;

  protected $rules = [
    'contact.name' => 'required',
    'contact.firstname' => 'required',
    'contact.phone' => 'required',
    'contact.email' => 'required',
    'contact.activity' => '',
    'contact.company' => '',
    'contact.country' => '',
    'contact.city' => '',
    'contact.address' => '',
    'contact.postal' => '',
    'contact.date_appointment' => '',
    'contact.user_appointment' => '',
    'contact.comment' => '',
  ];
  protected $messages = [
    'contact.name.required' => 'Le champs Nom est obligatoire',
    'contact.firstname.required' => 'Le champs Prénom est obligatoire',
    'contact.phone.required' => 'Le champs Téléphone est obligatoire',
    'contact.email.required' => 'Le champs Email est obligatoire',
  ];
  public function render()
  {

    return view('livewire.contact.edit-contact');
  }

  public function mount()
  {
    $this->event = Event::getEventById($this->eventId);
    $this->contact = Contact::getContactById($this->contactId);
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
    $this->contact->date_appointment = trim($this->contact->date_appointment);
    $this->contact->user_appointment = trim($this->contact->user_appointment);
    $this->contact->comment = trim($this->contact->comment);

    $this->validate();
    $this->contact->save();

    if (auth()->user()->isAdmin()) {
      return redirect()->route('events.show', [$this->eventId]);
    } else {
      return redirect()->route('events.contact', [$this->eventId]);
    }
  }
}
