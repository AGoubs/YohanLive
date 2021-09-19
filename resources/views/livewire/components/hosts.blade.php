<div>
  <div class="row">
    <div class="col-12 col-lg-12 m-auto mb-4">
      <div class="card mb-4">
        <div class="card-header">
          <div class="d-flex flex-row justify-content-between">
            <div>
              <h5 class="mb-0">{{ $tableType->type_event }}</h5>
            </div>
            <a href="{{ route('gestion d\'hôte', $eventId) }}" class="btn bg-gradient-dark btn-sm mb-0" type="button">+&nbsp; Ajouter</a>
          </div>
        </div>
        {{-- <hr class="horizontal dark mt-3"> --}}
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 responsive">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Arrivé
                  </th>
                  @foreach ($tableFields as $item)
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      {{ $item }}
                    </th>
                  @endforeach
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    @if ($host->is_arrived)
                      <td data-label="Arrivé" class="text-center-responsive px-4" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                        <span class="badge badge-sm badge-success">Oui</span>
                      </td>
                    @else
                      <td data-label="Arrivé" class="text-center-responsive px-4" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer" style="cursor: pointer">
                        <span class="badge badge-sm badge-danger">Non</span>
                      </td>
                    @endif
                    <td data-label="Nom" class="text-center-responsive px-4" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                      <p class="text-xs font-weight-bold mb-0">{{ $host->nom }}</p>
                    </td>
                    <td data-label="Prénom" class="text-center-responsive px-4" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                      <p class="text-xs font-weight-bold mb-0">{{ $host->prenom }}</p>
                    </td>
                    <td data-label="Fonction" class="text-center-responsive px-4" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                      <p class="text-xs font-weight-bold mb-0">{{ $host->fonction }}</p>
                    </td>
                    <td data-label="Téléphone" class="text-center-responsive px-4" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                      <p class="text-xs font-weight-bold mb-0">{{ $host->telephone }}</p>
                    </td>
                    @if (in_array('Numéro Ipad', $tableFields))
                      <td data-label="Numéro Ipad" class="text-center-responsive px-4" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                        <p class="text-xs font-weight-bold mb-0">{{ $host->numero_ipad }}</p>
                      </td>
                    @endif
                    @if (in_array('Lieu', $tableFields))
                      <td data-label="Lieu" class="text-center-responsive px-4" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                        <p class="text-xs font-weight-bold mb-0">{{ $host->lieu }}</p>
                      </td>
                    @endif
                    @if (in_array('Point', $tableFields))
                      <td data-label="Point" class="text-center-responsive ps-4" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                        <p class="text-xs font-weight-bold mb-0">{{ $host->point }}</p>
                      </td>
                    @endif
                    @if (in_array('Porte', $tableFields))
                      <td data-label="Porte" class="text-center-responsive ps-4" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                        <p class="text-xs font-weight-bold mb-0">{{ $host->porte }}</p>
                      </td>
                    @endif
                    <td style="text-align: left; word-break: break-all;" class="text-center-responsive ps-4" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                      <p class="text-xs font-weight-bold mb-0">{{ $host->commentaire }}</p>
                    </td>
                    <td class="column5 text-center-responsive">
                      <a href="{{ route('gestion d\'hôte', [$eventId, $host->id]) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editer l'hôte">
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
