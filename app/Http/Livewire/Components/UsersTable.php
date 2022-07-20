<?php

namespace App\Http\Livewire\Components;

use App\Mail\sendQrCode;
use App\Models\EventByUser;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
class UsersTable extends Component
{
  public $users;
  public $eventId;
  public $action = false;
  public $assign = false;
  public $assignButton = false;
  public $usersIdsByEvent;

  public function render()
  {
    return view('livewire.components.users-table');
  }

  public function mount()
  {
  }

  public function deleteUser($id)
  {
    EventByUser::where('user_id', $id)->delete();
    User::find($id)->delete();
    return redirect()->route('users.index');
  }

  public function generateQrCode($userId, $email)
  {
    Mail::to($email)->send(new sendQrCode('malfoo@gmail.com', 'Voici votre QR Code', $userId));

    session()->flash('success', 'Email envoyé avec succès');
    return redirect()->route('users.index');
  }

  public function selectEvent($userId)
  {
    return redirect()->route('users-events.index', ['userId' => $userId]);
  }
}
