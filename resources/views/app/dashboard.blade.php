@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Bienvenido {{ current_user()->present()->getFullname() }}</h1>
    </div>
    <div class="section-body">
      <h2 class="section-title">Actividades Publicadas</h2>
      {{-- <p class="section-lead">This page is for managing packages including questions and answers.</p> --}}
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="tableSelect" class="table table-hover table-md">
              <thead>
              <tr>
                <th>Código</th>
                <th>{{ trans('t.activity_name') }}</th>
                <th>{{ trans('t.objetive') }}</th>
                <th>{{ trans('t.level') }}</th>
                <th>Categoría</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach ($activities as $a)
              <tr>
                <td>{{ $a->id }}</td>
                <td>
                  {{ $a->name }}
                  <div class="table-links">
                    {{-- <a href="#">{{ trans('t.view') }}</a> --}}
                    <div class="bullet"></div>
                    <a href="{{route('activity.edit',$a->id)}}">{{ trans('t.edit') }}</a>
                    {{-- <div class="bullet"></div> --}}
                    {{-- <a href="#" class="text-danger">{{ trans('t.trash') }}</a> --}}
                  </div>
                </td>
                <td>{!! $a->objective !!}</td>
                <td><small class="badge badge-success">{{$a->scale_id}}</small></td>
                <td>
                  @foreach ($a->tagsCategories as $c)
                  <div class="badge badge-success">{{ $c->category->name }}</div>
                  @endforeach
                </td>
                <td><a href="{{route('activity.show',$a->id) }}" class="btn btn-primary">{{ trans('t.activity.content.contents') }}</a></td>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('javascript')  
@include('partials._integrations')
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script> 
<script>
  $(function () {
    $("#tableSelect").DataTable();
  });
</script>
@endpush
