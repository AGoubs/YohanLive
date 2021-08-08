<div>
  <form wire:submit.prevent="submit">
    <div class="row justify-content-center my-4">
      <div class="col-md-3 col-sm-8">
        <div class="form-group">
          <input type="file" wire:model="file" class="form-control  @error('file') is-invalid @enderror" />
          @error('file')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
      </div>
      <div class="col-md-2 col-sm-6">
        <div class="form-group">
          <button type="submit" class="form-control"
            >Valider</button>          
        </div>
      </div>
    </div>
  </form>
</div>