<div>
  <div class="row">
    <div class="col-12 col-lg-12 m-auto mb-4">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="d-flex flex-row justify-content-between">
            <div>
              <h5 class="mb-0">Test</h5>
            </div>
            <span class="badge badge-secondary">{{$tableType->type_event}}</span>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Arrivé ?
                  </th>
                  @foreach ($tableFields as $item)
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    {{$item}}
                  </th>
                  @endforeach
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($hosts as $listHosts)
                <tr>
                  @foreach ($listHosts as $key => $value)
                  @if (isset($value) && $key != 'id')
                  @if ($key == "is_arrived")
                      @if ($value)
                      <td class="column1 text-center-responsive ps-4">
                        <span class="badge badge-sm badge-success">Oui</span>
                      </td>
                      @else
                      <td class="column1 text-center-responsive ps-4">
                        <span class="badge badge-sm badge-danger">Non</span>
                      </td>
                      @endif
                    @else
                    <td class="column1 text-center-responsive ps-4">
                      <p class="text-xs font-weight-bold mb-0">{{$value}}</p>
                    </td>
                    @endif
                  @endif
                  @endforeach
                  <td class="column5 text-center-responsive">
                    <a href="{{ route('modifier un évènement', $listHosts['id']) }}" class="mx-3"
                        data-bs-toggle="tooltip" data-bs-original-title="Editer l'évènement">
                        <i class="fas fa-user-edit text-secondary"></i>
                    </a>
                    <span>
                        <i class="cursor-pointer fas fa-trash text-secondary"
                            data-bs-toggle="tooltip"
                            data-bs-original-title="Supprimer l'hôte"
                            onclick="confirm('Supprimer cet hôte ?') || event.stopImmediatePropagation()"
                            wire:click="deleteHost({{$listHosts['id']}})"></i>
                    </span>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
