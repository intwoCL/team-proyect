{{-- <div class="col-md-4">
  <div class="card card-items" role="button" onclick=" window.location='{{ route('app.activity',$a->id) }}'">
    <div class="card-horizontal">
      <div class="img-square-wrapper">
        <img class="img-responsive " width="150px" height="150px" src="{{ $a->present()->getPhoto() }}"  alt="Card image cap">
      </div>
      <div class="card-body row">
        <h6 class="card-title">{{ $a->name }}<i class="fa fa-"></i></h6>
        <p class="card-text">Some quick example text to build on the card </p>
      </div>
    </div>
  </div>
</div> --}}

<div class="col-md-4">
  <div class="card card-items" role="button" onclick=" window.location='{{ route('app.item') }}'">
    <div class="card-horizontal">
      <div class="img-square-wrapper">
        <img class="img-responsive " width="150px" height="150px" src="http://via.placeholder.com/300x150"  alt="Card image cap">
      </div>
      <div class="card-body row">
        <h6 class="card-title">Titulo<i class="fa fa-"></i></h6>
        <p class="card-text">Some quick example text to build on the card </p>
      </div>
    </div>
  </div>
</div>

