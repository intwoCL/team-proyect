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
                <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> 10 veces</div>
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
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6">
          @foreach ($activity->contents as $content)
            @include('webapp.components._card')
          @endforeach
        </div>
      </div>
    </div>
  </div>



  {{-- <footer class="main-footer"> --}}
    {{-- <div class="footer-left"> --}}
      {{-- Copyright &copy; 2018 <div class="bullet"></div> --}}
    {{-- </div> --}}
    {{-- <div class="footer-right"> --}}
      {{-- 0.1.1 --}}
    {{-- </div> --}}
  {{-- </footer> --}}
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