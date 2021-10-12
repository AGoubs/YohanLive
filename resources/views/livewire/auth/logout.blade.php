<div x-data="{open: false}">
  <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
    aria-expanded="false" x-on:click="open = ! open" @click.away="open = false" x-transition>
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
      {{-- <i class="fa fa-chevron-down ms-1"></i> --}}
    </span>
  </a>
  <ul class="dropdown-menu  dropdown-menu-end  px-3 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
    <li>
      <a class="dropdown-item border-radius-md" href="{{ route('mes-informations') }}">
        <div class="d-flex justify-content-between">
          <h6 class="text-sm font-weight-normal mb-0">
            Modifier mon compte
          </h6>
          <i class="fa fa-user align-self-center ms-4"></i>
        </div>
      </a>
    </li>
    <hr class="horizontal dark my-2">
    <li>
      <a class="dropdown-item border-radius-md" href="javascript:;">
        <div class="d-flex justify-content-between">

          <h6 class="text-sm font-weight-normal mb-0">
            Ajouter un compte
          </h6>
          <i class="fa fa-user-plus align-self-center ms-4"></i>
        </div>
      </a>
    </li>
    <hr class="horizontal dark my-2">
    <li>
      <a class="dropdown-item border-radius-md" wire:click="logout">
        <div class="d-flex justify-content-between">
          <h6 class="text-sm font-weight-normal mb-0">
            Se déconnecter
          </h6>
          <i class="fa fa-sign-out-alt align-self-center"></i>
        </div>
      </a>
</div>
