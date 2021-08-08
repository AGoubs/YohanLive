<div>
  @if ($event)
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12 col-lg-12 m-auto mb-4">
        <div class="card p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
          <h5 class="font-weight-bolder mb-0">Évènement</h5>
          <div class="row mt-3">
            <div class="col-12 col-sm-6">
              <label for="Nom" class="control-label">Nom</label>
              <input type="text" class="form-control" value="{{ $event->Nom }}" disabled />
            </div>
            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
              <label for="Date" class="control-label">Date</label>
              <input type="text" class="form-control" value="{{ $event->Date }}" disabled />
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 col-sm-6">
              <label for="HeureEvenement" class="control-label">Heure de l'évènement</label>
              <input type="text" class="form-control" value="{{ date('H:i', strtotime($event->HeureEvenement)) }}"
                disabled />
            </div>
            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
              <label for="HeureArrive" class="control-label">Heure d'arrivé</label>
              <input type="text" class="form-control" value="{{ date('H:i', strtotime($event->HeureArrive)) }}"
                disabled />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-lg-12 m-auto mb-4">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
              <div>
                <h5 class="mb-0">Test</h5>
              </div>
              <span class="badge badge-success">{{$typeEvenement}}</span>
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    @foreach ($tableField as $item)
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      {{$item}}
                    </th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach ($hosts as $listHosts)
                  <tr wire:click="changeArrived({{$listHosts['id']}})" style="cursor: pointer">
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
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <button onclick="history.back()" class="btn btn-default"><i class="fas fa-arrow-left"></i>
          Retour</button>
      </div>
    </div>
  </div>
</div>
</div>

@else
<div class="container-fluid py-4">
  <h2>Pas d'évènement aujourd'hui</h2>
</div>
@endif
</div>