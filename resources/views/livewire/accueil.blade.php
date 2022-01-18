<div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <h2>Bienvenue {{ $user }}</h2>
      </div>
    </div>
    @if ($todayEvent &&
    auth()->user()->isAdmin())
      <livewire:components.tables.today-event :todayEvent='$todayEvent' />
    @endif

    @if (auth()->user()->isAdmin())
      <div class="row mt-4">
        <div class="col-12">
          <livewire:components.events-table />
        </div>
        <div class="col-12">
          <livewire:components.users-table :users='$users' />
        </div>
      </div>

  </div>
</div>
@endif
