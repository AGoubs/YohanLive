<div>
    <link href="../assets/css/responsive-table.css" rel="stylesheet" />
    {{-- <livewire:flash-message> --}}
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Évènements</h5>
                        </div>
                        <a href="{{ route('ajouter un evènement') }}" class="btn bg-gradient-dark btn-sm mb-0"
                            type="button">+&nbsp; Ajouter</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="responsive-view-table">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="column1 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            data-content="Nom">
                                            Nom
                                        </th>
                                        <th class="column2 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                            data-content="Date">
                                            Date
                                        </th>
                                        <th
                                            class="column4 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Heure de l'évènement
                                        </th>
                                        <th
                                            class="column3 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Heure d'arrivé
                                        </th>
                                        <th
                                            class="column5 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                    <tr>
                                        <td class="column1 text-left-responsive ps-4" data-content="Nom" wire:click="showEvent({{$event->id}})" style="cursor: pointer">
                                            <p class="text-xs font-weight-bold mb-0">{{ $event->Nom }}</p>
                                        </td>
                                        <td class="column2 text-center-responsive" data-content="Date" wire:click="showEvent({{$event->id}})" style="cursor: pointer">
                                            @if ($event->Date < date('Y-m-d')) <span
                                                class="badge badge-sm badge-danger">
                                                {{ date('d/m/Y', strtotime($event->Date)) }}</span>
                                                @elseif ($event->Date == date('Y-m-d'))
                                                <span
                                                    class="badge badge-sm badge-info">{{ date('d/m/Y', strtotime($event->Date)) }}</span>
                                                @elseif ($event->Date > date('Y-m-d'))
                                                <span
                                                    class="badge badge-sm badge-success">{{ date('d/m/Y', strtotime($event->Date)) }}</span>
                                                @endif
                                        </td>

                                        <td class="column4 text-center-responsive" data-content="Heure de l'évènement" wire:click="showEvent({{$event->id}})" style="cursor: pointer">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ date('H:i', strtotime($event->HeureEvenement)) }}</span>
                                        </td>
                                        <td class="column3 text-center-responsive" data-content="Heure d'arrivé" wire:click="showEvent({{$event->id}})" style="cursor: pointer">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ date('H:i', strtotime($event->HeureArrive)) }}
                                            </p>
                                        </td>
                                        <td class="column5 text-center-responsive">
                                            <a href="{{ route('modifier un évènement', [$event->id]) }}" class="mx-3"
                                                data-bs-toggle="tooltip" data-bs-original-title="Editer l'évènement">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <span>
                                                <i class="cursor-pointer fas fa-trash text-secondary"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-original-title="Supprimer l'évènement"
                                                    onclick="confirm('Supprimer cet évènement ?') || event.stopImmediatePropagation()"
                                                    wire:click="deleteEvent({{ $event->id }})"></i>
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

</div>