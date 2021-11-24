<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{
  public $user;
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
    $this->user->save();
    $this->showSuccesNotification = true;

    return redirect()->route('users-events.index', ['userId' => $this->user->id]);
  }
  public function render()
  {
    return view('livewire.users.create-user');
  }
}
