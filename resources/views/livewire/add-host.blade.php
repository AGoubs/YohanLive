<div>
  <div class="row">
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


  <div class="button-row d-flex mt-4 mx-4 float-right">
    <button class="btn bg-gradient-dark ms-auto mb-0" wire:click="submit">Valider</button>
  </div>
</div>