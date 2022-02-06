<div>
  <div class="card mb-2">
    <div class="card-header pb-0">
      <div class="d-flex flex-row justify-content-between">
        <div>
          <h5 class="mb-0">Hôtes(ses) sur cet évènement</h5>
        </div>
        <div>
          @if (auth()->user()->isAdmin())

            <a href="{{ route('assign-users.index', ['eventId' => $eventId]) }}" class="btn bg-gradient-dark mb-0" type="button"><i class="fas fa-user-check"></i>&nbsp; Attribuer</a>
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

          </tr>
        </thead>
        <tbody>
          @if ($users != [])
            @foreach ($users as $user)
              <tr class="px-3">
                <td class="text-md-left" data-label="Nom">
                  <p class="text-xs font-weight-bold mb-0 ps-3">{{ $user->name }}</p>
                </td>
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
