<div>
  <div class="container-fluid">
    <div class="page-header min-height-200 border-radius-xl mt-4"
      style="background-image: url('{{ asset("assets/img/curved-images/curved0.jpg") }}'); background-position-y: 50%;">
      <span class="mask bg-gradient-dark opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="{{asset("assets/img/user-placeholder.png")}}" alt="..." class="w-100 border-radius-lg shadow-sm">

          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              {{ $user->name }}
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
              {{ $user->email }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid py-4">
    <div class="card">
      <div class="card-header pb-0 px-3">
        <h6 class="mb-0">{{ __('Information du profile') }}</h6>
      </div>
      <div class="card-body pt-4 p-3">
        @if ($showSuccesNotification)
          <div wire:model="showSuccesNotification" class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
            <span class="alert-text text-white">{{ __('Profile sauvegardé avec succès !') }}</span>
            <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close"
              data-bs-dismiss="alert" aria-label="Close">
            </button>
          </div>
        @endif

        <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="name" class="form-control-label">{{ __('Nom complet') }}</label>
                <input wire:model="user.name" class="form-control @error('user.name') is-invalid @enderror" type="text"
                  placeholder="Michel Dubois" id="name">
                @error('user.name') <div class="text-danger">{{ $message }}</div> @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                <input wire:model="user.email" class="form-control @error('user.email') is-invalid @enderror"
                  type="email" placeholder="@exemple.com" id="user-email" pattern="\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b">
                @error('user.email') <div class="text-danger">{{ $message }}</div> @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="user-password" class="form-control-label">{{ __('Mot de passe') }}</label>
                <input wire:model="user.password" class="form-control @error('user.password') is-invalid @enderror"
                  type="password" placeholder="******" id="user-password">
                @error('user.password') <div class="text-danger">{{ $message }}</div> @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="user.phone" class="form-control-label">{{ __('Téléphone') }}</label>
                <input wire:model="user.phone" class="form-control @error('user.phone') is-invalid @enderror" type="tel"
                  placeholder="0601020304" id="phone">
                @error('user.phone') <div class="text-danger">{{ $message }}</div> @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="user.location" class="form-control-label">{{ __('Lieu') }}</label>
                <input wire:model="user.location" class="form-control @error('user.location') is-invalid @enderror"
                  type="text" placeholder="Lyon" id="name">
                @error('user.location') <div class="text-danger">{{ $message }}</div> @enderror
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="about">{{ 'A propos' }}</label>
            <textarea wire:model="user.about" class="form-control @error('user.about') is-invalid @enderror" id="about"
              rows="3" placeholder="A propos"></textarea>
            @error('user.about') <div class="text-danger">{{ $message }}</div> @enderror
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Sauvegarder' }}</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
