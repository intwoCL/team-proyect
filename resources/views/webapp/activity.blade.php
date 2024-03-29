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
        {{-- <img class="img-responsive rounded" width="100%" height="150" src="http://via.placeholder.com/300x150"
          alt="Card image cap"> --}}
        {{-- </div> --}}
      {{-- </section> --}}
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
          <article class="article article-style-b">
            <div class="article-header">
              <div class="article-image" data-background="{{  $activity->present()->getPhoto()  }}"
                style="background-image: url('{{  $activity->present()->getPhoto() }}');">
              </div>
              <div class="article-badge">
                <div class="article-badge-item bg-info"><i class="fas fa-history"></i>{{
                  $scheduleActivity->times }}
                  veces</div>
              </div>
            </div>
            <div class="article-details">
              <div class="article-title">
                <h2><a href="#">{{ $activity->name}}</a></h2>
              </div>
              <p>{!! $activity->objective !!}</p>
              <div class="article-body">
                @foreach ($activity->tagsCategories as $c)
                <div class="badge badge-success mt-2"><i class="fas fa-chevron-right"></i> {{
                  $c->category->name }}
                </div>
                @endforeach
              </div>
            </div>
          </article>
          <div class="card card-items border-left border-primary" role="button" data-toggle="modal"
            @if($feedbackEnabled) data-target="#feedbackModal" @endif>
            <div class="card-horizontal">

              <div class="card-body">
                <h5 class="card-title">
                  <span class="fa-stack" style="margin: -2px !important;">
                    <span
                      class="fa fa-question-circle fa-stack-2x {{$feedbackEnabled ? 'text-primary' : 'text-secondary'}}"></span>
                    <strong class="fa-stack-1x"></strong>
                  </span>
                  Evaluacion Diaria {{$feedbackEnabled ? '(Disponible)' : '(No Disponible)' }}
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

