<div>
    <div class="row">
        <div class="col-12 col-lg-8 m-auto my-5">
            <form wire:submit.prevent="updateEvent" action="#" method="POST" class="multisteps-form__form "
                style="height: 500px;" asp-action="Create">
                <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                    data-animation="FadeIn">
                    <h5 class="font-weight-bolder mb-0">Evènement</h5>
                    <p class="mb-0 text-sm">Modification de l'évènement</p>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label for="Nom" class="control-label">Nom</label>
                            <input type="text" class="form-control @error('Nom') border border-danger  @enderror"
                                wire:model="Nom" autofocus />
                            @error('Nom') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <label for="Date" class="control-label">Date</label>
                            <input type="date" class="form-control @error('Date') border border-danger  @enderror"
                                wire:model="Date" />
                            @error('Date') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label for="HeureEvenement" class="control-label">Heure de l'évènement</label>
                            <input type="time"
                                class="form-control @error('HeureEvenement') border border-danger  @enderror"
                                wire:model="HeureEvenement" />
                            @error('HeureEvenement') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <label for="HeureArrive" class="control-label">Heure d'arrivé</label>
                            <input type="time"
                                class="form-control @error('HeureArrive') border border-danger  @enderror"
                                wire:model="HeureArrive" />
                            @error('HeureArrive') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit"
                            title="Suivant">Modifier</button>
                    </div>
                </div>
            </form>
            <div class="col-12">
                <button onclick="history.back()" class="btn btn-default"><i class="fas fa-arrow-left mr-2"></i>
                    Retour</button>
            </div>
        </div>
    </div>
</div>
