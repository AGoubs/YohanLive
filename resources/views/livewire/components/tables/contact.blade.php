<div>
  <div class="row mx-2">
    <div class="col-12 col-lg-12 m-auto mb-4">
      <div class="card mb-4">
        <div class="card-header">
          <div class="d-flex flex-row justify-content-between">
            @if (auth()->user()->isAdmin())
              <div class="col-12 col-md-6 col-lg-6 mt-2 mt-sm-0">
                <div class="d-inline-flex">
                  <div x-data>
                    <button x-bind:disabled="$wire.disableDecrease" class="btn" onclick="decrease_date()"><i class="fas fa-chevron-left"></i> </button>
                  </div>
                  <div class="form-group mx-2">
                    <select class="form-control" id="date_event" style="background-color: white" wire:model="date">
                      @foreach ($dateBetween as $date)
                        <option wire:key="{{ $date }}" value="{{ $date }}">{{ ucfirst(\Carbon\Carbon::parse($date)->translatedFormat('l d F Y')) }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div x-data>
                    <button x-bind:disabled="$wire.disableIncrease" class="btn" onclick="increase_date()"><i class="fas fa-chevron-right"></i></button>
                  </div>
                </div>
              </div>
              <div>
                <button class="btn bg-gradient-dark mb-0" wire:click="ContactExport()">Exporter <i class="far fa-file-excel fa-lg text-success"></i></button>
              </div>
            @else
              <div>
                <h5 class="mb-0">{{ $event->Nom }}</h5>
              </div>
              @if ($total)
                @if ($total <= 1)
                  <div>
                    <span class="h5">{{ $total }}</span> Contact ajouté
                  </div>
                @else
                  <div>
                    <span class="h5">{{ $total }}</span> Contacts ajoutés
                  </div>
                @endif
              @endif
              {{-- <a href="{{ route('events.create-contact', $eventId) }}" class="btn bg-gradient-dark btn-sm mb-0" type="button">+&nbsp; Ajouter</a> --}}
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
                    @if (auth()->user()->isAdmin())
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Ajouté par
                      </th>
                    @endif
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($contacts as $contact)
                    <tr class="px-3">
                      <td class="text-md-left">
                        <p class="text-xs font-weight-bold mb-0 ps-3">{{ $contact->name }}</p>
                      </td>
                      <td class="text-md-left">
                        <p class="text-xs font-weight-bold mb-0  ps-3">{{ $contact->firstname }}</p>
                      </td>

                      <td class="text-md-left">
                        <p class="text-xs font-weight-bold mb-0 ps-md-3">{{ $contact->phone }}</p>
                      </td>
                      <td class="text-md-left">
                        <p class="text-xs font-weight-bold mb-0  ps-3">{{ $contact->email }}</p>
                      </td>
                      <td class="text-md-left">
                        <p class="text-xs font-weight-bold mb-0  ps-3">{{ $contact->comment }}</p>
                      </td>
                      @if ($contact->user_name)
                        <td class="text-md-left">
                          <p class="text-xs font-weight-bold mb-0  ps-3">{{ $contact->user_name }}</p>
                        </td>
                      @endif
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
<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script>
  let dataTableSearchContacts = new simpleDatatables.DataTable("#contacts-table", {
    searchable: true,
    fixedHeight: true,
    perPage: 100,
    labels: {
      placeholder: "Rechercher...",
      perPage: "{select} contacts par page",
      noRows: "Aucun contact trouvée",
      info: "Affichage de {start} à {end} des {rows} contacts",
    }
  });
</script>
<script>
  function decrease_date() {
    @this.decrease_date();
    dataTableSearchContacts.destroy();
    setTimeout(() => {

      dataTableSearchContacts.init();
    }, 200);
  }

  function increase_date() {
    @this.increase_date();
    dataTableSearchContacts.destroy();
    setTimeout(() => {

      dataTableSearchContacts.init();
    }, 200);
  }
</script>
