<div>
  <div class="container-fluid py-4">
    <div class="row d-none d-lg-block">
      <div class="col-12 col-lg-8 mx-auto my-5">
        <div class="multisteps-form__progress">
          <button class="multisteps-form__progress-btn js-active" type="button" title="Evènement">
            <span>Evènement</span>
          </button>
          <button class="multisteps-form__progress-btn" type="button" title="Customisation">Customisation</button>
          <button class="multisteps-form__progress-btn" type="button" title="Utilisateurs">Utilisateurs</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-8 m-auto">
        <form wire:submit.prevent="createEvent" action="#" method="POST" class="multisteps-form__form" style="height: 500px;">
          <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
            <h5 class="font-weight-bolder mb-0">Evènement</h5>
            <p class="mb-0 text-sm">Informations de l'évènement</p>
            <div class="row mt-3">
              <div class="col-12 col-sm-12">
                <label for="Nom" class="control-label">Nom <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('Nom') is-invalid @enderror" wire:model.defer="Nom" autofocus />
                @error('Nom')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <label for="Date" class="control-label">Date de début <span class="text-danger">*</span></label>
                <input type="date" class="form-control @error('Date') border border-danger @enderror" wire:model.defer="Date" />
                @error('Date')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <label for="DateFin" class="control-label">Date de fin</label>
                <input type="Date" class="form-control @error('DateFin') border border-danger @enderror" wire:model.defer="DateFin" />
                @error('DateFin')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="button-row d-flex mt-4">
                <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit" title="Suivant">Suivant</button>
              </div>
            </div>

        </form>
      </div>
      <div class="col-12">
        <a href="{{ route('events.index') }}" class="btn btn-default" type="button"><i class="fas fa-arrow-left mr-2"></i> Retour</a>
      </div>
    </div>
  </div>
</div>
