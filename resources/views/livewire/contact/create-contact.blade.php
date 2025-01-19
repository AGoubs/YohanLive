<div>
  <livewire:contact.layout :eventId="$eventId">
    <div class="row mx-2 mt-n7">
      <div class="col-12 col-lg-12 m-auto mb-4">
        <div class="card mb-4">
          <div class="card-header">
            <div class="d-flex flex-row justify-content-between">
              <div>
                <h5 class="mb-0">{{ $event->Nom }}</h5>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2 mx-3">
            <form wire:submit.prevent="submit(Object.fromEntries(new FormData($event.target)))">
              @foreach ($fields as $field)
                @if ($field['type'] == 'checkbox')
                  <div class="row mt-4">
                    <div class="col-1">
                      <div class="form-check">
                        <input type="hidden" name="{{ $field['name'] }}" value="off">
                        <input class="form-check-input" type="checkbox" name="{{ $field['name'] }}" id="{{ $field['name'] }}">
                        <label class="form-check-label" for="{{ $field['name'] }}">
                          {{ $field['name'] }}
                        </label>
                      </div>
                    </div>
                  </div>
                @else
                  <div class="row mt-2">
                    <div class="col-12">
                      <label class="control-label">{{ $field['name'] }}</label>
                      <input type="{{ $field['type'] }}" class="form-control" name="{{ $field['name'] }}" required="{{ $field['required'] }}" />
                    </div>
                  </div>
                @endif
              @endforeach
              <div class="button-row d-flex mt-3">
                <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit" title="Valider">Valider</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <livewire:contact.footer>
</div>

<script>
  document.addEventListener('livewire:load', function() {
    @this.uniqueId = getMachineId();
  })

  function getMachineId() {

    let machineId = localStorage.getItem('MachineId');

    if (!machineId) {
      machineId = Math.random().toString(16).slice(2);
      localStorage.setItem('MachineId', machineId);
    }
    return machineId;
  }
</script>
