<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; {{ env('APP_NAME') }}</title>
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
  <div id="app">
  <section class="section">
    <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
      <div class="login-brand">
        <h4 class="text-dark font-weight-normal">{{ trans('t.login.title') }} <span class="font-weight-bold">Team</span></h4>
      </div>

      <div class="card card-primary">
        <div class="row m-0">
        <div class="col-12 col-md-12 col-lg-5 p-0">
          <div class="card-header text-center"><h4>Iniciar sesión</h4></div>
          <div class="card-body">
          <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
            @csrf
            <div class="form-group floating-addon">
              <label for="email">{{ trans('t.login.email') }}</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-envelope"></i>
                  </div>
                </div>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" value="admin@example.com" required autofocus>

              </div>
            </div>
    
            <div class="form-group">
              <div class="d-block">
                <label for="password" class="control-label">{{ trans('t.login.password') }}</label>
              </div>
              <input id="password" type="password" autocomplete="off" class="form-control" name="password" tabindex="2" value="123456" required>
            </div>

            <div class="form-group text-right">
              <button type="submit" class="btn btn-block btn-lg btn-primary">
                {{ trans('t.login.btn.login') }}
              </button>
            </div>
            <div class="form-group text-right">
              <a href="{{ route('reset.password') }}" class="float-left mt-3">
                {{ trans('t.login.forgot') }}
              </a>
            </div>

            {{-- solo android --}}
            {{-- <input type="button" class="btn btn-success" value="Say hello" onClick="showAndroidToast('Hello Android!')" /> --}}
      
            @if (helper_integration_gmail())
            <div class="mt-5 text-center">
              <a href="auth-register.html" class="btn btn-danger"><i class="fab fa-google"></i> Sign in google</a>
            </div>
            @endif
          </form>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7 p-0 d-none d-md-block">
          {{-- <div id="map" class="contact-map"></div> --}}
          <img src="/images/fondo2.jpg" width="100%" height="500px" class="img img-responsive" alt="">
        </div>
        </div>
      </div>
      <div class="simple-footer">
        v0.1
      </div>
      </div>
    </div>
    </div>
  </section>
  </div>
  <script src="{{ mix('js/manifest.js') }}"></script>
  <script src="{{ mix('js/vendor.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
  {{-- <script type="text/javascript">
    function showAndroidToast(toast) {
        Android.showToast(toast);
    }
</script> --}}
</body>
</html>

