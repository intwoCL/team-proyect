
@if ($report['frequency_score'] == 100)
  <i class="fa fa-square fa-2x text-primary" title="[1-10]"></i>
@endif
@if ($report['frequency_score'] == 70)
  <i class="fa fa-square fa-2x text-warning" title="[11-20]"></i>
@endif
@if ($report['frequency_score'] == 40)
  <i class="fa fa-square fa-2x text-success" title="[21-30]"></i>
@endif
@if ($report['frequency_score'] == 10)
  <i class="fa fa-square fa-2x text-danger" title="[31-40]"></i>
@endif