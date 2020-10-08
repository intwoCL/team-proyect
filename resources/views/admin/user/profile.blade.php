@php
  $user = current_user();
@endphp
@extends('layouts.app')
@section('content')
<section class="section">
  <div class="section-header">
    <h1>{{ trans('t.profile') }}</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">{{ trans('t.profile') }}</div>
    </div>
  </div>
  <div class="section-body">
    <h2 class="section-title">{{ trans('t.hi') }}, {{ current_user()->present()->getFullName() }}!</h2>
    <p class="section-lead">
    {{ trans('t.information') }}
    </p>
    <div class="row mt-sm-4">
      {{-- <div class="col-12 col-md-12 col-lg-5">
      </div> --}}
      <div class="col-6 col-md-6 col-lg-6">
        @include('components.card._profile')
        @include('partials._errors')

        <div class="card">
          <form action="{{ route('user.updateprofile') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Actualizar Usuario <strong>{{ $user->email }}</strong></h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">{{ trans('t.user.profile.email') }}</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="inputEmail3" placeholder="{{ trans('t.user.profile.email') }}" required="" name="email" value="{{$user->email}}">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputFirstName" class="col-sm-3 col-form-label">Nombre Tutor<span class="text-danger">*</span></label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="inputFirstName" placeholder="{{ trans('t.user.profile.first_name') }}" required="" name="first_name" value="{{$user->first_name}}">
                </div>

                {{-- <label for="inputLastName" class="col-sm-3 col-form-label">{{ trans('t.user.profile.last_name') }}<span class="text-danger">*</span></label> --}}
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="inputLastName" placeholder="{{ trans('t.user.profile.last_name') }}" required name="last_name" value="{{$user->last_name}}">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputRut" class="col-sm-3 col-form-label">Nombre del niño</label>
                <div class="col-sm-9">
                  <input type="text" name="child_name" class="form-control" autocomplete="off" value="{{ $user->child_name }}" placeholder="">
                </div>
              </div>

              <fieldset class="form-group">
                <label>Genero<small class="text-danger">*</small></label>
                <select class="form-control select2" name="gender" required>
                  <option {{ ($user->gender==0) ? 'selected' : '' }} value="0">No mencionar</option>
                  <option {{ ($user->gender==1) ? 'selected' : '' }} value="1">Hombre</option>
                  <option {{ ($user->gender==2) ? 'selected' : '' }} value="2">Mujer</option>
                </select>  
              </fieldset>

              <fieldset class="form-group">
                <label>{{ trans('t.user.profile.lang') }}<small class="text-danger">*</small></label>
                <select class="form-control select2" name="lang" required="" value="{{$user->lang}}">
                  @if ($user->lang == "es")
                    <option selected value="es">{{ trans('t.spanish') }}</option>
                    <option value="en">{{ trans('t.english') }}</option>
                  @else
                    <option value="es">{{ trans('t.spanish') }}</option>
                    <option selected value="en">{{ trans('t.english') }}</option>
                  @endif
                </select>  
              </fieldset>
              @php
                $checkedA ='';
                if($user->admin){$checkedA = 'checked';}
              @endphp
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-form-label col-sm-4 pt-0">{{ trans('t.user.index.admin') }}<small class="text-danger">*</small></div>
                  <label class="custom-switch mt-2">
                    <input type="checkbox" name="admin" class="custom-switch-input" {{ $checkedA }}>
                    <span class="custom-switch-description mr-2">{{ trans('t.no') }}</span>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">{{ trans('t.yes') }}</span>
                  </label>
                </div>
              </fieldset> 
              @php
                $checkedS =''; 
                if($user->specialist){$checkedS = 'checked';}
              @endphp
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-form-label col-sm-4 pt-0">{{ trans('t.user.index.specialist') }}<small class="text-danger">*</small></div>
                  <label class="custom-switch mt-2">
                    <input type="checkbox" name="specialist" id="specialist" class="custom-switch-input" {{ $checkedS }}>
                    <span class="custom-switch-description mr-2">{{ trans('t.no') }}</span>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">{{ trans('t.yes') }}</span>
                  </label>
                </div>
              </fieldset>

              <div class="form-group row" {{ ($user->specialist) ? '' : 'hidden' }} id="id_specialty">
                <label for="inputSpecialty" class="col-sm-3 col-form-label">{{ trans('t.user.profile.specialty') }}</label>
                <div class="col-sm-9">
                  <input type="text" name="specialty" class="form-control" id="inputSpecialty" placeholder="{{ trans('t.user.profile.specialty') }}" value="{{ $user->specialty }}">
                </div>
              </div>

              <div class="form-group">
                <label class="col-form-label" for="hf-rut">Imagen Actual <small>(Opcional)</small></label>
                <div class="input-group">
                  <img src="{{ $user->present()->getPhoto() }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
                </div>
            </div> 
              <div class="form-group row">
                <label for="inputObjetive" class="col-sm-3 col-form-label">{{trans('t.user.profile.photo')}}</label>
                <div class="col-sm-9">
                  <!-- <img src=""  class='Responsive image img-thumbnail'  width='200px' height='200px' alt=""> -->
                  <input type="file" name="photo" accept="image/*" onchange="preview(this)" />
                  <br>
                </div>
              </div>  
              <div class="form-group center-text dropzone">
                  <div id="preview"></div>
              </div>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary">{{ trans('button.update') }}</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="card">
          <form action="{{route('user.updateEmailMyself')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Cambiar contraseña</h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">{{ trans('t.user.profile.password') }} * (123456)</label>
                <div class="col-sm-9">
                  <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="{{ trans('t.user.profile.password') }}" required="" value="123456">
                </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">{{ trans('button.update') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@push('javascript')
{{-- <script src="/vendor/intwo/validate-run.js"></script> --}}
<script src="/vendor/intwo/preview.js"></script>
<script>
  $('#specialist').change(function() {
    if (!this.checked) {
      $("#id_specialty").attr('hidden',true);
    }else{
      $("#id_specialty").removeAttr("hidden");
    }
  });
</script>
@endpush