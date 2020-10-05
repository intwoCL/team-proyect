<div class="card card-items" role="button" onclick="window.location='{{ route('app.content',$content->id) }}'">
  <div class="card-horizontal">
    {{-- <div class="img-square-wrapper">
      <img class="img-responsive " width="150px" height="150px" src="http://via.placeholder.com/300x150"  alt="Card image cap">
    </div> --}}
    <div class="card-body">
      <h6 class="card-title">{{ $content->name }}<i class="fa fa-"></i></h6>
      <p class="card-text">{!! $content->objective !!}</p>
    </div>
  </div>
</div>
