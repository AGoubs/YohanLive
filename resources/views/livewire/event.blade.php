<div>
  <div class="row mt-4">
    <div class="col-12">
      <div class="card mb-4 mx-4">
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
        <div class="card-body px-0 pt-0 pb-2" wire:ignore>
          <table class="table align-items-center mb-0 responsive" id="table-events">
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
                  Heure de fin de l'évènement
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                  Heure d'arrivé
                </th>
                @if (auth()->user()->isAdmin())
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Actions
                  </th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach ($events as $event)
                <tr class="px-3">
                  <td class="" data-label="Nom" wire:click.prevent="showEvent({{ $event->id }})"
                    style="cursor: pointer">

                    <p class="text-xs font-weight-bold mb-0">
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
                  <td class="text-md-center" data-label="Date" wire:click.prevent="showEvent({{ $event->id }})"
                    style="cursor: pointer">
                    @if ($event->Date < date('Y-m-d')) <span
                        class="badge badge-sm badge-danger">
                        {{ date('d/m/Y', strtotime($event->Date)) }}</span>
                    @elseif ($event->Date == date('Y-m-d'))
                      <span class="badge badge-sm badge-info">{{ date('d/m/Y', strtotime($event->Date)) }}</span>
                    @elseif ($event->Date > date('Y-m-d'))
                      <span class="badge badge-sm badge-success">{{ date('d/m/Y', strtotime($event->Date)) }}</span>
                    @endif
                  </td>

                  <td class="text-md-center" data-label="Heure de l'évènement"
                    wire:click.prevent="showEvent({{ $event->id }})" style="cursor: pointer">
                    <span
                      class="text-secondary text-xs font-weight-bold">{{ date('H:i', strtotime($event->HeureEvenement)) }}</span>
                  </td>
                  <td class="text-md-center" data-label="Heure de fin"
                    wire:click.prevent="showEvent({{ $event->id }})" style="cursor: pointer">
                    <span
                      class="text-secondary text-xs font-weight-bold">{{ date('H:i', strtotime($event->HeureFinEvenement)) }}</span>
                  </td>
                  <td class="text-md-center" data-label="Heure d'arrivé"
                    wire:click.prevent="showEvent({{ $event->id }})" style="cursor: pointer">
                    <p class="text-xs font-weight-bold mb-0">
                      {{ date('H:i', strtotime($event->HeureArrive)) }}
                    </p>
                  </td>
                  @if (auth()->user()->isAdmin())
                    <td class="text-md-center">
                      <a href="{{ route('events.edit', [$event->id]) }}" class="mx-3"
                        data-bs-toggle="tooltip" data-bs-original-title="Editer l'évènement">
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
      <div class="d-flex flex-row justify-content-between">
        <div></div>
        <a onclick="confirm('Supprimer tous les évènements ? \nAttention, cette action n\'est pas réversible.') || event.stopImmediatePropagation()"
          wire:click="deleteAllEvent()" class="btn bg-gradient-danger btn-sm mx-4" type="button">Supprimer les
          évènements</a>
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
<script src="../../assets/js/plugins/datatables.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.11.1/i18n/fr_fr.json"></script>
<script>
  const dataTableSearch = new simpleDatatables.DataTable("#table-events", {
    searchable: true,
    fixedHeight: true,
    perPage: 25,
  });
</script>
