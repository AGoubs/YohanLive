<div>
  <div class="container">
    <div class="row mt-4">
      <div class="col-12">
        <h2>Bienvenue {{ $user }}</h2>
      </div>
    </div>
    @if (auth()->user()->isAdmin())

      <div class="row mt-4">
        <div class="col-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex flex-row justify-content-between">
                <div>
                  <h5 class="mb-0">Derniers Évènements</h5>
                </div>
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
                      Heure de fin de l'évènement
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Heure d'arrivé
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($events as $event)
                    <tr class="px-3">
                      <td class="ps-2 ps-md-4" data-label="Nom">
                        <p class="text-xs font-weight-bold mb-0">
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
                          <span
                            class="badge badge-sm badge-success">{{ date('d/m/Y', strtotime($event->Date)) }}</span>
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
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-4 mr-4">
          <div class="card mb-4">
            <div class="card-header">
              <div class="d-flex flex-row justify-content-between">
                <div>
                  <h5 class="mb-0">Utilisateurs</h5>
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
  </div>
</div>
@endif
