@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>{{ trans('t.activity_panel') }}</h1>
      <div class="section-header-button">
        {{-- <a href="features-post-create.html" class="btn btn-primary">Add New</a> --}}
        <a href="{{ route('activity.create') }}" class="btn btn-primary">{{ trans('t.create_activity') }}</a>
      </div>

      {{-- 'activity.me --}}
    </div>
    <div class="section-body">
      <h2 class="section-title">{{ trans('t.activity_list') }}</h2>
      {{-- <p class="section-lead">This page is for managing packages including questions and answers.</p> --}}

      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link {{ activeTab('activity') ? 'active' : '' }}"  href="{{ route('activity.index') }}">Actividades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ activeTab('activity_me') ? 'active' : '' }}" href="{{ route('activity.me') }}">Mis actividades</a>
        </li>
      </ul>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="tableSelect" class="table table-hover table-sm">
              <thead>
              <tr>
                <th>Estado</th>
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
                <td>{!! $a->present()->getIconsHTML() !!}</td>
                <td>{{ $a->id }}</td>
                <td>
                  {{ $a->name }}
                  @if ($a->user_id == current_user()->id)
                  <div class="table-links">
                    <a href="{{route('activity.edit',$a->id)}}">
                      <strong>{{ trans('t.edit') }}</strong>
                    </a>
                  </div>
                  @endif
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
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#tableSelect").DataTable();
  });
</script>
@endpush
