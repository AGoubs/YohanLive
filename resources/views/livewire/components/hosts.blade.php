<div>
  <div class="row">
    <div class="col-12 col-lg-12 m-auto mb-4">
      <div class="card mb-4">
        <div class="card-header">
          <div class="d-flex flex-row justify-content-between">
            <div>
              <h5 class="mb-0">{{ $tableType->type_event }}</h5>
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
                  <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                    Arrivé
                  </th>
                  {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                  Heure d'arrivé
                </th> --}}
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
                  <tr class="px-3">
                    @if ($host->is_arrived)
                      <td class="text-center" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                        @if ($host->time_arrived)
                          @if ($host->time_arrived < $event->HeureArrive)
                            <span class="badge badge-sm badge-success">
                              {{ date('H:i', strtotime($host->time_arrived)) }}</span>
                          @else
                            <span class="badge badge-sm badge-warning">
                              {{ date('H:i', strtotime($host->time_arrived)) }}</span>
                          @endif

                        @else
                          <span class="badge badge-sm badge-success ms-2">Oui</span>

                        @endif

                      </td>
                    @else
                      <td class="text-center" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer" style="cursor: pointer">
                        <span class="badge badge-sm badge-danger">Non</span>
                      </td>
                    @endif
                    {{-- <td class="text-md-left" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">

                    @else
                    <p class="text-xs font-weight-bold ps-3"></p>
                  </td> --}}
                    <td class="text-md-left" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                      <p class="text-xs font-weight-bold mb-0 ps-3">{{ $host->nom }}</p>
                    </td>
                    <td class="text-md-left" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                      <p class="text-xs font-weight-bold mb-0  ps-3">{{ $host->prenom }}</p>
                    </td>
                    <td class="text-md-left" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                      <p class="text-xs font-weight-bold mb-0  ps-3">{{ $host->fonction }}</p>
                    </td>
                    <td class="text-md-left" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer;min-width:150px">
                      <p class="text-xs font-weight-bold mb-0  ps-3">{{ $host->telephone }}</p>
                    </td>
                    @if (in_array('Numéro Ipad', $tableFields))
                      <td class="text-md-left" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                        <p class="text-xs font-weight-bold mb-0  ps-3">{{ $host->numero_ipad }}</p>
                      </td>
                    @endif
                    @if (in_array('Lieu', $tableFields))
                      <td class="text-md-left" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                        <p class="text-xs font-weight-bold mb-0  ps-3">{{ $host->lieu }}</p>
                      </td>
                    @endif
                    @if (in_array('Point', $tableFields))
                      <td class="text-md-left" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                        <p class="text-xs font-weight-bold mb-0  ps-3">{{ $host->point }}</p>
                      </td>
                    @endif
                    @if (in_array('Porte', $tableFields))
                      <td class="text-md-left" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                        <p class="text-xs font-weight-bold mb-0  ps-3">{{ $host->porte }}</p>
                      </td>
                    @endif
                    <td class="text-md-left" style="text-align: left; word-break: break-all; min-width:200px" wire:click="changeArrived({{ $host->id }})" style="cursor: pointer">
                      <p class="text-xs font-weight-bold mb-0 ps-md-3">{{ $host->commentaire }}</p>
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
      <div class="d-flex flex-row justify-content-between">
        <div></div>
        <a onclick="confirm('Supprimer tous les hôtes/hôtesses ? \nAttention, cette action n\'est pas réversible.') || event.stopImmediatePropagation()" wire:click="deleteAllHosts()" class="btn bg-gradient-danger btn-sm" type="button">Supprimer les hôtes</a>
      </div>
    </div>
  </div>
</div>
