<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class ShowUsers extends Component
{
  public $user;
  public $userId;

  public $showSuccesNotification  = false;

  protected $rules = [
    'user.name' => 'required|max:40|min:3',
    'user.email' => 'required',
    'user.phone' => 'max:12',
    'user.about' => 'max:200',
    'user.location' => 'min:1'
  ];

  public function mount($userId)
  {
    $this->user = User::where('id', $userId)->first();
  }

  public function save()
  {
    $this->validate();
    $this->user->save();

    $this->showSuccesNotification = true;
  }
  public function render()
  {
    return view('livewire.users.show-users');
  }
}
