<div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success mx-4" role="alert">
        <span class="text-white">{{ $message }}</span>
    </div>
    @endif

    @if ($message = Session::get('error'))
    <div class="alert alert-error mx-4" role="alert">
        <span class="text-white">{{ $message }}</span>
    </div>
    @endif

    @if ($message = Session::get('warning'))
    <div class="alert alert-warning mx-4" role="alert">
        <span class="text-white">{{ $message }}</span>
    </div>
    @endif

    @if ($message = Session::get('info'))
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">{{ $message }}</span>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">{{ $message }}</span>
    </div>
    @endif
</div>