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
    <h2 class="section-title">{{ trans('t.hi') }}, {{ current_user()->getFullName() }}!</h2>
    <p class="section-lead">
    {{ trans('t.information') }}
    </p>

    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-5">
        @include('components.card._profile')
      </div>
      <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
          <form method="POST" class="needs-validation" novalidate="">
            <div class="card-header">
              <h4>{{ trans('t.user.profile.profile_edit') }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label>{{ trans('t.user.profile.first_name') }}</label>
                    <input type="text" class="form-control" value="{{ current_user()->first_name }}" required="">
                    <div class="invalid-feedback">
                      Please fill in the first name
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>{{ trans('t.user.profile.last_name') }}</label>
                    <input type="text" class="form-control" value="{{ current_user()->last_name }}" required="">
                    <div class="invalid-feedback">
                      Please fill in the last name
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-7 col-12">
                    <label>{{ trans('t.user.profile.email') }}</label>
                    <input type="email" class="form-control" value="{{ current_user()->email }}" required="">
                    <div class="invalid-feedback">
                      Please fill in the email
                    </div>
                  </div>
                  <div class="form-group col-md-5 col-12">
                    <label>{{ trans('t.user.profile.run') }}</label>
                    <input type="tel" class="form-control" value="{{ current_user()->run }}">
                  </div>
                </div>
                <div class="form-group col-sm-6 col-md-12 col-6">
                  <label>{{ trans('t.user.profile.lang') }}<small class="text-danger">*</small></label>
                  <select class="form-control select2" name="lang" required="">
                    <option value="es">Español</option>
                    <option value="en">Inglés</option>
                  </select>                
                </div>

                <div class="form-group">
                  <label>{{ trans('t.user.profile.photo') }} <small class="text-danger">(opcional)</small></label>
                  <input type="file"  name="photo" class="form-control">
                </div>
            </div>

            <div class="card-footer text-right">
              <button class="btn btn-primary">{{ trans('button.update') }}</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection