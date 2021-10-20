
@if ($report['frequency_score'] == 100)
  <i class="fa fa-square fa-4x text-primary"></i>
@endif
@if ($report['frequency_score'] == 70)
  <i class="fa fa-square fa-4x text-warning"></i>
@endif
@if ($report['frequency_score'] == 40)
  <i class="fa fa-square fa-4x text-success"></i>
@endif
@if ($report['frequency_score'] == 10)
  <i class="fa fa-square fa-4x text-danger"></i>
@endif