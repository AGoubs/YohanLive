<div>
  <div class="card mb-2">
    <div class="card-header pb-0">
      <div class="d-flex flex-row justify-content-between">
        <div>
          <h5 class="mb-0">Utilisateurs</h5>
        </div>
        <div>
          @if (auth()->user()->isAdmin())
            <a href="{{ route('users.create') }}" class="btn bg-gradient-dark btn-sm mb-0" type="button">+&nbsp;
              Ajouter</a>
            <a href="{{ route('assign-users.index', ['eventId' => $eventId]) }}" class="btn bg-gradient-dark btn-sm mb-0"
              type="button">-&nbsp; Attribuer</a>
          @endif
        </div>
      </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2" wire:ignore>
      <table class="table align-items-center mb-0 responsive">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
              Nom
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
              Email
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
              Téléphone
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
              Localisation
            </th>
            @if (auth()->user()->isAdmin())
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Actions
              </th>
            @endif
          </tr>
        </thead>
        <tbody>
          @if ($users != [])

            @foreach ($users as $user)
              <tr class="px-3">
                <td class="text-md-left" data-label="Nom" style="cursor: pointer"
                  wire:click='selectEvent({{ $user->id }})'>
                  <p class="text-xs font-weight-bold mb-0 ps-3">{{ $user->name }}</p>
                </td>
                <td class="text-md-center" data-label="Email" style="cursor: pointer"
                  wire:click='selectEvent({{ $user->id }})'>
                  <p class="text-xs font-weight-bold mb-0 ps-3">{{ $user->email }}</p>
                </td>
                <td class="text-md-center" data-label="Téléphone" style="cursor: pointer"
                  wire:click='selectEvent({{ $user->id }})'>
                  <p class="text-xs font-weight-bold mb-0 ps-3">{{ $user->phone }}</p>
                </td>
                <td class="text-md-center" data-label="Localisation" style="cursor: pointer"
                  wire:click='selectEvent({{ $user->id }})'>
                  <p class="text-xs font-weight-bold mb-0 ps-3">{{ $user->location }}</p>
                </td>
                @if (auth()->user()->isAdmin())
                 
                @endif
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
