<div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 col-lg-12 m-auto mb-4">
                @if ($event)
                <div class="card p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                    <h5 class="font-weight-bolder mb-0">Évènement</h5>
                    <p class="mb-0 text-sm">Évènement du jour</p>
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
                            <input type="text" class="form-control"
                                value="{{ date('H:i', strtotime($event->HeureEvenement)) }}" disabled />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <label for="HeureArrive" class="control-label">Heure d'arrivé</label>
                            <input type="text" class="form-control"
                                value="{{ date('H:i', strtotime($event->HeureArrive)) }}" disabled />
                        </div>
                    </div>
                </div>
                @else
                <h2>Pas d'évènement aujourd'hui</h2>
                @endif
                
            </div>
            <div class="col-12">
                <button onclick="history.back()" class="btn btn-default"><i class="fas fa-arrow-left mr-2"></i>
                    Retour</button>
            </div>
        </div>
    </div>
</div>
