@extends('layouts.app')

@section('content')


<section class="section">
  <div class="section-header">
    <a href="{{route('content.show',[$a->id,$c->id])}}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>Crear nuevo item</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Forms</a></div>
      <div class="breadcrumb-item">Form Validation</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Form Validation</h2>
    <p class="section-lead">
      Form validation using default from Bootstrap 4
    </p>

    <div class="row">

      <div class="col-12 col-md-6 col-lg-6">
        @include('partials._errors')

        <div class="card">
          <form action="{{route('item.store',[$a->id,$c->id])}}" method="POST" >
            @csrf
            <div class="card-header">
              <h4>Default Validation</h4>
            </div>
            <div class="card-body">
              <input type="hidden" name="content_id" value={{$c->id}}>
              <input type="hidden" name="activity_id" value={{$a->id}}>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="inputTitulo">Titulo</label>
                <div class="col-sm-9">
                    <input id="inputTitulo" type="text" name="title" class="form-control" required="" autocomplete="off" value="{{ old('name')}}">
                </div>
              </div>

              <div class="form-group">
                <label>Contenido</label>
                <input type="text" name="content" class="form-control" required="" autocomplete="off" value="{{ old('objective')}}">
              </div>



              {{-- <div class="form-group">
                <label>{{trans('t.activity.create.categories')}}</label>
                <select class="form-control select2" multiple="" name="categories[]" required="">
                  @foreach ($categories as $c)
                  <option value="{{ $c->id }}">{{ $c->name }}</option>
                  @endforeach
                </select>
              </div> --}}



            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary">{{trans('t.activity.create.submit')}}</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection
@push('javascript')

@endpush
