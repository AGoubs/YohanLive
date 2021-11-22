<div>
  <div class="container-fluid py-4">
    <div class="row d-none d-lg-block">
      <div class="col-12 col-lg-8 mx-auto my-5">
        <div class="multisteps-form__progress">
          <button class="multisteps-form__progress-btn js-active" type="button" title="Evènement">
            <span>Evènement</span>
          </button>
          <button class="multisteps-form__progress-btn" type="button" title="Hôtes">Hôtes</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-8 m-auto">
        <form wire:submit.prevent="updateEvent" action="#" method="POST" class="multisteps-form__form " style="height: 500px;" asp-action="Create">
          <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
            <h5 class="font-weight-bolder mb-0">Evènement</h5>
            <p class="mb-0 text-sm">Modification de l'évènement</p>
            <div class="row mt-3">
              <div class="col-12 col-sm-6">
                <label for="Nom" class="control-label">Nom</label>
                <input type="text" class="form-control @error('Nom') border border-danger  @enderror" wire:model="Nom" autofocus />
                @error('Nom') <div class="text-danger">{{ $message }}</div> @enderror
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <label for="Date" class="control-label">Date</label>
                <input type="date" class="form-control @error('Date') border border-danger  @enderror" wire:model="Date" />
                @error('Date') <div class="text-danger">{{ $message }}</div> @enderror
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12 col-sm-3">
                <label for="HeureEvenement" class="control-label">Heure de l'évènement</label>
                <input type="time" class="form-control @error('HeureEvenement') border border-danger  @enderror" wire:model="HeureEvenement" />
                @error('HeureEvenement') <div class="text-danger">{{ $message }}</div> @enderror
              </div>
              <div class="col-12 col-sm-3">
                <label for="HeureFinEvenement" class="control-label">Heure de fin</label>
                <input type="time" class="form-control @error('HeureFinEvenement') border border-danger  @enderror" wire:model="HeureFinEvenement" />
                @error('HeureFinEvenement') <div class="text-danger">{{ $message }}</div> @enderror
              </div>
              <div class="col-12 col-sm-3 mt-3 mt-sm-0">
                <label for="HeureArrive" class="control-label">Heure d'arrivé</label>
                <input type="time" class="form-control @error('HeureArrive') border border-danger  @enderror" wire:model="HeureArrive" />
                @error('HeureArrive') <div class="text-danger">{{ $message }}</div> @enderror
              </div>
              <div class="col-12 col-sm-3 mt-3 mt-sm-0">
                <label for="type_event" class="control-label">Type d'évènement</label>
                <select class="multisteps-form__select form-control" id="type_event" style="background-color: white" wire:model="type_event">
                  <option value="Basique">Basique</option>
                  <option value="Stade">Stade</option>
                  <option value="FDL">FDL</option>
                </select>
              </div>
            </div>
            <div class="button-row d-flex mt-4">
              <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit" title="Suivant">Modifier</button>
            </div>
          </div>
        </form>
        <div class="col-12">
          <a href="{{ route('events.index') }}" class="btn btn-default" type="button"><i class="fas fa-arrow-left mr-2"></i> Retour</a>
        </div>
      </div>
    </div>
  </div>
</div>
