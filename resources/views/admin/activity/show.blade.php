@extends('layouts.app')
@push('stylesheet')
<script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
@endpush
@section('content')
  <section class="section">
    <div class="section-header">
      <a href="{{ route('activity.index') }}">
        <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
      </a>
      <h1>{{trans('t.activity.show.title')}} </h1>
      @if ($a->user_id == current_user()->id)
      <div class="section-header-button">
        <button onClick="window.location.href='{{ route('content.create',$a->id) }}'" class="btn btn-primary">Nuevos Contenidos</button>
      </div>
      @endif
    </div>
    <div class="section-body">
      <h2 class="section-title">Actividad <strong>{{ Str::upper($a->name) }}</strong></h2>
     {{-- <p class="section-lead">This page is for managing packages including questions and answers.</p> --}}
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-md">
              <thead>
              <tr>
                @if ($a->user_id == current_user()->id)
                <th>#</th>
                @endif

                <th>Position</th>
                <th>Nombre</th>
                <th>Objetivo</th>
                <th>Quiz</th>
                <th></th>
                <th></th>
              </tr>
              </thead>
              <tbody id="items" data-activity="{{ $a->id }}">
              @foreach ($a->contents as $c)
              <tr>

                @if ($a->user_id == current_user()->id)
                <td class="handle" data-id="{{ $c->id }}" data-nombramiento="{{ $c->position }}">
                  <i class="fa fa-arrows-alt"></i>
                </td>
                @endif

                <td>{{$c->position}}</td>
                <td>
                  {{$c->name}}
                  @if ($a->user_id == current_user()->id)

                  <div class="table-links">
                    {{-- <a href="{{route('content.show',[$a->id,$c->id])}}">Items</a> --}}
                    <div class="bullet"></div>
                    <a href="{{route('content.edit',[$a->id,$c->id])}}">{{ trans('t.edit') }}</a>
                    {{-- <div class="bullet"></div> --}}
                    {{-- <a href="#" class="text-danger">{{ trans('t.trash') }}</a> --}}
                  </div>
                  @endif
                </td>
                <td>{!! $c->objective !!}</td>
                <td>
                  {!! $c->present()->getQuiz() !!}
                </td>
                <td> <a href="{{ route('preview.content',$c->id) }}" class="btn btn-success btn-sm">Visualizar</a></td>
                <td> <a href="{{route('content.show',[$a->id,$c->id])}}" class="btn btn-primary btn-sm">Items</a> </td>
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

<script>
  var el = document.getElementById('items');
  let url = "{{ route('content.changePosition', $a->id ) }}";

  Sortable.create(el, {
    animation: 300,
    handle: '.handle',
    sort: true,
    chosenClass: 'active',
    onEnd: function(evt) {
      var newIndex = evt.newIndex+1;
      var oldIndex = evt.oldIndex+1;
      var params = {
        oldIndex,
        newIndex
      };
      findFetch(url,params);
    }
  });

  function findFetch(url,params){
    axios.put(url, { params })
    .then(response => {
        location.reload();
    }).catch(e => {
        console.log(e);
    })
  }
</script>
@endpush
