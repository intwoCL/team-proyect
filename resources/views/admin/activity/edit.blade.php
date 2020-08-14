@extends('layouts.app')

@section('content')


<section class="section">
  <div class="section-header">
    <h1>{{trans('t.activity.edit.title')}}</h1>
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
        @include('partials.alert')
        @include('partials.errors')
        <div class="card">          
          <form action="{{route('activity.update', $activity->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Default Validation</h4>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label>{{trans('t.activity.edit.code')}}</label>
                <input type="text" value="{{$activity->code}}" class="form-control" readonly autocomplete="off">
              </div>

              <div class="form-group">
                <label>{{trans('t.activity.create.name')}}</label>
                <input type="text" name="name" value="{{$activity->name}}" class="form-control" required="" autocomplete="off">
              </div>

              <div class="form-group">
                <label>{{trans('t.activity.create.objetive')}}</label>
              <input type="text" name="objetive" value="{{$activity->objetive}}" class="form-control" required="" autocomplete="off">
              </div>

              <div class="form-group">
                <label>{{trans('t.activity.create.photo')}}</label>
              <input type="file" name="photo" value="{{$activity->photo}}" class="form-control" required="">
              </div>

              <div class="form-group">
                <label>{{trans('t.activity.create.scale')}}</label>
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
                <input type="number" min="0" name="total_time" value="{{$activity->total_time}}" class="form-control" required="" autocomplete="off">
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
{{--Revisar--}}
  <script>
    iziToast.show({
      title: 'Hey',
      message: 'What would you like to add?'
    });
  </script>
@endpush
