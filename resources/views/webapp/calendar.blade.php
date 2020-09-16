@extends('webapp.components.app')
@push('stylesheet')

<style>
  .card-horizontal {
    display: flex;
    flex: 1 1 auto;
  }
  .card-items-shadow {
    box-shadow: 2px 2px 2px #716f6f !important;
  }
</style>
@endpush
@section('content')
<div class="container" style="padding-top: 90px !important;">
  <section class="section">
    <div class="section-header">
      <form action="{{ route('app.findCalendar') }}" method="post" class="">
        @csrf
        <div class="form-group row" id="data_1">
          <label for="fecha" class="col-sm-2 col-12 col-form-label">{{ trans('t.user.calendar.date') }}</label>
          <div class="input-group date col-sm-12 col-12">
            <input type="month" name="date" id="date" class="form-control" value="{{$date}}">
          </div>
          <button type="submit" class="btn btn-primary btn-sm">{{ trans('t.activity.create.submit') }}</button>
        </div>
      </form>
    </div>
  </section>
  <section class="section">
    <div class="section-body">
      <h2 class="section-title">{{ trans('t.user.calendar.date') }}: </h2>
      <div class="card">
        <div class="card-body">
          <div class="">
            <table id="tableSelect" class="table table-sm table-hover">
              <thead>
              <tr>
                <th></th>
                <th>{{ trans('t.user.calendar.date') }}</th>
                <th>{{ trans('t.user.calendar.specialist') }}</th>
              </tr>
              </thead>
              <tbody>
                @forelse ($attentions as $a)
                <tr>
                  <td class="bg-{{ $a->getColor() }}">{{ $a->getState() }}</td>
                  <td>{{ $a->getAttentionDate() }}</td>
                  <td>{{ $a->specialist()->present()->getFullName() }}</td>
                </tr>
                @empty
                <tr>
                  <td colspan="3" class="text-center">{{ trans('t.user.calendar.register') }}</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@push('footerNav')
{{-- @include('webapp.navbar.top') --}}
@include('webapp.components.bottom')
@endpush
@push('javascript')
<script>
  $(document).ready(function() {
    $(".card-items").hover(
      function() {
        $(this).addClass('card-items-shadow').css('cursor', 'pointer'); 
      }, function() {
        $(this).removeClass('card-items-shadow');
      }
    );
    value(swiper);
  });
</script>
@endpush