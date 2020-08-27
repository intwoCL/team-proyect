@extends('layouts.app')

@section('content')


<section class="section">
  <div class="section-header">
    <a href="{{ route('activity.index') }}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
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
        @include('partials._errors')
        <div class="card">
          <div class="card-header">
            <h4>Horizontal Form</h4>
          </div>
          <form action="{{route('activity.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label for="inputName" class="col-sm-3 col-form-label">{{trans('t.activity.create.name')}}</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" required="" autocomplete="off" value="{{ old('name')}}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputObjetive" class="col-sm-3 col-form-label">{{trans('t.activity.create.objective')}}</label>
                <div class="col-sm-9">
                  <input type="text" name="objective" class="form-control" required="" autocomplete="off" value="{{ old('objective')}}">
                </div>  
              </div>
  
              <div class="form-group row">
                <label for="inputObjetive" class="col-sm-3 col-form-label">{{trans('t.activity.create.photo')}}</label>
                <div class="col-sm-9">
                  <!-- <img src=""  class='Responsive image img-thumbnail'  width='200px' height='200px' alt=""> -->
                  <input type="file" name="photo" accept="image/*" onchange="preview(this)" />
                  <br>
                </div>
              </div>  
              <div class="form-group center-text">
                  <div id="preview"></div>
              </div>
  
              <div class="form-group row">
                <label for="inputScale" class="col-sm-3 col-form-label">{{trans('t.activity.create.scale')}}</label>
                <div class="col-sm-9">
                  <select class="form-control select2" name="scale_id" required="">
                    @foreach ($scales as $s)
                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCategory" class="col-sm-3 col-form-label">{{trans('t.activity.create.categories')}}</label>
                <div class="col-sm-9">
                  <select class="form-control select2" multiple="" name="categories[]" required="">
                    @foreach ($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTotalTime" class="col-sm-3 col-form-label">{{trans('t.activity.create.total_time')}}</label>
                <div class="col-sm-9">
                  <input type="number" min="0" name="total_time" class="form-control" required="" autocomplete="off" value="{{ old('total_time')}}">
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
<script src="/vendor/intwo/preview.js"></script>
@endpush
