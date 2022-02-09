<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{
  public $user;
  public $eventId;
  public $showSuccesNotification  = false;

  protected $rules = [
    'user.name' => 'required|min:1',
    'user.email' => 'required|unique:users,email',
    'user.password' => 'required',
    'user.phone' => 'max:12',
    'user.about' => 'max:200',
    'user.location' => 'min:1',
  ];

  public function mount()
  {
    $this->user = new User();
  }

  public function save()
  {
    $this->validate();
    $this->user->password = Hash::make($this->user->password);
    $this->user->role = 'host';
    $this->user->save();
    // $this->showSuccesNotification = true;

    if ($this->eventId) {
      return redirect()->route('assign-users.index', ['eventId' => $this->eventId]);
    } else {
      return redirect()->route('users.index');
    }
  }
  public function render()
  {
    return view('livewire.users.create-user');
  }
}
