<div>
  <div class="container-fluid py-4">
    <div class="row d-none d-lg-block">
      <div class="col-12 col-lg-8 mx-auto my-5">
        <div class="multisteps-form__progress">
          <button class="multisteps-form__progress-btn js-active" type="button" title="Evènement">Evènement</button>
          <button class="multisteps-form__progress-btn js-active" type="button" title="Customisation">Customisation</button>
          <button class="multisteps-form__progress-btn" type="button" title="Utilisateurs">Utilisateurs</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-8 m-auto">
        <form wire:submit.prevent="addField" action="#" method="POST">
          <input type="hidden" name="newFieldId" id="newFieldId" wire:model.defer="newFieldId">
          <div class="card p-3 border-radius-xl bg-white">
            <h5 class="font-weight-bolder mb-0">Champs personnalisés</h5>
            <p class="mb-0 text-sm">Formulaire de contact</p>
            <div class="row mt-3">
              <div class="col-12 col-lg-6">
                <label for="fieldName" class="control-label">Nom</label>
                <input type="text" class="form-control @if ($message) is-invalid @endif" wire:model.defer="newFieldName" autofocus required />
                @if ($message)
                  <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 col-lg-3">
              <label for="fieldType" class="control-label">Type</label>
              <select name="fieldType" id="fieldType" class="form-control bg-white" wire:model.defer="newFieldType">
                <option value="text">Champ texte</option>
                <option value="select">Liste déroulante</option>
                <option value="checkbox">Case à cocher</option>
                <option value="mail">Champ mail</option>
              </select>
            </div>
            <div class="col-12 col-lg-1 mr-6">
              <label for="fieldRequired" class="control-label">Obligatoire</label>
              <div class="form-check form-switch mt-1">
                <input class="form-check-input mt-1" type="checkbox" id="flexSwitchCheckDefault" name="fieldRequired" wire:model.defer="newFieldRequired">
              </div>
            </div>
            <div class="col-12 col-lg-2">
              <div class="button-row mt-4 d-flex justify-content-center">
                <button class="btn bg-gradient-dark mt-2 ml-auto" type="submit" title="Ajouter">Ajouter</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-12 col-lg-8 m-auto">
      <div class="card border-radius-xl bg-white">
        <h5 class="font-weight-bolder mb-0 p-3">Liste des champs du formulaire</h5>
        <table class="table align-items-center mb-2 responsive" id="users-table">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Nom
              </th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Type
              </th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                Obligatoire
              </th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                Actions
              </th>
            </tr>
          </thead>
          <tbody>
            @if ($fields != [])
              @foreach ($fields as $field)
                <tr class="px-3">
                  <td class="text-md-left" data-label="Nom">
                    <p class="text-xs font-weight-bold mb-0 ps-3 p-2">{{ $field['name'] }}</p>
                  </td>
                  <td class="text-md-left" data-label="Type">
                    @if (isset($field['type']) && array_key_exists($field['type'], $replacementMap))
                      <p class="text-xs font-weight-bold mb-0 ps-3 p-2">{{ $replacementMap[$field['type']] }}</p>
                    @endif
                  </td>
                  <td class="text-md-center" data-label="Obligatoire">
                    @if (isset($field['required']) && $field['required'])
                      <p class="text-xs font-weight-bold mb-0 ps-3 p-2"><span class="fa fa-check text-success fa-lg"></span></p>
                    @else
                      <p class="text-xs font-weight-bold mb-0 ps-3 p-2"><span class="fa fa-times text-danger fa-lg"></span></p>
                    @endif
                  </td>
                  @if (auth()->user()->isAdmin())
                    <td class="text-md-center">
                      <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editer le champ" wire:click="editField('{{ $field['name'] }}')">
                        <i class="fas fa-user-edit text-secondary"></i>
                      </a>
                      <span>
                        <i class="cursor-pointer fas fa-trash text-secondary" data-bs-toggle="tooltip" data-bs-original-title="Supprimer le champ" onclick="deleteField('{{ $field['name'] }}')"></i>
                      </span>
                    </td>
                  @endif
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-lg-8 m-auto mt-5 d-flex justify-content-between">
      <a href="{{ route('events.edit', $eventId) }}" class="btn btn-default" type="button"><i class="fas fa-arrow-left mr-2"></i> Retour</a>
      <button class="btn bg-gradient-dark" type="button" wire:click="validateFields">Suivant <i class="fas fa-arrow-right mr-2"></i></button>
    </div>
  </div>
</div>
</div>

<script>
  function deleteField(name) {
    if (confirm("Supprimer ce champ : " + name + " ?")) {
      @this.deleteField(name);
    }
  }
</script>
