<div>
  {{-- <livewire:flash-message> --}}
  <div class="row mt-4">
    <div class="col-12">
      <div class="card mb-4 mx-4">
        <div class="card-header pb-0">
          <div class="d-flex flex-row justify-content-between">
            <div>
              <h5 class="mb-0">Évènements</h5>
            </div>
            <a href="{{ route('ajouter un evènement') }}" class="btn bg-gradient-dark btn-sm mb-0" type="button">+&nbsp; Ajouter</a>
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
                  Date
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                  Heure de l'évènement
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                  Heure d'arrivé
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($events as $event)
                <tr class="px-3">
                  <td data-label="Nom" wire:click.prevent="showEvent({{ $event->id }})" style="cursor: pointer">
                    <p class="text-xs font-weight-bold mb-0">{{ $event->Nom }}</p>
                  </td>
                  <td data-label="Date" wire:click.prevent="showEvent({{ $event->id }})" style="cursor: pointer">
                    @if ($event->Date < date('Y-m-d')) <span class="badge badge-sm badge-danger">
                        {{ date('d/m/Y', strtotime($event->Date)) }}</span>
                    @elseif ($event->Date == date('Y-m-d'))
                      <span class="badge badge-sm badge-info">{{ date('d/m/Y', strtotime($event->Date)) }}</span>
                    @elseif ($event->Date > date('Y-m-d'))
                      <span class="badge badge-sm badge-success">{{ date('d/m/Y', strtotime($event->Date)) }}</span>
                    @endif
                  </td>

                  <td data-label="Heure de l'évènement" wire:click.prevent="showEvent({{ $event->id }})" style="cursor: pointer">
                    <span class="text-secondary text-xs font-weight-bold">{{ date('H:i', strtotime($event->HeureEvenement)) }}</span>
                  </td>
                  <td data-label="Heure d'arrivé" wire:click.prevent="showEvent({{ $event->id }})" style="cursor: pointer">
                    <p class="text-xs font-weight-bold mb-0">
                      {{ date('H:i', strtotime($event->HeureArrive)) }}
                    </p>
                  </td>
                  <td>
                    <a href="{{ route('modifier un évènement', [$event->id]) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editer l'évènement">
                      <i class="fas fa-user-edit text-secondary"></i>
                    </a>
                    <span>
                      <i class="cursor-pointer fas fa-trash text-secondary" data-bs-toggle="tooltip" data-bs-original-title="Supprimer l'évènement" onclick="confirm('Supprimer cet évènement ?') || event.stopImmediatePropagation()" wire:click="deleteEvent({{ $event->id }})"></i>
                    </span>
                  </td>
                  <td>
                    <hr class="horizontal dark my-3">
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
