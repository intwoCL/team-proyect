@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="/vendor/clockpicker/css/bootstrap-clockpicker.min.css">
@endpush
@section('content')
<section class="section">
  <div class="section-header">
    <a href="{{ route('schedule.details.edit',$sch->id)}}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
  <h1>Asignar Actividad al Dia</h1>
  </div>
  <div class="row">
    <div class="col-12 col-md-6 col-lg-6">
      @include('partials._errors')
      <div class="card">

        <form action="{{route('schedule.activity.store',[$sch->id])}}" method="POST">
          @csrf
          <div class="card-body">

            <input type="hidden" name="schedule_id" value={{$sch->id}}>

            <div class="form-group">
              <label>Dias de Actividad</label>
              @foreach (helper_days() as $key => $value)
              <div class="form-check">
                <input class="form-check-input" name="days[]" type="checkbox" value="{{ $key + 1 }}">
                <label class="form-check-label">{{ strtoupper($value) }}</label>
              </div>
              @endforeach
            </div>

            <div class="form-group row">
              <label for="hora" class="col-sm-2 col-form-label">Hora</label>
              <div class="input-group col-sm-10">
                  <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-time"></span>
                      </span>
                      <input type="text" class="form-control" readonly value="8:00" name="worktime" id="worktime" required >
                  </div>
                  <div class="col-sm-12">
                      {!! $errors->first('hora', '<small class="form-text text-danger">:message</small>') !!}
                  </div>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputScale" class="col-sm-3 col-form-label">Actividad</label>
              <div class="col-sm-9">
                <select class="form-control select2" name="activity_id" required="">
                  @foreach ($activities as $a)
                  <option value="{{ $a->id }}">{{$a->id." - ".$a->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputName" class="col-sm-3 col-form-label">Veces</label>
              <div class="col-sm-9">
                <input type="number" name="times" min="1" class="form-control" required="" value="{{ !empty(old('times')) ? old('times') : '1'}}">
              </div>
            </div>

          </div>
          <div class="card-footer text-right">
            <button class="btn btn-primary" type="submit">{{trans('button.save')}}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#tableSelect").DataTable();
    $('.clockpicker').clockpicker();
  });
</script>
@endpush
