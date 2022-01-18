<section>
  <div class="page-header align-items-start section-height-30 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 text-center mx-auto">
          <h1 class="text-white mb-2 mt-5">{{ __('Bienvenue !') }}</h1>
          <p class="text-lead text-white">
            {{ __('Application de gestion d\'hôtes pour des évènements') }}
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10 mb-10">
      <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
        <div class="card z-index-0">
          <div class="card-header text-center pb-0">
            <h5>{{ __('Se connecter') }}</h5>
          </div>
          <div class="card-body">
            <form wire:submit.prevent="login">
              <div class="mb-3">
                <label for="email">{{ __('Email') }}</label>
                <input wire:model="email" id="email" type="email" class="form-control @error('email') is-invalid  @enderror" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
              </div>
              <div class="mb-3">
                <label for="password">{{ __('Mot de passe') }}</label>
                <input wire:model="password" id="password" type="password" class="form-control @error('password') is-invalid  @enderror" placeholder="Mot de passe" aria-label="Mot de passe" aria-describedby="password-addon">
                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
              </div>
              <div class="form-check form-switch">
                <input wire:model="remember_me" class="form-check-input" type="checkbox" id="rememberMe">
                <label class="form-check-label" for="rememberMe">{{ __('Rester connecté') }}</label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 mt-4 mb-0">{{ __('Connexion') }}</button>
              </div>
              <p class="text-sm mt-4 mb-0 text-center">Mot de passe oublié ? <a href="{{ route('forgot-password') }}" class="text-dark font-weight-bolder">Cliquez ici</a></p>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
