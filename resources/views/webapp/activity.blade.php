@extends('webapp.components.skeleton')
@push('stylesheet')

<style>
  .card-horizontal {
    display: flex;
    flex: 1 1 auto;
  }
  .card-items-shadow {
    box-shadow: 2px 1px 2px #716f6f !important;
  }
</style>
@endpush
@section('app')
<div class="main-wrapper container">
  <div class="navbar-bg" style="height: 75px !important;"></div>

  <div class="" style="padding-top: 20px !important;">
    <section class="section container">
      <div class="section-body">
        <img class="img-responsive rounded" width="100%" height="150" src="http://via.placeholder.com/300x150"  alt="Card image cap">
      </div>
    </section>
    <div class="container py-4">
      <div class="row">
        @for ($i=0; $i < 5; $i++)
          @include('webapp.components._card')
        @endfor
      </div>
    </div>
  </div>



  <footer class="main-footer">
    <div class="footer-left">
      Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
    </div>
    <div class="footer-right">
      2.3.0
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
    window.location.href = "{{ route('item') }}";
  }
</script>
@endpush