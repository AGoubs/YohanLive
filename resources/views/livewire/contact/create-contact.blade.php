<div>
  <livewire:contact.layout :eventId="$eventId">
    <div class="row mx-2 mt-n7">
      <div class="col-12 col-lg-12 m-auto mb-4">
        <div class="card mb-4">
          <div class="card-header">
            <div class="d-flex flex-row justify-content-between">
              <div>
                <h5 class="mb-0">{{ $event->Nom }}</h5>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2 mx-3">
            <form wire:submit.prevent="submit">
              <div class="row mt-3">
                <div class="col-12 col-sm-6">
                  <label class="control-label">Nom <span class="text-danger">*</span></label>
                  <input type="text" required class="form-control @error('contact.name') is-invalid @enderror" wire:model.defer="contact.name" autofocus />
                  @error('contact.name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                  <label class="control-label">Prénom <span class="text-danger">*</span></label>
                  <input type="text" required class="form-control @error('contact.firstname') is-invalid @enderror" wire:model.defer="contact.firstname" />
                  @error('contact.firstname')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12 col-sm-6">
                  <label class="control-label">Téléphone</label>
                  <input type="text" class="form-control @error('contact.phone') is-invalid @enderror" wire:model.defer="contact.phone" />
                  @error('contact.phone')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                  <label class="control-label">Email</label>
                  <input type="email" class="form-control @error('contact.email') is-invalid @enderror" wire:model.defer="contact.email" />
                  @error('contact.email')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12 col-sm-12">
                  <label class="control-label">Model Actuel</label>
                  <input type="text" class="form-control @error('contact.model') is-invalid @enderror" wire:model.defer="contact.model" />
                  @error('contact.model')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12 col-sm-12">
                  <label for="commentaire" class="control-label">Commentaire</label>
                  <textarea name="commentaire" id="commentaire" class="form-control @error('contact.comment') is-invalid @enderror" cols="30" rows="5" wire:model.defer="contact.comment"></textarea>
                  @error('contact.comment')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="button-row d-flex mt-3">
                <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit" title="Valider">Valider</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <livewire:contact.footer>
</div>
