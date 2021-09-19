<div>
  <div class="container-fluid py-4">
    <div class="row d-none d-lg-block">
      <div class="col-12 col-lg-8 mx-auto my-5">
        <div class="multisteps-form__progress">
          <button class="multisteps-form__progress-btn js-active" type="button" title="Evènement">
            <span>Evènement</span>
          </button>
          <button class="multisteps-form__progress-btn js-active" type="button" title="Hôtes">Hôtes</button>
        </div>
      </div>
    </div>

    <livewire:import-host :eventId="$eventId" />

    <livewire:components.hosts :eventId="$eventId" />

    <div class="button-row d-flex mt-4 float-right">
      <button class="btn bg-gradient-dark ms-auto mb-0" wire:click="submit">Valider</button>
    </div>

    <div class="col-12">
      <button wire:click="editEvent()" class="btn btn-default"><i class="fas fa-arrow-left mr-2"></i>
        Retour</button>
    </div>
  </div>
</div>
