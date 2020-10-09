<section class="ml-2 mr-2 row">
  <div class="section-body">
    {{-- <div class="tex-center"> --}}
      <div class="card">
        <div class="card-header">
          <h4>{{ $content->name }}</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <h3 class="text-center">¿Tipo de instigación?</h3>
            </div>
            <div class="col-sm-12 COL-md-12 col-xs-12">
              <div class="btn-group mb-3 mt-2" role="group" aria-label="face group">
                <div class="mr-3">
                  <i class="fa fa-square fa-4x text-primary face" role="button"></i>
                  <p>Sin instigación</p>
                </div>
                <div class="mr-3">
                  <i class="fa fa-square fa-4x text-warning face" role="button"></i>
                  <p>Verbal</p>
                </div>
                <div class="mr-3">
                  <i class="fa fa-square fa-4x text-success face" role="button"></i>
                  <p>Moderado</p>
                </div>
                <div class="mr-3">
                  <i class="fa fa-square fa-4x text-danger face" role="button"></i>
                  <p>Física</p>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-xs-12 d-flex justify-content-center">
              <textarea name="comment" id="comment" class="form-control" cols="40" rows="5" style="width: 300px; height: auto;" placeholder="Deja acá tu comentario"></textarea>
            </div>
          </div>            
        </div>
        <div class="card-footer d-flex justify-content-around">
          {{-- <button class="btn btn-secondary">ATRAS</button> --}}
          <button class="btn btn-success">FINALIZAR</button>
        </div>
      </div>
    {{-- </div> --}}
  </div>
</section>