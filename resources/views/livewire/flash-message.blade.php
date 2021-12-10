<div>
  @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
      <span class="text-white"><i class="ni ni-like-2"></i> {{ $message }}</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
    </div>
  @endif

  @if ($message = Session::get('error'))
    <div class="alert alert-error alert-dismissible fade show  mx-4" role="alert">
      <span class="text-white">{{ $message }}</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
    </div>
  @endif

  @if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-dismissible fade show  mx-4" role="alert">
      <span class="text-white">{{ $message }}</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
    </div>
  @endif

  @if ($message = Session::get('info'))
    <div class="alert alert-secondary alert-dismissible fade show  mx-4" role="alert">
      <span class="text-white">{{ $message }}</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
    </div>
  @endif

  @if ($errors->any())
    <div class="alert alert-secondary alert-dismissible fade show  mx-4" role="alert">
      <span class="text-white">{{ $message }}</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
    </div>
  @endif
</div>
