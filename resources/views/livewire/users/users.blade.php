<div>
  <div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-12">
        <livewire:components.users-table :users='$users' :action="true"/>
      </div>
    </div>
  </div>
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
