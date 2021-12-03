@if ($resumen['d_p'] == 100)
<img src="/images/quiz/manana.png" width="50px" alt="" title="AMANECER">
<h6>AMANECER</h6>
@endif
@if ($resumen['d_p'] < 100 && $resumen['d_p'] >= 40)
<img src="/images/quiz/dia.png" width="50px" alt="" title="TARDE">
<h6>TARDE</h6>
@endif
@if ($resumen['d_p'] < 40 && $resumen['d_p'] > 10)
  <img src="/images/quiz/tarde.png" width="50px" alt="" title="ATARDECER">
  <h6>ATARDECER</h6>
@endif
@if ($resumen['d_p'] <= 10)
  <img src="/images/quiz/noche.png" width="50px" alt="" title="NOCHE">
  <h6>NOCHE</h6>
@endif