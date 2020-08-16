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
          <div class="card-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
              </div>
            </div>
            <fieldset class="form-group">
              <div class="row">
                <div class="col-form-label col-sm-3 pt-0">Radios</div>
                <div class="col-sm-9">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked="">
                    <label class="form-check-label" for="gridRadios1">
                    First radio
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                    <label class="form-check-label" for="gridRadios2">
                      Second radio
                    </label>
                  </div>
                  <div class="form-check disabled">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled="">
                    <label class="form-check-label" for="gridRadios3">
                      Third disabled radio
                    </label>
                  </div>
                </div>
              </div>
            </fieldset>
            <div class="form-group row">
              <div class="col-sm-3">Checkbox</div>
              <div class="col-sm-9">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck1">
                  <label class="form-check-label" for="gridCheck1">
                  Example checkbox
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-primary">{{trans('button.save')}}</button>
          </div>
        </div>
        <div class="card">       
          <form action="{{route('activity.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="card-header">
              <h4>Default Validation</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>{{trans('t.activity.create.name')}}</label>
                <input type="text" name="name" class="form-control" required="" autocomplete="off" value="{{ old('name')}}">
              </div>

              <div class="form-group">
                <label>{{trans('t.activity.create.objective')}}</label>
                <input type="text" name="objective" class="form-control" required="" autocomplete="off" value="{{ old('objective')}}">
              </div>
              
              <div class="form-group">
                <label>{{trans('t.activity.create.photo')}}</label>
                <input type="file" name="photo" class="form-control" required="">
              </div>

              <div class="form-group">
                <label>{{trans('t.activity.create.scale')}}</label>
                <select class="form-control select2" name="scale_id" required="">
                  @foreach ($scales as $s)
                  <option value="{{ $s->id }}">{{ $s->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>{{trans('t.activity.create.categories')}}</label>
                <select class="form-control select2" multiple="" name="categories[]" required="">
                  @foreach ($categories as $c)
                  <option value="{{ $c->id }}">{{ $c->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>{{trans('t.activity.create.total_time')}}</label>
                <input type="number" min="0" name="total_time" class="form-control" required="" autocomplete="off" value="{{ old('total_time')}}">
              </div>

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
