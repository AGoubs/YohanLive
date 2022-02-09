<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class HostFixedPlugin extends Component
{
  public $eventId;

  public function render()
  {
    return view('livewire.components.host-fixed-plugin');
  }

  public function mount()
  {
  }
}
