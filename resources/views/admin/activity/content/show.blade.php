@extends('layouts.app')

@push('stylesheet')
<script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
@endpush

@section('content')
<section class="section">
  <div class="section-header">
    <a href="{{ route('activity.show',$content->activity->id) }}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>Panel de items</h1>
    <div class="section-header-button">
      {{-- <a href="features-post-create.html" class="btn btn-primary">Add New</a> --}}
      {{-- <button onClick="window.location.href='{{ route('item.create',[$content->activity->id,$content->id]) }}'"
        class="btn btn-primary">Nuevo Item</button> --}}


      <button type="button" class="btn btn-sm btn-primary"
        data-toggle="modal"
        data-target="#createModal">
          Nuevo Item
      </button>
      <a href="{{ route('preview.content',$content->id) }}" class="btn btn-success btn-sm">Visualizar</a>
    </div>
  </div>
  <div class="section-body">
    {{-- <h2 class="section-title">Lista de todos los Items</h2> --}}
    <h2 class="section-title">Actividad <strong>{{ Str::upper($content->activity->name) }}</strong> / {{ Str::upper($content->name) }} </h2>
    {{-- <p class="section-lead">This page is for managing packages including questions and answers.</p> --}}
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-md ">
            <thead>
              <tr>
                <th>#</th>
                <th>Posición</th>
                <th>{{ trans('t.activity.item.title') }}</th>
                <th>{{trans('t.activity.item.type')}}</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody id="items" data-content="{{ $content->id }}">
              @foreach ($items as $i)
              <tr>
                <td class="handle" data-id="{{ $i->id }}" data-position="{{ $i->position }}"><i class="fa fa-arrows-alt"></i></td>
                <td>{{$i->position}}</td>
                <td>
                  {{$i->name}}
                  {{-- <div class="table-links"> --}}
                    {{-- <a href="{{route('item.show',[$content->activity->id,$content->id,$i->id])}}">{{ trans('t.view') }}</a> --}}
                    {{-- <div class="bullet"></div> --}}
                    {{-- <a href="{{route('item.edit',[$content->activity->id,$content->id,$i->id])}}">{{ trans('t.edit') }}</a> --}}
                    {{-- <div class="bullet"></div> --}}
                    {{-- <a href="#" class="text-danger">{{ trans('t.trash') }}</a> --}}
                  {{-- </div> --}}
                </td>
                <td>{!! $i->present()->getIcons() !!}</td>
                <td>
                  <a href="{{ route('preview.item',$i->id) }}" class="btn btn-success btn-sm">Visualizar</a>
                </td>
                <td>

                  <a href="{{ route('item.edit',$i->id) }}" class="btn btn-info btn-sm">Editar</a>
                  <button type="button" class="btn btn-sm btn-danger"
                  data-toggle="modal"
                  data-target="#deleteModal"
                  data-id="{{$i->id}}">
                    Eliminar
                  </button>
                </td>
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
@push('outerDiv')
  @include('admin.activity.content.item._modal_create')
  @include('components.modal._delete')
@endpush
@push('javascript')
<script>
  $(function () {
    $('#createModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var modal = $(this);
      var id = "{{ $content->id }}";
      var url = "{{route('item.store',[$content->activity->id,$content->id])}}";
      modal.find('.modal-title').text('¿Desea crear un ítem?');
      $('#id_value').val(id);
      modal.find('#formPOST').attr('action',url);
    });

    $('#deleteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var modal = $(this);
      var id = button.data('id');
      var url = "{{route('item.delete')}}";
      modal.find('.modal-title').text('¿Desea eliminar item?');
      modal.find('.modal-body input').val(id);
      modal.find('#formDelete').attr('action',url);
    });
  });
</script>
<script>
  var el = document.getElementById('items');
  let url = "{{ route('item.changePosition', [$content->activity->id, $content->id] ) }}";

  Sortable.create(el, {
    animation: 300,
    handle: '.handle',
    sort: true,
    chosenClass: 'active',
    onEnd: function(evt) {
      // console.log(evt.oldIndex +','+ evt.newIndex);
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
