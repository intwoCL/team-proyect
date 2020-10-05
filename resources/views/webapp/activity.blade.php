@extends('webapp.components.skeleton')
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
@section('app')


<div class="main-wrapper container">
  <div class="navbar-bg" style="height: 75px !important;"></div>

  <div class="" style="padding-top: 100px !important;">
    {{-- <section class="section container"> --}}
      {{-- <div class="section-body"> --}}
        {{-- <img class="img-responsive rounded" width="100%" height="150" src="http://via.placeholder.com/300x150"  alt="Card image cap"> --}}
      {{-- </div> --}}
    {{-- </section> --}}
    <div class="container py-4">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
          <div class="card card-items" role="button">
            <div class="card-horizontal">
              <div class="img-square-wrapper">
                <img class="img-responsive " width="150px" height="150px" src="http://via.placeholder.com/300x150"  alt="Card image cap">
              </div>
              <div class="card-body">
                <h6 class="card-title">asdasdasd<i class="fa fa-"></i></h6>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam minus ea deserunt soluta assumenda debitis aliquid, officia quis? Ex molestias at excepturi recusandae eos ut veniam nisi? Dicta, consectetur sequi.</p>
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



  <footer class="main-footer">
    <div class="footer-left">
      {{-- Copyright &copy; 2018 <div class="bullet"></div> --}}
    </div>
    <div class="footer-right">
      {{-- 0.1.1 --}}
    </div>
  </footer>
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


  function activityShow(id){
    // alert('Error ' + id);
    // window.location.href = "{{ route('app.item') }}";
  }
</script>
@endpush