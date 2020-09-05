@extends('webapp.components.skeleton')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/swiper/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="/vendor/swiper/css/swiper-bundle.min.css">
  <style>
    body{
      background: #fff !important;
    }

    .card{
      box-shadow: none !important;
    }
    /* .swiper-container {
      width: 100%;
      height: 100%;
    } */

    /* .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    } */
  </style>
@endpush
@section('app')
<div class="main-wrapper container" style="margin-top: 10px;">
  <div class="section">
    <div class="swiper-container swiper-slider" data-pagination-type='progress' style="margin-top: 10px;">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="section-body">
            <div class="row">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group text-left">
                      <h4 class="text-primary">Gestiona tu consultas. </h4>
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident voluptate</p>
                    </div>
                    <div class="form-group">
                      <img src="https://media1.tenor.com/images/835acf77e062715142852d6422c55b9c/tenor.gif?itemid=14752693" class="img img-responsive" width="100%" height="250px" alt="">
                      {{-- <div>
                        <i class="fas fa-circle text-primary"></i>
                        <i class="fas fa-circle text-gray"></i>
                        <i class="fas fa-circle text-gray"></i>
                      </div> --}}
                    </div>
              

                  </div>
                  {{-- <div class="card-footer text-right"> --}}
                    {{-- <button class="btn btn-primary">{{ trans('button.save') }}</button> --}}
                  {{-- </div> --}}
                </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="section-body">
            <div class="row">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group text-left">
                      <h4 class="text-primary">Gestiona tu consultas. </h4>
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident voluptate consectetur inventore eligendi placeat iusto ullam dolores beatae optio qui! Odit tempore ducimus, similique fugit esse dicta repellat eos voluptas.</p>
                    </div>
                    <div class="form-group">
                      <img src="https://media1.tenor.com/images/aeddba936df7af90b39e23aaf65ebc73/tenor.gif?itemid=14098341" class="img img-responsive" width="100%" height="250px" alt="">
                    </div>
                  </div>
                  {{-- <div class="card-footer text-right">
                    <button class="btn btn-primary">{{ trans('button.save') }}</button>
                  </div> --}}
                </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="section-body">
            <div class="row">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group text-left">
                      <h4 class="text-primary">Gestiona tu consultas. </h4>
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident voluptate consectetur inventore eligendi placeat iusto ullam dolores beatae optio qui! Odit tempore ducimus, similique fugit esse dicta repellat eos voluptas.</p>
                    </div>
                    <div class="form-group">
                      <img src="https://i.pinimg.com/originals/e4/03/96/e40396fb57517819b8ec00c30ec0f181.gif" class="img img-responsive" width="100%" height="250px" alt="">
                    </div>
                  </div>
                  {{-- <div class="card-footer text-right">
                    <button class="btn btn-primary">{{ trans('button.save') }}</button>
                  </div> --}}
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
      {{-- <div class="swiper-button-next"></div> --}}
      {{-- <div class="swiper-button-prev"></div> --}}
    </div>
  </div>
</div>
<nav class="navbar fixed-bottom navbar-dark bg-white text-center" style="position: fixed; bottom: 0px;left: 0px; height: 75px !important;">
  <a class="btn-sm text-white btn btn-success btn-sm p-2 shadow p-3 mb-5 rounded" href="/">Tengo Cuenta</a>
  <a class="btn-sm text-white btn btn-primary btn-sm p-2 shadow p-3 mb-5 rounded" href="#">Soy nuevo</a>
</nav>
@endsection
@push('javascript')
<script src="/vendor/swiper/js/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper('.swiper-container', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    scrollbar: {
      el: '.swiper-scrollbar',
    },
    pagination: {
        el: '.swiper-pagination',
      },
      // spaceBetween: 30,
      // effect: 'fade',
    loop: true,
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    onSlideChangeEnd: function ( swiper ) {
        // Set individual timeout for autoplay
        var currentSlideIndex = swiper.activeIndex,
            timeout = $( swiper.slides[ currentSlideIndex ] ).data( "timeout" );

        if ( timeout === undefined || timeout === '' || timeout === 0) {
            timeout = 1000;
        }

        setTimeout( function () {
            swiper.slideNext();
        }, timeout );
    }
  });

  // swiper.on('slideNextTransitionStart', function () {
  //   value(this);
  // });
  
  // swiper.on('slidePrevTransitionStart', function () {
  //   value(this);
  // });
  
  // function value(s){
  //   var actual = s.activeIndex + 1;
  //   var largo = s.slidesGrid.length;
  //   var por = (actual/largo) * 100;
  //   $('#barProgress')[0].dataset['valuenow'] = por;
  //   $('#barProgress')[0].dataset['width'] = por+"%";
  //   $('#barProgress')[0].style.width = por+"%";
  // }
</script>
@endpush