<!-- Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('app.report.submit',$scheduleActivity->id)}}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Evaluacion Diaria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          {{-- Evaluacion --}}
          @if($activity->evaluation_quiz_enabled)
          <div class="row">
            <div class="col-md-12">
              <h3 class="text-center">Evaluacion</h3>
            </div>
          </div>
          <div class="row">


            <div class="col-sm-12 COL-md-12 col-xs-12 text-center">
              <div class="btn-group mb-3 mt-2" role="group" aria-label="face group">
                <div class="mr-3">
                  <label class="btn btn-ligth">
                    <img src="/images/quiz/cara2.png" width="50px" alt="">
                    <input type="radio" name="evaluacion" value="10" id="evalsad" autocomplete="off"> Negativa
                  </label>
                </div>
                <div class="mr-3">
                  <label class="btn btn-ligth">
                    <img src="/images/quiz/cara1.png" width="50px" alt="">
                    <input type="radio" name="evaluacion" value="50" id="evalneutral" autocomplete="off"> Neutral
                  </label>
                </div>
                <div class="mr-3">
                  <label class="btn btn-ligth">
                    <img src="/images/quiz/cara0.png" width="50px" alt="">
                    <input type="radio" name="evaluacion" value="100" id="evalhappy" autocomplete="off"> Positva
                  </label>
                </div>
              </div>
            </div>

            {{-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-danger">
                <input type="radio" name="evaluacion" value="10" id="evalsad" autocomplete="off"> Negativa
              </label>
              <label class="btn btn-secondary">
                <input type="radio" name="evaluacion" value="50" id="evalneutral" autocomplete="off"> Neutral
              </label>
              <label class="btn btn-success">
                <input type="radio" name="evaluacion" value="100" id="evalhappy" autocomplete="off"> Positva
              </label>
            </div> --}}

          </div>
          @endif
          {{-- Momento del dia --}}
          @if($activity->day_quiz_enabled)
          <div class="row">
            <div class="col-md-12">
              <h3 class="text-center">Momento del dia </h3>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 COL-md-12 col-xs-12 text-center">
              <div class="btn-group mb-3 mt-2" role="group" aria-label="face group">
                <div class="mr-3">
                  <label class="btn btn-ligth">
                    <img src="/images/quiz/manana.png" width="50px" alt="">
                    <input type="radio" name="momento" value="100" id="timesun" autocomplete="off"> Mañana
                  </label>
                </div>
                <div class="mr-3">
                  <label class="btn btn-ligth">
                    <img src="/images/quiz/dia.png" width="50px" alt="">
                    <input type="radio" name="momento" value="70" id="timemid" autocomplete="off"> Mediodia
                  </label>
                </div>
                <div class="mr-3">
                  <label class="btn btn-ligth">
                    <img src="/images/quiz/tarde.png" width="50px" alt="">
                    <input type="radio" name="momento" value="40" id="timenoon" autocomplete="off"> Tarde
                  </label>
                </div>
                <div class="mr-3">
                  <label class="btn btn-ligth">
                    <img src="/images/quiz/noche.png" width="50px" alt="">
                    <input type="radio" name="momento" value="10" id="timenight" autocomplete="off"> Noche
                  </label>
                </div>
              </div>
            </div>
            {{-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-primary">
                <input type="radio" name="momento" value="100" id="timesun" autocomplete="off"> Mañana
              </label>
              <label class="btn btn-warning">
                <input type="radio" name="momento" value="70" id="timemid" autocomplete="off"> Mediodia
              </label>
              <label class="btn btn-success">
                <input type="radio" name="momento" value="40" id="timenoon" autocomplete="off"> Tarde
              </label>
              <label class="btn btn-danger">
                <input type="radio" name="momento" value="10" id="timenight" autocomplete="off"> Noche
              </label>
            </div> --}}
          </div>
          @endif
          {{-- Frecuencia --}}
          @if ($activity->frequency_quiz_enabled)
          <div class="row">
            <div class="col-md-12">
              <h3 class="text-center">Frecuencia</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 COL-md-12 col-xs-12 text-center">
              <div class="btn-group mb-3 mt-2" role="group" aria-label="face group">
                <div class="mr-3">
                  <label class="btn btn-ligth">
                    <i class="fa fa-square fa-4x text-primary"></i>
                    <input type="radio" name="frecuencia" value="100" id="freqblue" autocomplete="off"> 1-10
                  </label>
                </div>
                <div class="mr-3">
                  <label class="btn btn-ligth">
                    <i class="fa fa-square fa-4x text-warning"></i>
                    <input type="radio" name="frecuencia" value="70" id="freqyellow" autocomplete="off"> 11-20
                  </label>
                </div>
                <div class="mr-3">
                  <label class="btn btn-ligth">
                    <i class="fa fa-square fa-4x text-success"></i>
                    <input type="radio" name="frecuencia" value="40" id="freqgreen" autocomplete="off"> 21-30
                  </label>
                </div>
                <div class="mr-3">
                  <label class="btn btn-ligth">
                    <i class="fa fa-square fa-4x text-danger"></i>
                    <input type="radio" name="frecuencia" value="10" id="freqred" autocomplete="off"> 31-40
                  </label>
                </div>
              </div>
            </div>
            {{-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-primary">
                <input type="radio" name="frecuencia" value="100" id="freqblue" autocomplete="off"> 1-10
              </label>
              <label class="btn btn-warning">
                <input type="radio" name="frecuencia" value="70" id="freqyellow" autocomplete="off"> 11-20
              </label>
              <label class="btn btn-success">
                <input type="radio" name="frecuencia" value="40" id="freqgreen" autocomplete="off"> 21-30
              </label>
              <label class="btn btn-danger">
                <input type="radio" name="frecuencia" value="10" id="freqred" autocomplete="off"> 31-40
              </label>
            </div> --}}
          </div>
          @endif
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </form>
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
