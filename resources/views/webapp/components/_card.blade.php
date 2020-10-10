<div class="card card-items border-left border-primary" role="button" onclick="window.location='{{ route('app.content',[$scheduleActivity->id,$content->id]) }}'">
  <div class="card-horizontal">
    {{-- <div class="img-square-wrapper">
      <img class="img-responsive " width="150px" height="150px" src="http://via.placeholder.com/300x150"  alt="Card image cap">
    </div> --}}
    <div class="card-body">
      <h5 class="card-title">
        {{-- <i class="fa fa-star text-warning"></i> --}}
        <span class="fa-stack" style="margin: -2px !important;">
          <span class="fa fa-star fa-stack-2x text-warning"></span>
          <strong class="fa-stack-1x text-white">{{ $content->position }}</strong>
        </span>
        {{ $content->name }}</h5>
      <p class="card-text">{!! $content->objective !!}</p>
    </div>
  </div>
</div>
