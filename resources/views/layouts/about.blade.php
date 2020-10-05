<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Programa Team Acceso</title>
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
  <div id="app">
  <section class="section">
    <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
        <div class="login-brand">
          <h4 class="text-dark font-weight-normal">{{ trans('t.login.title') }} <span class="font-weight-bold">TEAM</span></h4>
        </div>
        <div class="card card-primary">
          <div class="row m-0">
            <div class="col-md-12 col-lg-6 p-0">
              <div class="card-header text-center"><h4>Acerca de</h4></div>
              <div class="card-body">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam recusandae atque at exercitationem delectus odit hic distinctio vero dolores iure aspernatur, ratione ducimus quasi quaerat suscipit quos perferendis voluptates accusamus.
              </div>
              <div class="card-header text-center"><h4>Nosotros</h4></div>
              <div class="card-body">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam recusandae atque at exercitationem delectus odit hic distinctio vero dolores iure aspernatur, ratione ducimus quasi quaerat suscipit quos perferendis voluptates accusamus.
              </div>
              <div class="card-header text-center"><h4>Acerca de</h4></div>
              <div class="card-body">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam recusandae atque at exercitationem delectus odit hic distinctio vero dolores iure aspernatur, ratione ducimus quasi quaerat suscipit quos perferendis voluptates accusamus.
              </div>
            </div>
            <div class="col-md-12 col-lg-6 p-0">
              <div class="card-header text-center"><h4>Equipo</h4></div>
                <div class="card-body">
                  @php
                    $photo = "/images/avatar.png";
                    $name = "nombre completo";
                    $email = "nombrecompleto@correo.com";
                    $description = "  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam recusandae atque at exercitationem delectus odit hic distinctio vero dolores iure aspernatur, ratione ducimus quasi quaerat suscipit quos perferendis voluptates accusamus.";
                  @endphp
                  @include('components.card._info_profile')
                  @include('components.card._info_profile')
                  @include('components.card._info_profile')
                  
                </div>
            </div>
          </div>
        </div>
        <div class="simple-footer">
          <a href="/">Volver al Inicio</a>
          <br>
          <br>
          <br>  v0.3
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

