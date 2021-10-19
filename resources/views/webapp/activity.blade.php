@extends('webapp.components.app')
@push('stylesheet')

<style>
  .card-horizontal {
    display: flex;
    flex: 1 1 auto;
  }
  .card-items-shadow {
    box-shadow: 2px 2px 2px #716f6f !important;
  }
</style>
@endpush
@section('content')


<div class="main-wrapper container">
  <div class="navbar-bg" style="height: 75px !important;"></div>

  <div class="" style="padding-top: 100px !important;">
    {{-- <section class="section container"> --}}
      {{-- <div class="section-body"> --}}
        {{-- <img class="img-responsive rounded" width="100%" height="150" src="http://via.placeholder.com/300x150"  alt="Card image cap"> --}}
      {{-- </div> --}}
    {{-- </section> --}}
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
          <article class="article article-style-b">
            <div class="article-header">
              <div class="article-image" data-background="{{  $activity->present()->getPhoto()  }}" style="background-image: url('{{  $activity->present()->getPhoto() }}');">
              </div>
              <div class="article-badge">
                <div class="article-badge-item bg-info"><i class="fas fa-history"></i>{{ $scheduleActivity->times }} veces</div>
              </div>
            </div>
            <div class="article-details">
              <div class="article-title">
                <h2><a href="#">{{ $activity->name}}</a></h2>
              </div>
              <p>{!! $activity->objective !!}</p>
              <div class="article-body">
                @foreach ($activity->tagsCategories as $c)
                <div class="badge badge-success mt-2"><i class="fas fa-chevron-right"></i> {{ $c->category->name }}</div>
                @endforeach
              </div>
            </div>
          </article>

          <div class="card card-items border-left border-primary" role="button" >
            <div class="card-horizontal">
              {{-- <div class="img-square-wrapper">
                <img class="img-responsive " width="150px" height="150px" src="http://via.placeholder.com/300x150"  alt="Card image cap">
              </div> --}}
              <div class="card-body">
                <h5 class="card-title">
                  {{-- <i class="fa fa-star text-warning"></i> --}}
                  <span class="fa-stack" style="margin: -2px !important;">
                    <span class="fa fa-question-circle fa-stack-2x text-primary"></span>
                    <strong class="fa-stack-1x"></strong>
                  </span>
                  Evaluacion Diaria
                  </h5>
                <p class="card-text"></p>
              </div>
            </div>
          </div>

        </div>
        <div class="col-sm-12 col-md-12 col-lg-6">
          @foreach ($activity->contents as $content)
          @include('webapp.components._card')
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('footerNav')
{{-- @include('webapp.navbar.top') --}}
@include('webapp.components.bottom')
@endpush
@push('javascript')
<script>
  $(document).ready(function() {
    $(".card-items").hover(
      function() {
        $(this).addClass('card-items-shadow').css('cursor', 'pointer');
      }, function() {
        $(this).removeClass('card-items-shadow');
      }
    );
    value(swiper);
  });
</script>
@endpush
