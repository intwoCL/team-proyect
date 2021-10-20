
@if ($resumen['e_p'] == 100)
  <img src="/images/quiz/cara0.png" width="50px" alt="" title="EXCELENTE">
  <h6>EXCELENTE</h6>
@endif
@if ($resumen['e_p'] < 100 && $resumen['e_p'] > 10)
  <img src="/images/quiz/cara1.png" width="50px" alt="" title="BIEN">
  <h6>BIEN</h6>
@endif
@if ($resumen['e_p'] <= 10)
  <img src="/images/quiz/cara2.png" width="50px" alt="" title="NORMAL">
  <h6>NORMAL</h6>
@endif