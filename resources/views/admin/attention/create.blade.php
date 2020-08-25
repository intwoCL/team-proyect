@extends('layouts.app')

@section('content')

<section class="section">
  <div class="section-header">
    <a href="{{ route('attention.index') }}">
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
          <form action="{{route('calendar.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="card-header">
              <h4>Formulario de Calendario</h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="inputDay" class="col-sm-3 col-form-label">{{ trans('t.user.calendar.day') }}</label>
                <div class="col-sm-9">
                  <input type="text" name="day" class="form-control" required="" autocomplete="off" value="{{ old('day')}}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputDate" class="col-sm-3 col-form-label">{{ trans('t.user.calendar.date') }}</label>
                <div class="col-sm-9">
                  <input type="text" name="objective" class="form-control" required="" autocomplete="off" value="{{ old('objective')}}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCommentIn" class="col-sm-3 col-form-label">{{ trans('t.user.calendar.comment_in') }}</label>
                <div class="col-sm-9">
                  <textarea class="form-control" rows="3" name="comment_in" id="comentario_entrada" placeholder="..." required>{{ old('comment_in') }}</textarea>
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