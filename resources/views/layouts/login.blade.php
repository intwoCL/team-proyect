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
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            {{-- <img src="../assets/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2"> --}}
            <h4 class="text-dark font-weight-normal">{{ trans('t.login.title') }} <span class="font-weight-bold">Team</span></h4>
            {{-- <p class="text-muted">Before you get started, you must login or register if you don't already have an account.</p> --}}
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
              @csrf
              <div class="form-group">
                <label for="email">{{ trans('t.login.email') }}</label>
                <input id="email" type="email" class="form-control invalid" name="email" tabindex="1" value="admin@example.com" required autofocus>
                <div class="invalid-feedback">
                  Please fill in your email
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">{{ trans('t.login.password') }}</label>
                </div>
                <input id="password" type="password" autocomplete="off" class="form-control" name="password" tabindex="2" value="123456" required>
                <div class="invalid-feedback">
                  please fill in your password
                </div>
              </div>

              {{-- <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                  <label class="custom-control-label" for="remember-me">Remember Me</label>
                </div>
              </div> --}}

              <div class="form-group text-right">
                <a href="{{ route('password.request') }}" class="float-left mt-3">
                  {{ trans('t.login.forgot') }}
                </a>
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  {{ trans('t.login.btn.login') }}
                </button>
              </div>
              @if (helper_integration_gmail())
              <div class="mt-5 text-center">
                <a href="auth-register.html" class="btn btn-danger"><i class="fab fa-google"></i> Sign in google</a>
              </div>
              @endif
            </form>
            {{-- <div class="text-center mt-5 text-small">
              Copyright &copy; Your Company. Made with ðŸ’™ by Stisla
              <div class="mt-2">
                <a href="#">Privacy Policy</a>
                <div class="bullet"></div>
                <a href="#">Terms of Service</a>
              </div>
            </div> --}}
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom d-none d-md-block" data-background="/images/fondo2.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold"></h1>
                <h5 class="font-weight-normal text-muted-transparent"></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="{{ mix('js/manifest.js') }}"></script>
  <script src="{{ mix('js/vendor.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>

