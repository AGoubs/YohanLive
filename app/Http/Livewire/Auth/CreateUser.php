<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{
  public $user;
  public $showSuccesNotification  = false;

  protected $rules = [
    'user.name' => 'required|min:1',
    'user.email' => 'required',
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

    return redirect('/accueil');
  }
  public function render()
  {
    return view('livewire.auth.create-user');
  }
}
