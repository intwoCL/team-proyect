@php
    $now = new \DateTime();
    $fecha = $now->format('d-m-Y');
@endphp
@extends('layouts.app')

@push('stylesheet')
<link rel="stylesheet" href="/vendor/clockpicker/css/bootstrap-clockpicker.min.css">
<link rel="stylesheet" href="/vendor/datepicker2/css/bootstrap-datepicker3.css">
  {{-- <link href="/vendor/datepicker/css/gijgo.min.css" rel="stylesheet" type="text/css" /> --}}
@endpush
@section('content')

<section class="section">
  <div class="section-header">
    <a href="{{ route('enrollment.index') }}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>Creación de calendario </h1>
    {{-- <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Forms</a></div>
      <div class="breadcrumb-item">Form Validation</div>
    </div> --}}
  </div>

  <div class="section-body">
    {{-- <h2 class="section-title">Form Validation</h2>
    <p class="section-lead">
      Form validation using default from Bootstrap 4
    </p> --}}
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        @include('partials._errors')
        <div class="card">
          <form action="{{route('attention.store')}}" method="POST">
            @csrf
            <div class="card-header">
              <h4>{{ trans('t.user.calendar.title') }}</h4>
            </div>
            <div class="card-body">
              {{-- <div class="form-group row">
                <label for="inputDate" class="col-sm-3 col-form-label">{{ trans('t.user.calendar.date') }}</label>
                <div class="col-sm-9">
                  <input id="datepicker" width="276"/>
                </div>
              </div> --}}

              <input type="hidden" name="user_id" value="{{ $user_id }}">

              <div class="form-group row" id="data_1">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                <div class="input-group date col-sm-10">
                  <span class="input-group-addon btn btn-info"><i class="fa fa-calendar"></i></span>
                  <input type="text" class="form-control" readonly name="attention_date" id="fecha_agenda" required="" value="{{ $fecha }}">
                </div>
                <div class="col-sm-12">    
                    {!! $errors->first('fecha', '<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                </div>  
              </div>

              <div class="form-group row">
                <label for="hora" class="col-sm-2 col-form-label">Hora</label>
                <div class="input-group col-sm-10">                    
                    <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                        <input type="text" class="form-control" readonly value="8:00" name="attention_time" id="attention_time" required="" >
                    </div>
                    <div class="col-sm-12">
                        {!! $errors->first('hora', '<small class="form-text text-danger">:message</small>') !!}
                    </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCommentIn" class="col-sm-12 col-form-label">{{ trans('t.user.calendar.comment_in') }}</label>
                <div class="col-sm-12">
                  <textarea class="form-control" rows="3" name="comment_in" id="comentario_entrada" placeholder="..." required="" style="height: 100px">{{ old('comment_in') }}</textarea>
                </div>
              </div>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary">{{trans('button.save')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
  {{-- <script src="/vendor/datepicker/js/gijgo.min.js" type="text/javascript"></script>
  <script>
      $('#datepicker').datepicker({
          uiLibrary: 'bootstrap4'
      });
      $('#data_1 .input-group.date').datepicker({
    language: "es",
    format: 'dd-mm-yyyy',
    orientation: "bottom",
    showButtonPanel: true,
    autoclose: true
  });
  </script> --}}
<script src="/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>  
<script src="/vendor/datepicker2/js/bootstrap-datepicker.min.js"></script>
<script src="/vendor/datepicker2/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.clockpicker').clockpicker();

  $('#data_1 .input-group.date').datepicker({
    language: "es",
    format: 'dd-mm-yyyy',
    orientation: "bottom",
    showButtonPanel: true,
    autoclose: true
  });
</script>
@endpush