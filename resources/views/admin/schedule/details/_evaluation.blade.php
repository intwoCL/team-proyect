
@if ($report['evaluation_score'] == 100)
  <img src="/images/quiz/cara0.png" width="25px" alt="" title="EXCELENTE">
@endif
@if ($report['evaluation_score'] == 50)
  <img src="/images/quiz/cara1.png" width="25px" alt="" title="BIEN">
@endif
@if ($report['evaluation_score'] == 10)
  <img src="/images/quiz/cara2.png" width="25px" alt="" title="NORMAL">
@endif