<div>
  <div class="card mb-4">
    <div class="card-header pb-0">
      <div class="d-flex flex-row justify-content-between">
        <div>
          <h5 class="mb-0">Évènements</h5>
        </div>
        @if (auth()->user()->isAdmin())
          <a href="{{ route('events.create') }}" class="btn bg-gradient-dark btn-sm mb-0" type="button">+&nbsp;
            Ajouter</a>
        @endif
      </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
      <table class="table align-items-center mb-0 responsive" id="event-table" wire:ignore>
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
              Nom
            </th>
            <th data-type="date" data-format="DD/MM/YYYY" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
              Date
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
              Évènement
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
              Fin de l'évènement
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
              Arrivé
            </th>
            @if (auth()->user()->isAdmin())
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Actions
              </th>
            @endif
          </tr>
        </thead>
        <tbody>
          {{-- wire:click.prevent="showEvent({{ $event->id }})" --}}
          @foreach ($events as $event)
            <tr class="px-3" wire:key="{{ $event->id }}">
              <td class="ps-2 ps-md-4" data-label="Nom" wire:click="showEvent({{ $event->id }})">
                <p class="text-xs font-weight-bold mb-0  short-col">
                  {{-- On Affiche un logo si l'event est partagé --}}
                  @if (in_array($event->id, $events_by_users))
                    @if (auth()->user()->isAdmin())
                      <i class="fas fa-user-friends text-success"
                        title="{{ implode(', ', $this->users[$event->id]) }}"></i>&nbsp;
                    @endif
                  @endif

                  {{ $event->Nom }}
                </p>
              </td>
              <td class="text-md-center" data-label="Date">
                @if ($event->Date < date('Y-m-d')) <span
                    class="badge badge-sm badge-danger">
                    {{ date('d/m/Y', strtotime($event->Date)) }}</span>
                @elseif ($event->Date == date('Y-m-d'))
                  <span class="badge badge-sm badge-info">{{ date('d/m/Y', strtotime($event->Date)) }}</span>
                @elseif ($event->Date > date('Y-m-d'))
                  <span class="badge badge-sm badge-success">{{ date('d/m/Y', strtotime($event->Date)) }}</span>
                @endif
              </td>

              <td class="text-md-center" data-label="Heure de l'évènement">
                <span
                  class="text-secondary text-xs font-weight-bold">{{ date('H:i', strtotime($event->HeureEvenement)) }}</span>
              </td>
              <td class="text-md-center" data-label="Heure de fin">
                <span
                  class="text-secondary text-xs font-weight-bold">{{ date('H:i', strtotime($event->HeureFinEvenement)) }}</span>
              </td>
              <td class="text-md-center" data-label="Heure d'arrivé">
                <p class="text-xs font-weight-bold mb-0">
                  {{ date('H:i', strtotime($event->HeureArrive)) }}
                </p>
              </td>
              @if (auth()->user()->isAdmin())
                <td class="text-md-center action-col">
                  <a href="{{ route('events.edit', [$event->id]) }}" class="mx-3" data-bs-toggle="tooltip"
                    data-bs-original-title="Editer l'évènement">
                    <i class="fas fa-edit text-secondary"></i>
                  </a>
                  <span>
                    <i class="cursor-pointer fas fa-trash text-secondary" data-bs-toggle="tooltip"
                      data-bs-original-title="Supprimer l'évènement"
                      onclick="confirm('Supprimer cet évènement ?') || event.stopImmediatePropagation()"
                      wire:click="deleteEvent({{ $event->id }})"></i>
                  </span>
                </td>
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>
<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script>
  const dataTableSearchEvents = new simpleDatatables.DataTable("#event-table", {
    searchable: true,
    fixedHeight: true,
    perPage: 10,
    labels: {
      placeholder: "Rechercher...",
      perPage: "{select} évènements par page",
      noRows: "Aucun évènements trouvée",
      info: "Affichage de {start} à {end} des {rows} évènements",
    }
  });
</script>
