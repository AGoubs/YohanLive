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
    $this->contact->model = trim($this->contact->model);
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
