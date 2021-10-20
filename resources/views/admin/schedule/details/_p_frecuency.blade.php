
@if ($resumen['f_p'] == 100)
  <i class="fa fa-square fa-4x text-primary" title="[1-10]"></i>
  <h6>[1-10]</h6>

@endif
@if ($resumen['f_p'] < 100 && $resumen['f_p'] >= 70)
  <i class="fa fa-square fa-4x text-warning" title="[11-20]"></i>
  <h6>[11-20]</h6>
@endif
@if ($resumen['f_p'] < 70 && $resumen['f_p'] >= 40)
  <i class="fa fa-square fa-4x text-success" title="[21-30]"></i>
  <h6>[21-30]</h6>
@endif
@if ($resumen['f_p'] < 10)
  <i class="fa fa-square fa-4x text-danger" title="[31-40]"></i>
  <h6>[31-40]</h6>
@endif