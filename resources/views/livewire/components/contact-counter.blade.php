<div>
  <div class="row">
    <div class="col-10 col-md-8 col-lg-6 my-2 z-index-2 border-radius-xl mx-auto py-1 blur shadow-blur">
      <div class="row">
        <div class="col-md-6 position-relative">
          <div class="p-1 text-center">
            <h2 class="text-gradient text-dark">
              @if ($day)
                <span id="select">{{ $day }}</span>
              @else
                <span id="select">0</span>
              @endif
            </h2>
            <p class="mb-1">Contact date sélectionnée</p>
          </div>
          <hr class="vertical dark">
        </div>
        <div class="col-md-6 position-relative">
          <div class="p-1 text-center">
            <h2 class="text-gradient text-dark">
              @if ($total)
                <span id="select">{{ $total }}</span>
              @else
                <span id="select">0</span>
              @endif
            </h2>
            <p class="mb-1">Contact sur l'évènement</p>
          </div>
          <hr class="vertical dark">
        </div>
      </div>
    </div>
  </div>
</div>
