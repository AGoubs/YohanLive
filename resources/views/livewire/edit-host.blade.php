<div>
  <div class="row">
    <div class="col-12 col-lg-8 m-auto my-5">
      <form wire:submit.prevent="submit" action="#" method="POST" class="multisteps-form__form " style="height: 650px;">
        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
          <h5 class="font-weight-bolder mb-0">{{ $text }}</h5>
          <input type="hidden" wire:model="host.id">
          <div class="row mt-3">
            <div class="col-12 col-sm-6">
              <label for="Nom" class="control-label">Nom</label>
              <input type="text" class="form-control @error('host.nom') is-invalid  @enderror" wire:model="host.nom"
                autofocus />
              @error('host.nom') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
              <label for="prenom" class="control-label">Prénom</label>
              <input type="text" class="form-control @error('host.prenom') is-invalid @enderror"
                wire:model="host.prenom" />
              @error('host.prenom') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 col-sm-6">
              <label for="fonction" class="control-label">Fonction</label>
              <input type="text" class="form-control @error('host.fonction') is-invalid  @enderror"
                wire:model="host.fonction" autofocus />
              @error('host.fonction') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
              <label for="telephone" class="control-label">Téléphone</label>
              <input type="text" class="form-control @error('host.telephone') is-invalid @enderror"
                wire:model="host.telephone" />
              @error('host.telephone') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 col-sm-3">
              <label for="numero_ipad" class="control-label">Numéro Ipad</label>
              <input type="text" class="form-control @error('host.numero_ipad') is-invalid  @enderror"
                wire:model="host.numero_ipad" autofocus />
              @error('host.numero_ipad') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-12 col-sm-3 mt-3 mt-sm-0">
              <label for="lieu" class="control-label">Lieu</label>
              <input type="text" class="form-control @error('host.lieu') is-invalid @enderror" wire:model="host.lieu" />
              @error('host.lieu') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-12 col-sm-3">
              <label for="point" class="control-label">Point</label>
              <input type="text" class="form-control @error('host.point') is-invalid  @enderror" wire:model="host.point"
                autofocus />
              @error('host.point') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-12 col-sm-3 mt-3 mt-sm-0">
              <label for="porte" class="control-label">Porte</label>
              <input type="text" class="form-control @error('host.porte') is-invalid @enderror"
                wire:model="host.porte" />
              @error('host.porte') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 col-sm-12">
              <label for="commentaire" class="control-label">Commentaire</label>
              <textarea name="commentaire" id="commentaire"
                class="form-control @error('host.commentaire') is-invalid @enderror" cols="30" rows="5"
                wire:model="host.commentaire"></textarea>
              @error('host.commentaire') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
          </div>
          <div class="form-check form-switch mt-3">
            <input wire:model="host.is_arrived" class="form-check-input" type="checkbox" id="is_arrived">
            <label class="form-check-label" for="is_arrived">Arrivé ?</label>
          </div>
          <div class="button-row d-flex">
            <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit" title="Valider">Valider</button>
          </div>
        </div>
      </form>
      <div class="col-12">
        <button onclick="history.back()" class="btn btn-default"><i class="fas fa-arrow-left mr-2"></i>
          Retour</button>
      </div>
    </div>
  </div>
</div>
