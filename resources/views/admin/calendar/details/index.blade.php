@extends('layouts.app')
@push('stylesheet')
<style>
  table {
  border-collapse: collapse !important;
}

table, th, td {
  border: 1px solid #a09d9d !important;
}
</style>
@endpush
@section('content')
  <section class="section">
    <div class="section-header">
      <a href="{{ route('calendar.index') }}">
        <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
      </a>
      <h1>{{ trans('t.user.calendar.panel_calendar') }} - {{ $c->name }}</h1>
      <div class="section-header-button">
        <a href="{{ route('calendar.activity.edit',$c->id) }}" class="btn btn-primary btn-sm">{{ trans('t.edit') }}</a>
        <a href="" class="btn btn-success btn-sm">{{ trans('t.preview') }}</a>
      </div>
    </div>
    <div class="section-body">
      {{-- <h2 class="section-title">Lista de todas las actividades </h2> --}}
      {{-- <p class="section-lead">This page is for managing packages including questions and answers.</p> --}}
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th scope="col">{{ trans('t.days.1') }}</th>
                  <th scope="col">{{ trans('t.days.2') }}</th>
                  <th scope="col">{{ trans('t.days.3') }}</th>
                  <th scope="col">{{ trans('t.days.4') }}</th>
                  <th scope="col">{{ trans('t.days.5') }}</th>
                  <th scope="col">{{ trans('t.days.6') }}</th>
                  <th scope="col">{{ trans('t.days.7') }}</th>
                </tr>
              </thead>
              <tbody>
              @for ($i = 0; $i < $max; $i++)
                <tr>
                @for ($j = 0; $j < 7; $j++)
                  <td>{{ !empty($activities[$j][$i]) ? $activities[$j][$i]->getCodeNameTime() : '' }}</td>
                @endfor
                </tr>
              @endfor             
              </tbody> 
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('javascript')

@endpush