@extends('layouts.app')

@section('content')


<section class="section">
  <div class="section-header">
    <a href="{{ route('activity.index') }}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>{{trans('t.activity.edit.title')}}</h1>
    {{-- <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Forms</a></div>
      <div class="breadcrumb-item">Form Validation</div>
    </div> --}}
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
          <form action="{{route('activity.update', $activity->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Default Validation</h4>
            </div>
            <div class="card-body">

              <div class="form-group row ">
                <label for="inputCode" class="col-sm-3 col-form-label">{{trans('t.activity.edit.code')}}</label>
                <div class="col-sm-9">
                  <input type="text" value="{{$activity->code}}" class="form-control" readonly autocomplete="off">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputName" class="col-sm-3 col-form-label">{{trans('t.activity.create.name')}}</label>
                <div class="col-sm-9">
                  <input type="text" name="name" value="{{$activity->name}}" class="form-control" required="" autocomplete="off">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputObjetive" class="col-sm-3 col-form-label">{{trans('t.activity.create.objective')}}</label>
                <div class="col-sm-9">
                  <input type="text" name="objective" value="{{$activity->objective}}" class="form-control" required="" autocomplete="off">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputObjetive" class="col-sm-3 col-form-label">{{trans('t.activity.create.photo')}}</label>
                <div class="input-group">
                  {{-- <img src="{{route('photo',$activity->photo)}}" class='Responsive image img-thumbnail' required=""  width='200px' height='200px' alt=""> --}}
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <img src="{{ Storage::url('photo_activity/'.$activity->photo) }}" alt="" title=""></a>
                  <input type="file" name="photo" accept="image/*" onchange="preview(this)" />
                  <br>
                </div>
              </div>
              {{-- <img src="{{ asset('storage/photo_activity/'.$activity->photo) }}" alt="" title=""></a> --}}

              <div class="form-group row">
                <label for="inputScale" class="col-sm-3 col-form-label">{{trans('t.activity.create.scale')}}</label>
                <div class="col-sm-8 row">
                  <select class="form-control select2" name="scale_id" required="">
                    @foreach ($scales as $s)
                      @if ($activity->scale_id == $s->id)
                        <option selected value="{{ $s->id }}">{{ $s->name }}</option>
                      @else
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputCategory" class="col-sm-3 col-form-label">{{trans('t.activity.create.categories')}}</label>
                <div class="col-sm-12 row">
                  <select class="form-control select2" multiple="" name="categories[]" required="">
                    @foreach ($categories as $c)
                    <option selected value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputTotalTime" class="col-sm-3 col-form-label">{{trans('t.activity.create.total_time')}}</label>
                <div class="col-sm-9">
                  <input type="number" min="0" name="total_time" value="{{$activity->total_time}}" class="form-control" required="" autocomplete="off">
                </div>
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
<script src="/vendor/intwo/preview.js"></script>
