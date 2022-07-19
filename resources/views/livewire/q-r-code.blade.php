<div>
  <div class="row mx-2 mt-2">
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
          <div id="video-container">
            <video id="qr-video" style="width: 100%;border-radius: 0.5rem;"></video>
            <span id="cam-qr-result">None</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="module">
  import QrScanner from "../../../assets/js/plugins/qr-scanner.min.js";
  document.addEventListener('livewire:load', function() {

    const video = document.getElementById('qr-video');
    const videoContainer = document.getElementById('video-container');
    const camQrResult = document.getElementById('cam-qr-result');
    let state = false;

    function setResult(label, result) {
      @this.addUserInEvent(result.data);
      console.log(result.data);
      label.textContent = result.data;
      label.style.color = 'teal';
    }

    // ####### Web Cam Scanning #######

    const scanner = new QrScanner(video, result => setResult(camQrResult, result), {
      onDecodeError: error => {
        camQrResult.textContent = error;
        camQrResult.style.color = 'inherit';
      },
      highlightScanRegion: true,
      highlightCodeOutline: true,
    });
    scanner.start();
  })
</script>
