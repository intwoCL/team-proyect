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
          <a href="/">
            <h4 class="text-dark font-weight-normal">
              {{ trans('t.login.title') }} <span class="font-weight-bold">TEAM</span>
            </h4>
          </a>
        </div>
        <div class="card card-primary">
          <div class="row m-0">
            <div class="col-md-12 col-lg-6 p-0">
              <div class="card-header text-center"><h4>Acerca de</h4></div>
              <div class="card-body text-justify">
                TEAM es una herramienta tecnológica para potenciar el desarrollo de la comunicación funcional en niños con Trastorno del Espectro Autista a través del entrenamiento y un programa de intervención terapéutico, en el marco del desarrollo de proyectos de Investigación Aplicada de Duoc UC. <br> <br>
                Los niños TEA y sus padres tienden a presentar una carga emocional y económica muy elevada, y para lograr avances en el desarrollo comunicacional se requieren de diferentes terapias, constancia y continuidad en el tiempo, como mínimo una vez a la semana. Es en este punto donde TEAM busca apoyar la labor de los padres, sobre todo, porque la intervención en edades tempranas es clave. <br> <br>
                A través de esta aplicación las familias contarán con un registro digital de los programas con las respectivas actividades que los niños deben ejecutar entre una terapia y otra, lo cual quedará en línea con el terapeuta que podrá contar con una información actualizada respecto a los avances de sus pacientes, los tipos de instigación en el desarrollo de las tareas y los avances obtenidos para guiar de mejor forma a las familias.

              </div>
              <div class="card-header text-center"><h4>El equipo</h4></div>
              <div class="card-body text-justify">
                El equipo  TEAM está compuesto por profesores de Duoc UC a través de un trabajo multidisciplinario de diferentes profesionales provenientes de la Escuela de Construcción, Informática y del Programa de Emprendimiento e Innovación. Los docentes María Jesús, Pablo y Carolina lideraron esta versión, en conjunto con Leonardo quien desde su rol de alumno fue parte imprescindible en el diseño y desarrollo del proyecto, además de Benjamín quien lideró el desarrollo informático tras la propuesta.
              </div>
              {{-- <div class="card-header text-center"><h4>Acerca de</h4></div> --}}
              <div class="card-body">
                <img src="/images/app-demostracion.jpg" class="img-fluid rounded" alt="">
              </div>
            </div>
            <div class="col-md-12 col-lg-6 p-0">
              <div class="card-header text-center"><h4>ACERCA DE LÍDER TEAM</h4></div>
                <div class="card-body">
                  @php
                    $photo = "/images/organizadora.png";
                    $name = "Carolina Saavedra";
                    $email = "Lider de TEAM";
                    $description = "Publicista de la Universidad de Santiago de Chile, Magíster en Desarrollo Curricular y Proyectos Educativos UNAB. Coach Neurolingüístico certificado por HCN World. Diplomado en Metodologías Ágiles, Mentor Certificado por Imagine Lab y Universidad Adolfo Ibáñez, Design Thinking Professional Certificate, Docente de Duoc UC del Programa de Emprendimiento e Innovación y lo más importante mamá de Agustina, una niña con TEA sin desarrollo de lenguaje verbal.";
                  @endphp
                  @include('components.card._info_profile')
                </div>
            </div>
          </div>
        </div>
        <div class="simple-footer">
          <a href="/">Volver al Inicio</a>
          <br>
          <br>
          <br> v1.1
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

