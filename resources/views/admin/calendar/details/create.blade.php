@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="/vendor/clockpicker/css/bootstrap-clockpicker.min.css">
@endpush
@section('content')
<div class="col-md-12">
  <section class="section">
    <div class="section-header">
      <a href="{{ route('calendar.activity.edit',$c->id) }}">
        <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
      </a>
      <h1>Asignar usuarios al especialista</h1>
    </div>
    <div class="section-body">
      <h2 class="section-title">Usuario : </h2>
      <form action="{{ route('calendar.activity.store',[$c->id,$day]) }}" method="post">
        @csrf
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="tableSelect" class="table table-md table-hover">
                <thead>
                <tr>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Obejective</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  @forelse ($activities as $a)
                  <tr>
                    <td>
                      <div class="form-group">
                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                          <input type="text" class="form-control" readonly value="8:00" name="time-{{ $a->id  }}" id="" required >
                      </div>
                      </div>
                    </td>    
                    <td>{{ $a->id }}</td>
                    <td>
                      {{ $a->name }}
                      <div class="table-links">
                        <a href="#">{{ trans('t.view') }}</a>
                        <div class="bullet"></div>
                        <a href="{{route('activity.edit',$a->id)}}">{{ trans('t.edit') }}</a>
                        <div class="bullet"></div>
                        <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                      </div>
                    </td>
                    <td>{!! $a->objective !!}</td>
                    <td><small class="badge badge-success">{{$a->scale_id}}</small></td>
                    <td>
                      @foreach ($a->tagsCategories as $c)
                      <div class="badge badge-success">{{ $c->category->name }}</div>
                      @endforeach
                    </td>
                    
                  </tr>
                  @empty
                  <tr>
                    <td colspan="2" class="text-center">No hay usuarios</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success float-right">Asignar</button>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
@endsection
@push('javascript')  
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>  
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script> 
<script>
  $(function () {
    $("#tableSelect").DataTable();
  });

  $('.clockpicker').clockpicker();
</script>

@endpush