<div>
  <div class="container-fluid py-4">
    <form wire:submit.prevent="assignUser(Object.fromEntries(new FormData($event.target)))" action="#" method="POST">
      <div class="row">
        <div class="col-12">
          <h3 class="mb-4">{{ $event->Nom }}</h3>
          <livewire:components.users-table :users='$users' :assign="true" :usersIdsByEvent="$usersIdsByEvent" />
        </div>
      </div>
      <div class="row mt-2">
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn bg-gradient-dark btn-sm mb-0">Enregistrer</button>
        </div>
      </div>
    </form>
  </div>
</div>
