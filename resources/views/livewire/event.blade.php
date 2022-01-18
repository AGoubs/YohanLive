<div>
  <div class="row mt-4">
    <div class="col-12">
      <div class="mx-4">
        <livewire:components.events-table />
        <div class="d-flex flex-row justify-content-between">
          <div></div>
          <a onclick="confirm('Supprimer tous les évènements ? \nAttention, cette action n\'est pas réversible.') || event.stopImmediatePropagation()" wire:click="deleteAllEvent()" class="btn bg-gradient-danger btn-sm mx-4" type="button">Supprimer les
            évènements</a>
        </div>
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
<script src="../../assets/js/plugins/datatables.js"></script>
<script>
  const dataTableSearch = new simpleDatatables.DataTable("#table-events", {
    searchable: true,
    fixedHeight: true,
    perPage: 25,
  });
</script>
