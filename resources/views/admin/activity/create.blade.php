@extends('layouts.app')

@section('content')


<section class="section">
  <div class="section-header">
    <h1>{{trans('t.activity.create.title')}}</h1>
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
        <div class="card">
          
          <form action="{{route('activity.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="card-header">
              <h4>Default Validation</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>{{trans('t.activity.create.name')}}</label>
                <input type="text"  name="name" class="form-control" required="">
              </div>

              <div class="form-group">
                <label>Objetivo</label>
                <input type="text"  name="objetive" class="form-control" required="">
              </div>

              <div class="form-group">
                <label>Foto</label>
                <input type="file"  name="photo" class="form-control" required="">
              </div>

              <div class="form-group">
                <label>Escala</label>
                <select class="form-control select2" name="scale" required="">
                  @foreach ($scales as $s)
                  <option value="{{ $s->id }}">{{ $s->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Categorias</label>
                <select class="form-control select2" multiple="" name="categories[]" required="">
                  @foreach ($categories as $c)
                  <option value="{{ $c->id }}">{{ $c->name }}</option>
                  @endforeach
                </select>
                
              </div>

              

              <div class="form-group">
                <label>Tiempo Total</label>
                <input type="number"  name="total_time" class="form-control" required="">
              </div>

            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary">Enviar</button>
            </div>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</section>
@endsection
