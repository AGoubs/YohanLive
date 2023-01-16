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
                  <label class="control-label">Téléphone <span class="text-danger">*</span></label>
                  <input type="text" required class="form-control @error('contact.phone') is-invalid @enderror" wire:model.defer="contact.phone" />
                  @error('contact.phone')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                  <label class="control-label">Email <span class="text-danger">*</span></label>
                  <input type="email" required class="form-control @error('contact.email') is-invalid @enderror" wire:model.defer="contact.email" />
                  @error('contact.email')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12 col-sm-12">
                  <label class="control-label">Société</label>
                  <input type="text" class="form-control @error('contact.company') is-invalid @enderror" wire:model.defer="contact.company" />
                  @error('contact.company')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12 col-sm-6">
                  <label class="control-label">Rendez-vous le</label>
                  <input type="date" class="form-control @error('contact.date_appointment') is-invalid @enderror" wire:model.defer="contact.date_appointment" />
                  @error('contact.date_appointment')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12 col-sm-6">
                  <label class="control-label">Avec</label>
                  <select name="user_appointment" style="background-color:#fff" class="form-control @error('contact.user_appointment') is-invalid @enderror" id="user_appointment" wire:model.defer="contact.user_appointment">
                    <option value="" selected></option>
                    <option value="Diaz gregoire">Diaz gregoire</option>
                    <option value="Pottier eric">Pottier eric</option>
                    <option value="Jadoux claude">Jadoux claude</option>
                    <option value="Omri karim">Omri karim</option>
                    <option value="Omri brahim">Omri brahim</option>
                  </select>
                  @error('contact.user_appointment')
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
