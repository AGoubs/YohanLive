<div>
  <header class="header-2">
    <div class="page-header min-vh-40 relative  bg-gray-100" style="background-image: url('{{asset("assets/img/curved-images/curved1.jpg")}}')">
      <span class="mask bg-danger"></span>
      <div class="container">
        <div class="row">
          <div class="col-lg-7 text-center mx-auto">
            {{-- <h1 class="text-white pt-3 mt-n7"><img src="https://www.pngkey.com/png/detail/277-2779397_toggle-navigation-honda-motorcycle-logo-white.png" alt="" width="350"></h1> --}}
            <h1 class="text-white pt-3 mt-n7"><img src="{{asset("assets/img/event-header/honda.png")}}" alt="" width="250"></h1>
          </div>
        </div>
      </div>
      <div class="position-absolute w-100  bottom-0">
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
          viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
          <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
          </defs>
          <g class="moving-waves">
            <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(248,249,250,0.40"></use>
            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(248,249,250,0.35)"></use>
            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(248,249,250,0.25)"></use>
            <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(248,249,250,0.20)"></use>
            <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(248,249,250,0.15)"></use>
            <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(248,249,250,1"></use>
          </g>
        </svg>
      </div>
    </div>
  </header>
  {{-- <section class="pt-3 pb-4" id="count-stats">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 z-index-2 border-radius-xl mt-n8 mx-auto py-3 blur shadow-blur" style="height: 130px">
          <div class="row">
            <div class="col-md-4 position-relative">
              <div class="text-center">
                <h1 class="text-gradient text-danger"><span id="state1" countto="280">280</span></h1>
                <h5 >Attendus</h5>
              </div>
              <hr class="vertical dark">
            </div>
            <div class="col-md-4 position-relative">
              <div class="text-center">
                <h1 class="text-gradient text-danger"> <span id="state2" countto="235">235</span></h1>
                <h5 >Arrivés</h5>
              </div>
              <hr class="vertical dark">
            </div>
            <div class="col-md-4">
              <div class="text-center">
                <h1 class="text-gradient text-danger" id="state3" countto="45">45</h1>
                <h5 >Restants</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <div class="mx-4 mt-n7">
    <livewire:components.tables.contact :eventId="$eventId">
  </div>
  <div class="col-12 mx-4">
    <button onclick="history.back()" class="btn btn-default"><i class="fas fa-arrow-left mr-2"></i>
      Retour</button>
  </div>

</div>
