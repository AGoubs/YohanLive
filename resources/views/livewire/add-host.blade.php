<div>
  <div class="row">
    <div class="col-12 col-lg-8 mx-auto my-5">
      <div class="multisteps-form__progress">
        <button class="multisteps-form__progress-btn js-active" type="button" title="Evènement">
          <span>Evènement</span>
        </button>
        <button class="multisteps-form__progress-btn js-active" type="button" title="Hôtes">Hôtes</button>
      </div>
    </div>
  </div>

  <form asp-controller="Events" asp-action="ImportHost" method="post" enctype="multipart/form-data">
    <input type="hidden" asp-for="Event.Id" name="eventId" />
    <div class="row justify-content-center my-4">
      <div class="col-md-3">
        <div class="form-group">
          <input type="file" name="file" class="form-control" />
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <button type="submit" class="form-control">Valider</button>
        </div>
      </div>
    </div>
  </form>



  <div class="row mt-4">
    <div class="col-12">
      <div class="card mb-4 mx-4">
        <div class="card-header pb-0">
          <div class="d-flex flex-row justify-content-between">
            <div>
              <h5 class="mb-0">{{$tableType}}</h5>
            </div>
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Type d'évènement
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li>
                  <a class="dropdown-item" href="#" wire:click="changeTableType('Basique')">Basique</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#" wire:click="changeTableType('Stade')">Stade</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#" wire:click="changeTableType('FDL')">FDL</a>
                </li>
              </ul>
            </div>
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

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>