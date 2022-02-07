<div>
  <div class="container-fluid py-4">
    <div class="row d-none d-lg-block">
      <div class="col-12 col-lg-8 mx-auto my-5">
        <div class="multisteps-form__progress">
          <button class="multisteps-form__progress-btn js-active" type="button" title="Evènement">
            <span>Evènement</span>
          </button>
          <button class="multisteps-form__progress-btn js-active" type="button" title="Customisation">Customisation</button>
          <button class="multisteps-form__progress-btn" type="button" title="Utilisateurs">Utilisateurs</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-8 m-auto">
        <form wire:submit.prevent="updateEvent" action="#" method="POST">
          <div class="card p-3 mb-4 border-radius-xl bg-white" data-animation="FadeIn">
            <h5 class="font-weight-bolder mb-0">Evènement</h5>
            <p class="mb-0 text-sm">Informations de l'évènement</p>
            <div class="row mt-3">
              <div class="col-12 col-sm-12">
                <label for="exampleColorInput" class="form-label">Couleur de l'entête</label>
                <input type="color" class="form-control form-control-color" id="exampleColorInput" value="{{ $Couleur }}" title="Choisir votre couleur" wire:model="Couleur">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12 col-sm-12">
                <label for="exampleColorInput" class="form-label">Couleur de l'entête</label>
                <div class="form-group">
                  <input type="file" class="form-control" wire:model="Logo">
                  @error('Logo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12 col-sm-12">
                <label for="customRange1" class="form-label">Taille du logo</label>
                <input type="range" class="form-range" min="100" max="600" wire:model="LogoSize">
              </div>
            </div>
            <div class="button-row d-flex mt-4">
              <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit" title="Suivant">Suivant</button>
            </div>
        </form>
      </div>
      Prévisualisation de l'entête
      <div>
        <header class="header-2">
          <div class="page-header min-vh-40 relative  bg-gray-100" style="background-image: url('{{ asset('assets/img/curved-images/curved1.jpg') }}')">
            <span class="mask" style="background-color:  {{ $Couleur }}"></span>
            <div class="container">
              <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                  @if ($Logo)
                    <h1 class="text-white pt-3 mt-n7"><img src="{{ $Logo->temporaryUrl() }}" alt="" width="{{ $LogoSize }}"></h1>
                  @endif
                </div>
              </div>
            </div>
            <div class="position-absolute w-100  bottom-0">
              <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                  <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                </defs>
                <g class="moving-waves">
                  <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(248,249,250,0.40"></use>
                  <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(248,249,250,0.35)"></use>
                  <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(248,249,250,0.25)"></use>
                  <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(248,249,250,0.20)"></use>
                  <use xlink:href="#gentle-wave" x="48" y="9" fill="rgba(248,249,250,0.15)"></use>
                  <use xlink:href="#gentle-wave" x="48" y="11" fill="rgba(248,249,250,1"></use>
                </g>
              </svg>
            </div>
          </div>
        </header>
      </div>

      <div class="col-12">
        <a href="{{ route('events.edit', $eventId) }}" class="btn btn-default"><i class="fas fa-arrow-left mr-2"></i>Retour</a>
      </div>
    </div>
  </div>
</div>
