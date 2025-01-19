<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;

class Fields extends Component
{
  public $eventId;
  public $newFieldId;
  public $newFieldName;
  public $newFieldType = "text";
  public $newFieldRequired = false;

  public $message = "";

  public $fields = [
    [
      'id' => '1',
      'name' => 'Nom',
      'type' => 'text',
      'required' => true
    ],
    [
      'id' => '2',
      'name' => 'Prénom',
      'type' => 'text',
      'required' => true
    ],
    [
      'id' => '3',
      'name' => 'Téléphone',
      'type' => 'text',
      'required' => false
    ],
    [
      'id' => '4',
      'name' => 'Email',
      'type' => 'mail',
      'required' => false
    ]
  ];

  public $replacementMap = [
    'text' => 'Champ de texte',
    'mail' => 'Champ d\'email',
    'select' => 'Liste déroulante',
    'checkbox' => 'Case à cocher'
  ];

  public function render()
  {
    return view('livewire.events.fields');
  }

  public function mount()
  {
  }

  public function addField()
  {
    if (!$this->newFieldId) {
      foreach ($this->fields as $key => $field) {
        if ($field['name'] === $this->newFieldName && !$this->newFieldId) {
          $this->message = "Ce champ existe déjà";
          return;
        }
      }

      $newField =
        [
          'id' => $this->getNextId($this->fields),
          'name' => $this->newFieldName,
          'type' => $this->newFieldType,
          'required' => $this->newFieldRequired
        ];


      $this->fields[] = $newField;

      $this->clearFields();
    } else {
      foreach ($this->fields as $field) {
        if ($field['id'] === $this->newFieldId) {
          $newField =
            [
              'id' => $this->newFieldId,
              'name' => $this->newFieldName,
              'type' => $this->newFieldType,
              'required' => $this->newFieldRequired
            ];

          $this->modifyFieldById($this->fields, $this->newFieldId, $newField);
          $this->clearFields();
        }
      }
    }
  }

  public function editField($name)
  {
    foreach ($this->fields as $key => $field) {
      if ($field['name'] === $name) {
        $this->newFieldId = $field['id'];
        $this->newFieldName = $field['name'];
        $this->newFieldType = $field['type'];
        $this->newFieldRequired = $field['required'];
      }
    }
  }

  public function deleteField($name)
  {
    foreach ($this->fields as $key => $field) {
      if ($field['name'] === $name) {
        unset($this->fields[$key]);
        break;
      }
    }
  }

  public function validateFields()
  {
    $event = Event::getEventById($this->eventId);
    $event->fields = $this->fields;
    $event->save();

    return redirect()->route('events.customization', ['eventId' => $this->eventId]);
  }


  //Utility functions
  public function getNextId($array)
  {
    $maxId = 0;

    foreach ($array as $item) {
      $id = intval($item['id']);
      if ($id > $maxId) {
        $maxId = $id;
      }
    }

    return $maxId + 1;
  }

  public function modifyFieldById(&$array, $id, $newData)
  {
    foreach ($array as &$item) {
      if ($item['id'] === $id) {
        $item = array_merge($item, $newData);
        break;
      }
    }
  }

  public function clearFields()
  {
    $this->newFieldId = "";
    $this->newFieldName = "";
    $this->newFieldType = "text";
    $this->newFieldRequired = false;
    $this->message = "";
  }
}
