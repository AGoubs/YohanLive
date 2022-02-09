<div>

  <livewire:contact.layout :eventId="$eventId">
    <div class="mt-n7">
      <livewire:components.tables.contact :eventId="$eventId">
    </div>
    <livewire:components.host-fixed-plugin :eventId="$eventId">
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
