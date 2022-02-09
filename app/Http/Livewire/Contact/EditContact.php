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

  public function render()
  {
    $this->event = Event::getEventById($this->eventId);

    return view('livewire.contact.edit-contact');
  }

  public function mount()
  {
    $this->contact = Contact::getContactById($this->contactId);
  }

  public function submit()
  {
    $this->validate();
    $this->contact->save();

    if (auth()->user()->isAdmin()) {
      return redirect()->route('events.show', [$this->eventId]);
    } else {
      return redirect()->route('events.contact', [$this->eventId]);
    }
  }
}
