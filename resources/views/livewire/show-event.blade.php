<div>
  @if ($event)
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 text-center">
          <h2>{{ $event->Nom }}</h2>
        </div>
        <livewire:components.contact-counter :eventId="$eventId">

          <div class="col-12 col-lg-12 m-auto mt-4">
            <livewire:components.tables.contact :eventId="$eventId">
              <div class="mx-3">
                <livewire:components.tables.users :eventId="$eventId" :users='$users' :assignButton="true">
              </div>
          </div>
      </div>
      <livewire:components.host-fixed-plugin :eventId="$eventId">

    </div>

  @else
    <div class="container-fluid py-4">
      <h2>Pas d'évènement aujourd'hui</h2>
    </div>
  @endif
</div>
<script>
  (function() {
    window.onpageshow = function(event) {
      if (event.persisted) {
        window.location.reload();
      }
    };
  })();
</script>
