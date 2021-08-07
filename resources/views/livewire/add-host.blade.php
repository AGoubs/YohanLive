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

    <div class="row">
        <div class="tab-content">
            <div class="tab-pane active" id="_Basique">
                <!-- Call partial view to load initial page load data -->
                <partial name="_Basique" />
            </div>
            <div class="tab-pane fade" id="_Stade">
                <partial name="_Stade" />
            </div>
            <div class="tab-pane fade" id="_Fdl">
                <partial name="_Fdl" />
            </div>
        </div>
        <form asp-controller="Events" asp-action="ImportNewCsv">
            <div class="button-row d-flex mt-4 float-right">
                <button class="btn bg-gradient-dark ms-auto mb-0">Suivant</button>
            </div>
        </form>
    </div>
</div>
