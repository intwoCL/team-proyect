@if ($report['day_score'] == 100)
<img src="/images/quiz/manana.png" width="25px" alt="" title="AMANECER">
@endif
@if ($report['day_score'] == 70)
<img src="/images/quiz/dia.png" width="25px" alt="" title="TARDE">
@endif
@if ($report['day_score'] == 40)
  <img src="/images/quiz/tarde.png" width="25px" alt="" title="ATARDECER">
@endif
@if ($report['day_score'] == 10)
  <img src="/images/quiz/noche.png" width="25px" alt="" title="NOCHE">
@endif