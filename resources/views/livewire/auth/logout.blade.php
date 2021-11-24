<div x-data="{open: false}">
  <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
    aria-expanded="false" x-on:click="open = ! open" @click.away="open = false">
    <i
      class="fa fa-user me-sm-1 {{ in_array(
          request()->route()->getName(),
          ['profile', 'my-profile'],
      )
          ? 'text-white'
          : '' }}"></i>
    <span
      class="d-sm-inline d-none {{ in_array(
          request()->route()->getName(),
          ['profile', 'my-profile'],
      )
          ? 'text-white'
          : '' }}">Bienvenue
      {{ $user }}
      <span x-html="open ?  `<i class='fa fa-chevron-up ms-1'></i>` : `<i class='fa fa-chevron-down ms-1'></i>`"></span>
    </span>
  </a>
  <ul class="dropdown-menu  dropdown-menu-end  p-2 me-sm-n4" aria-labelledby="dropdownMenuButton">
    <li>
      <a class="dropdown-item border-radius-md" href="{{ route('users.profile') }}">
        <div class="d-flex justify-content-between">
          <h6 class="text-sm font-weight-normal mb-0 p-1">
            Modifier mon compte
          </h6>
          <i class="fa fa-user align-self-center ms-4"></i>
        </div>
      </a>
    </li>
    <li>
    <li>
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
      @if (auth()->user()->isAdmin())
        <hr class="horizontal dark my-2">
    <li>
      <a class="dropdown-item border-radius-md" href="{{ route('users.create') }}">
        <div class="d-flex justify-content-between">

          <h6 class="text-sm font-weight-normal mb-0 p-1">
            Ajouter un compte
          </h6>
          <i class="fa fa-user-plus align-self-center ms-4"></i>
        </div>
      </a>
    </li>
    <li>
      <a class="dropdown-item border-radius-md" href="{{ route('users.index') }}">
        <div class="d-flex justify-content-between">

          <h6 class="text-sm font-weight-normal mb-0 p-1">
            Liste des utilisateurs
          </h6>
          <i class="fa fa-users align-self-center ms-4"></i>
        </div>
      </a>
    </li>
    @endif

    <hr class="horizontal dark my-2">
    <a class="dropdown-item border-radius-md" wire:click="logout">
      <div class="d-flex justify-content-between">
        <h6 class="text-sm font-weight-normal mb-0 p-1">
          Se déconnecter
        </h6>
        <i class="fa fa-sign-out-alt align-self-center"></i>
      </div>
    </a>
</div>
