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
            @if ($assignButton === true)

              <a href="{{ route('assign-users.index', ['eventId' => $eventId]) }}"
                class="btn bg-gradient-dark btn-sm mb-0" type="button">-&nbsp; Attribuer</a>
            @endif
          @endif
        </div>
      </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2" wire:ignore>
      <table class="table align-items-center mb-0 responsive" id="users-table">
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
              @if ($action === true)
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                  Rôle
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                  Actions
                </th>
              @endif
              @if ($assign === true)
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                  Assigner
                </th>

              @endif
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
                  @if ($action === true)
                    <td class="text-md-center" data-label="Role" style="cursor: pointer"
                      wire:click='selectEvent({{ $user->id }})'>
                      <p class="text-xs font-weight-bold mb-0 ps-3">{{ $user->role }}</p>
                    </td>
                    <td class="text-md-center">
                      <a href="{{ route('users.show', [$user->id]) }}" class="mx-3"
                        data-bs-toggle="tooltip" data-bs-original-title="Editer l'utilisateur">
                        <i class="fas fa-user-edit text-secondary"></i>
                      </a>
                      <span>
                        <i class="cursor-pointer fas fa-trash text-secondary" data-bs-toggle="tooltip"
                          data-bs-original-title="Supprimer l'utilisateur"
                          onclick="confirm('Supprimer l\'utilisateur : {{ $user->name }} ?') || event.stopImmediatePropagation()"
                          wire:click="deleteUser({{ $user->id }})"></i>
                      </span>
                    </td>
                  @endif
                  @if ($assign === true)
                    <td class="text-md-center" data-label="Assigner" style="cursor: pointer">
                      <div class="form-check form-switch d-flex justify-content-end">
                        @if (in_array($user->id, $usersIdsByEvent))
                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                            name="{{ $user->id }}" checked>
                        @else
                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                            name="{{ $user->id }}">
                        @endif
                      </div>
                    </td>
                  @endif
                @endif
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script>
  const dataTableSearchUsers = new simpleDatatables.DataTable("#users-table", {
    searchable: true,
    fixedHeight: true,
    perPage: 10,
    labels: {
      placeholder: "Rechercher...",
      perPage: "{select} utilisateurs par page",
      noRows: "Aucun utilisateur trouvée",
      info: "Affichage de {start} à {end} des {rows} utilisateurs",
    }
  });
</script>
