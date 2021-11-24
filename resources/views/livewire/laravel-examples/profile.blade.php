<div>
  <div class="container-fluid">
    <div class="page-header min-height-200 border-radius-xl mt-4"
      style="background-image: url({{ asset('assets/img/curved-images/curved0.jpg') }}); background-position-y: 50%;">
      <span class="mask bg-gradient-dark opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="{{ asset('assets/img/user-placeholder.png') }}" alt="..." class="w-100 border-radius-lg shadow-sm">
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
            <div class="col-md-6">
              <div class="form-group">
                <label for="user-name" class="form-control-label">{{ __('Nom complet') }}</label>
                <div class="@error('user.name')border border-danger rounded-3 @enderror">
                  <input wire:model="user.name" class="form-control" type="text" placeholder="Name" id="user-name">
                </div>
                @error('user.name') <div class="text-danger">{{ $message }}</div> @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                <div class="@error('user.email')border border-danger rounded-3 @enderror">
                  <input wire:model="user.email" class="form-control" type="email" placeholder="@example.com"
                    id="user-email">
                </div>
                @error('user.email') <div class="text-danger">{{ $message }}</div> @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="user.phone" class="form-control-label">{{ __('Téléphone') }}</label>
                <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                  <input wire:model="user.phone" class="form-control" type="tel" placeholder="40770888444" id="phone">
                </div>
                @error('user.phone') <div class="text-danger">{{ $message }}</div> @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="user.location" class="form-control-label">{{ __('Lieu') }}</label>
                <div class="@error('user.location') border border-danger rounded-3 @enderror">
                  <input wire:model="user.location" class="form-control" type="text" placeholder="Location" id="name">
                </div>
                @error('user.location') <div class="text-danger">{{ $message }}</div> @enderror
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="about">{{ 'A propos' }}</label>
            <div class="@error('user.about')border border-danger rounded-3 @enderror">
              <textarea wire:model="user.about" class="form-control" id="about" rows="3"
                placeholder="Say something about yourself"></textarea>
            </div>
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
