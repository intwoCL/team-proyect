@if ($report['day_score'] == 100)
  <img src="/images/quiz/dia.png" width="50px" alt="">
@endif
@if ($report['day_score'] == 70)
  <img src="/images/quiz/manana.png" width="50px" alt="">
@endif
@if ($report['day_score'] == 40)
  <img src="/images/quiz/tarde.png" width="50px" alt="">
@endif
@if ($report['day_score'] == 10)
  <img src="/images/quiz/noche.png" width="50px" alt="">
@endif