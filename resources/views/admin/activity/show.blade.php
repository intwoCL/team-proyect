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
      <div class="section-header-button">
        <button onClick="window.location.href='{{ route('content.create',$a->id) }}'" class="btn btn-primary">Nuevos Contenidos</button>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Lista de todos los contenidos</h2>
      <p class="section-lead">This page is for managing packages including questions and answers.</p>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-md">
              <thead>
              <tr>
                <th>#</th>
                <th>Position</th>
                <th>Nombre</th>
                <th>Objetivo</th>
                <th></th>
                <th></th>
              </tr>
              </thead>
              <tbody id="items" data-activity="{{ $a->id }}">
              @foreach ($a->contents as $c)
              <tr>
                <td class="handle" data-id="{{ $c->id }}" data-position="{{ $c->position }}"><i class="fa fa-arrows-alt"></i></td>
                <td>{{$c->position}}</td>
                <td>{{$c->name}}</td>
                <td></td>
                <td> <a href="{{route('content.show',[$a->id,$c->id])}}" class="btn btn-primary btn-sm">Items</a> </td> 
                <td> <a href="{{route('content.edit',[$a->id,$c->id])}}" class="btn btn-primary btn-sm">Editar</a> </td>
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
  // var sortable = Sortable.create(el);
    Sortable.create(el, {
      animation: 300,
      handle: '.handle',
      sort: true,
      chosenClass: 'active',
      onEnd: function(evt) {
        console.log(evt);

        var newIndex = evt.newIndex+1;
        // fecth si es correcto hace un
        location.reload(); 
      }
    });

</script>
@endpush