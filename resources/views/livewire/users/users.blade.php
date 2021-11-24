<div>
  <div class="row mt-4">
    <div class="col-12">
      <div class="card mb-4 mx-4">
        <div class="card-header pb-0">
          <div class="d-flex flex-row justify-content-between">
            <div>
              <h5 class="mb-0">Liste des utilisateurs</h5>
            </div>
            @if (auth()->user()->isAdmin())
              <a href="{{ route('users.create') }}" class="btn bg-gradient-dark btn-sm mb-0" type="button">+&nbsp;
                Ajouter</a>
            @endif
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
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                  Rôle
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                  Actions
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr class="px-3">
                  <td class="text-md-left" wire:click='selectEvent({{ $user->id }})'>
                    <p class="text-xs font-weight-bold mb-0 ps-3">{{ $user->name }}</p>
                  </td>
                  <td class="text-md-center">
                    <p class="text-xs font-weight-bold mb-0 ps-3">{{ $user->email }}</p>
                  </td>
                  <td class="text-md-center">
                    <p class="text-xs font-weight-bold mb-0 ps-3">{{ $user->phone }}</p>
                  </td>
                  <td class="text-md-center">
                    <p class="text-xs font-weight-bold mb-0 ps-3">{{ $user->location }}</p>
                  </td>
                  <td class="text-md-center">
                    <p class="text-xs font-weight-bold mb-0 ps-3">{{ $user->role }}</p>
                  </td>
                  <td class="text-md-center">
                    <a href="{{ route('users.show', [$user->id]) }}" class="mx-3" data-bs-toggle="tooltip"
                      data-bs-original-title="Editer l'utilisateur">
                      <i class="fas fa-user-edit text-secondary"></i>
                    </a>
                    <span>
                      <i class="cursor-pointer fas fa-trash text-secondary" data-bs-toggle="tooltip"
                        data-bs-original-title="Supprimer l'utilisateur"
                        onclick="confirm('Supprimer cet utilisateur ?') || event.stopImmediatePropagation()"
                        wire:click="deleteUser({{ $user->id }})"></i>
                    </span>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  (function() {
    window.onpageshow = function(event) {
      if (event.persisted) {
        window.location.reload();
      }
    };
  })();
</script>
