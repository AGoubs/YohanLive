<div>
  @if ($users != [])
  <div class="row">
    <div class="col-12 col-lg-12 m-auto mb-4">
      <div class="card mb-4">
        <div class="card-header">
          <div class="d-flex flex-row justify-content-between">
            <div>
              <h5 class="mb-0">Partagé avec</h5>
            </div>
            {{-- <a href="{{ route('hosts.edit', $eventId) }}" class="btn bg-gradient-dark btn-sm mb-0"
              type="button">+&nbsp; Ajouter</a> --}}
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Nom
                  </th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Email
                  </th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Téléphone
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr class="px-3">
                    <td class="text-md-left" style="cursor: pointer">
                      <p class="text-xs font-weight-bold mb-0 ps-3">{{ $user->name }}</p>
                    </td>
                    <td class="text-md-left" style="cursor: pointer">
                      <p class="text-xs font-weight-bold mb-0 ps-3">{{ $user->email }}</p>
                    </td>
                    <td class="text-md-left" style="cursor: pointer">
                      <p class="text-xs font-weight-bold mb-0 ps-3">{{ $user->phone }}</p>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="d-flex flex-row justify-content-between">
        <div></div>
        {{-- <a onclick="confirm('Supprimer tous les hôtes/hôtesses ? \nAttention, cette action n\'est pas réversible.') || event.stopImmediatePropagation()"
          wire:click="deleteAllHosts()" class="btn bg-gradient-danger btn-sm" type="button">Supprimer les hôtes</a> --}}
      </div>
    </div>
  </div>
  @endif
</div>
