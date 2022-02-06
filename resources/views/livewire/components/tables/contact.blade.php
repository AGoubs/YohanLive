<div>
  <div class="row mx-2">
    <div class="col-12 col-lg-12 m-auto mb-4">
      <div class="card mb-4">
        <div class="card-header">
          <div class="d-flex flex-row justify-content-between">
            @if (auth()->user()->isAdmin())
              <div class="col-12 col-md-6 col-lg-6 mt-2 mt-sm-0">
                <div class="d-inline-flex">

                  <button class="btn" wire:click="decrease_date()"><i class="fas fa-chevron-left"></i> </button>
                  <div class="form-group mx-2">
                    <select class="form-control" id="date_event" style="background-color: white" wire:model="date">
                      @foreach ($dateBetween as $date)
                        @if ($date == date('Y-m-d'))
                          <option selected="selected" value="{{ $date }}">{{ ucfirst(\Carbon\Carbon::parse($date)->translatedFormat('l d F Y')) }}</option>
                        @else
                          <option value="{{ $date }}">{{ ucfirst(\Carbon\Carbon::parse($date)->translatedFormat('l d F Y')) }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <button class="btn" wire:click="increase_date()"><i class="fas fa-chevron-right"></i></button>
                </div>
              </div>
              <div><button class="btn"><i class="far fa-file-excel fa-2x text-success"></i></button></div>
            @else
              <div>
                <h5 class="mb-0">{{ $event->Nom }}</h5>
              </div>
              <a href="{{ route('events.create-contact', $eventId) }}" class="btn bg-gradient-dark btn-sm mb-0" type="button">+&nbsp; Ajouter</a>
            @endif

          </div>
        </div>
        <livewire:flash-message>

          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center mb-0" id="contacts-table">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Nom
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Prénom
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Téléphone
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Email
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Commentaire
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Model actuel
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($contacts as $contact)
                    <tr class="px-3">
                      <td class="text-md-left" style="cursor: pointer">
                        <p class="text-xs font-weight-bold mb-0 ps-3">{{ $contact->name }}</p>
                      </td>
                      <td class="text-md-left" style="cursor: pointer">
                        <p class="text-xs font-weight-bold mb-0  ps-3">{{ $contact->firstname }}</p>
                      </td>
                      <td class="text-md-left" style="cursor: pointer">
                        <p class="text-xs font-weight-bold mb-0 ps-md-3">{{ $contact->phone }}</p>
                      </td>
                      <td class="text-md-left" style="cursor: pointer;min-width:150px">
                        <p class="text-xs font-weight-bold mb-0  ps-3">{{ $contact->email }}</p>
                      </td>
                      <td class="text-md-left" style="cursor: pointer;min-width:150px">
                        <p class="text-xs font-weight-bold mb-0  ps-3">{{ $contact->comment }}</p>
                      </td>
                      <td class="text-md-left" style="cursor: pointer;min-width:150px">
                        <p class="text-xs font-weight-bold mb-0  ps-3">{{ $contact->model }}</p>
                      </td>
                      {{-- TODO Edit contact --}}
                      <td class="text-md-left" style="min-width: 130px">
                        <a href="{{ route('contacts.edit', ['eventId' => $event->id, 'contactId' => $contact->id]) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editer l'hôte">
                          <i class="fas fa-user-edit text-secondary"></i>
                        </a>
                        <span>
                          <i class="cursor-pointer fas fa-trash text-secondary" data-bs-toggle="tooltip" data-bs-original-title="Supprimer le contact" onclick="confirm('Supprimer ce contact : {{ $contact->name }} {{ $contact->firstname }}?') || event.stopImmediatePropagation()" wire:click="deleteContact({{ $contact->id }})"></i>
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
{{-- <script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script>
  const dataTableSearchContacts = new simpleDatatables.DataTable("#contacts-table", {
    searchable: true,
    fixedHeight: true,
    perPage: 5,
    labels: {
      placeholder: "Rechercher...",
      perPage: "{select} contacts par page",
      noRows: "Aucun contact trouvée",
      info: "Affichage de {start} à {end} des {rows} contacts",
    }
  });
</script> --}}
