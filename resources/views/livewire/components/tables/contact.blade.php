<div>
  {{-- TODO Datatables --}}
  <div class="row mx-2  mt-n7">
    <div class="col-12 col-lg-12 m-auto mb-4">
      <div class="card mb-4">
        <div class="card-header">
          <div class="d-flex flex-row justify-content-between">
            <div>
              <h5 class="mb-0">{{ $event->Nom }}</h5>
            </div>
            <a href="{{ route('events.create-contact', $eventId) }}" class="btn bg-gradient-dark btn-sm mb-0" type="button">+&nbsp; Ajouter</a>
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

                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
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
                    <td class="text-md-left" style="text-align: left; word-break: break-all; min-width:200px" style="cursor: pointer">
                      <p class="text-xs font-weight-bold mb-0 ps-md-3">{{ $contact->email }}</p>
                    </td>
                    <td class="text-md-left" style="cursor: pointer;min-width:150px">
                      <p class="text-xs font-weight-bold mb-0  ps-3">{{ $contact->phone }}</p>
                    </td>
                    <td class="text-md-left" style="cursor: pointer;min-width:150px">
                      <p class="text-xs font-weight-bold mb-0  ps-3">{{ $contact->comment }}</p>
                    </td>
                    <td class="text-md-left" style="cursor: pointer;min-width:150px">
                      <p class="text-xs font-weight-bold mb-0  ps-3">{{ $contact->model }}</p>
                    </td>
                    {{-- TODO Edit contact --}}
                    <td class="text-md-left" style="min-width: 100px">
                      <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editer l'hôte">
                        <i class="fas fa-user-edit text-secondary"></i>
                      </a>
                      <span>
                        <i class="cursor-pointer fas fa-trash text-secondary" data-bs-toggle="tooltip" data-bs-original-title="Supprimer le contact" onclick="confirm('Supprimer ce contact ?') || event.stopImmediatePropagation()" wire:click="deleteContact({{ $contact->id }})"></i>
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
