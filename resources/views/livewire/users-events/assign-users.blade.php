<div>
  <div class="container-fluid py-4">
    <div class="row d-none d-lg-block">
      <div class="col-12 col-lg-8 mx-auto my-5">
        <div class="multisteps-form__progress">
          <button class="multisteps-form__progress-btn js-active" type="button" title="Evènement">
            <span>Evènement</span>
          </button>
          <button class="multisteps-form__progress-btn js-active" type="button" title="Utilisateurs">Utilisateurs</button>
        </div>
      </div>
    </div>
    <form wire:submit.prevent="assignUser(Object.fromEntries(new FormData($event.target)))" action="#" method="POST">
      <div class="row">
        <div class="col-12">
          <h3 class="mb-4 text-center">{{ $event->Nom }}</h3>
          <livewire:components.users-table :users='$users' :assign="true" :usersIdsByEvent="$usersIdsByEvent" :eventId='$eventId' />
        </div>
      </div>
      <div class="row mt-2">
        <div class="d-flex justify-content-between">
          <button type="button" wire:click="editEvent()" class="btn btn-default"><i class="fas fa-arrow-left mr-2"></i>Retour</button>
          <button type="submit" class="btn bg-gradient-dark btn-sm mb-0">Enregistrer</button>
        </div>
      </div>
    </form>
  </div>
</div>
