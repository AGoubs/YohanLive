  <ul class="dropdown-menu  dropdown-menu-end p-2" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item border-radius-md" href="{{ route('users.change-password') }}">
      <div class="d-flex justify-content-between">

        <h6 class="text-sm font-weight-normal mb-0 p-1">
          Changer mon mot de passe
        </h6>
        <i class="fa fa-lock align-self-center ms-4"></i>
      </div>
    </a>
    </li>
    <li>
      <hr class="horizontal dark my-2">
      <a class="dropdown-item border-radius-md" wire:click="logout">
        <div class="d-flex justify-content-between">
          <h6 class="text-sm font-weight-normal mb-0 p-1">
            Se déconnecter
          </h6>
          <i class="fa fa-sign-out-alt align-self-center"></i>
        </div>
      </a>
  </ul>
