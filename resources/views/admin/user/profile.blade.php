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
    <h2 class="section-title">Hi, {{ current_user()->getFullName() }}!</h2>
    <p class="section-lead">
    {{ trans('t.information') }}
    </p>

    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-5">
        <div class="card profile-widget">
          <div class="profile-widget-header">
            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
            <div class="profile-widget-items">
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">Posts</div>
                <div class="profile-widget-item-value">187</div>
              </div>
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">Followers</div>
                <div class="profile-widget-item-value">6,8K</div>
              </div>
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">Following</div>
                <div class="profile-widget-item-value">2,1K</div>
              </div>
            </div>
          </div>
          <div class="profile-widget-description">
            <div class="profile-widget-name">Ujang Maman <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
            Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
          </div>
          <div class="card-footer text-center">
            <div class="font-weight-bold mb-2">Follow Ujang On</div>
            <a href="#" class="btn btn-social-icon btn-facebook mr-1">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="btn btn-social-icon btn-twitter mr-1">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="btn btn-social-icon btn-github mr-1">
              <i class="fab fa-github"></i>
            </a>
            <a href="#" class="btn btn-social-icon btn-instagram">
              <i class="fab fa-instagram"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
          <form method="post" class="needs-validation" novalidate="">
            <div class="card-header">
              <h4>{{ trans('t.user.profile.profile_edit') }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label>{{ trans('t.user.profile.first_name') }}</label>
                    <input type="text" class="form-control" value="Ujang" required="">
                    <div class="invalid-feedback">
                      Please fill in the first name
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>{{ trans('t.user.profile.last_name') }}</label>
                    <input type="text" class="form-control" value="Maman" required="">
                    <div class="invalid-feedback">
                      Please fill in the last name
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-7 col-12">
                    <label>{{ trans('t.user.profile.email') }}</label>
                    <input type="email" class="form-control" value="ujang@maman.com" required="">
                    <div class="invalid-feedback">
                      Please fill in the email
                    </div>
                  </div>
                  <div class="form-group col-md-5 col-12">
                    <label>{{ trans('t.user.profile.run') }}</label>
                    <input type="tel" class="form-control" value="">
                  </div>
                </div>
                <div class="form-group col-sm-6 col-md-12 col-6">
                  <label>{{ trans('t.user.profile.lang') }}<small class="text-danger">*</small></label>
                  <select class="form-control select2" name="lang" required="">
                    <option value="es">Español</option>
                    <option value="en">Inglés</option>
                  </select>                
                </div>

                <div class="card-body">
                  <div class="form-group">
                    <label>Contraseña<small class="text-danger">* (123456)</small></label>
                    <input type="password"  name="password" value="123456" class="form-control" required="" value="">
                  </div>

                <div class="form-group">
                  <div class="control-label">¿Es administrador? <small class="text-danger">*</small></div>
                  <label class="custom-switch mt-2">
                    <input type="checkbox" name="admin" class="custom-switch-input">
                    <span class="custom-switch-description mr-2">No</span>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Si</span>
                  </label>
                </div>
                {{--Pendiente--}}
                <div class="form-group">
                  <div class="control-label">¿Es especialista? <small class="text-danger">*</small></div>
                  <label class="custom-switch mt-2">
                    <input type="checkbox" name="specialist" class="custom-switch-input">
                    <span class="custom-switch-description mr-2">No</span>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Si</span>
                  </label>
                </div>

                <div class="form-group">
                  <label>Foto <small class="text-danger">(opcional)</small></label>
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