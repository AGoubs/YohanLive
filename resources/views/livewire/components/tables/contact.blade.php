<div>
  <div class="row">
    <div class="col-12 col-lg-12 m-auto mb-4">
      <div class="card mb-4">
        <div class="card-header">
          <div class="d-flex flex-row justify-content-between">
            <div>
              <h5 class="mb-0">{{ $event->Nom }}</h5>
            </div>
            <a href="{{ route('hosts.edit', $eventId) }}" class="btn bg-gradient-dark btn-sm mb-0" type="button">+&nbsp; Ajouter</a>
          </div>
        </div>
        {{-- <hr class="horizontal dark mt-3"> --}}
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                     Nom
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                     Prénom
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Commentaire
                     </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                     Téléphone
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                     Email
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                     Société
                    </th>
                   
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($hosts as $host)
                  <tr class="px-3">
                    <td class="text-md-left" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                      <p class="text-xs font-weight-bold mb-0 ps-3">{{ $host->nom }}</p>
                    </td>
                    <td class="text-md-left" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                      <p class="text-xs font-weight-bold mb-0  ps-3">{{ $host->prenom }}</p>
                    </td>
                    <td class="text-md-left" style="text-align: left; word-break: break-all; min-width:200px" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                      <p class="text-xs font-weight-bold mb-0 ps-md-3">{{ $host->commentaire }}</p>
                    </td>
                    <td class="text-md-left" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer;min-width:150px">
                      <p class="text-xs font-weight-bold mb-0  ps-3">{{ $host->telephone }}</p>
                    </td>
                    <td class="text-md-left" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer;min-width:150px">
                      <p class="text-xs font-weight-bold mb-0  ps-3">{{ $host->fonction }}</p>
                    </td>
                    <td class="text-md-left" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer;min-width:150px">
                      <p class="text-xs font-weight-bold mb-0  ps-3">{{ $host->lieu }}</p>
                    </td>
                    
                    
                    <td class="text-md-left" style="min-width: 100px">
                      <a href="{{ route('hosts.edit', [$eventId, $host->id]) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editer l'hôte">
                        <i class="fas fa-user-edit text-secondary"></i>
                      </a>
                      <span>
                        <i class="cursor-pointer fas fa-trash text-secondary" data-bs-toggle="tooltip" data-bs-original-title="Supprimer l'hôte" onclick="confirm('Supprimer cet hôte ?') || event.stopImmediatePropagation()" wire:click="deleteHost({{ $host->id }})"></i>
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
</div>
