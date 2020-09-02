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
    <h1>{{trans('t.activity.show.title')}} </h1>
    <div class="section-header-button">
      {{-- <a href="features-post-create.html" class="btn btn-primary">Add New</a> --}}
      <button onClick="window.location.href='{{ route('item.create',[$content->activity->id,$content->id]) }}'"
        class="btn btn-primary">Nuevo Item</button>
    </div>
  </div>
  <div class="section-body">
    <h2 class="section-title">Lista de todos los Items</h2>
    <p class="section-lead">This page is for managing packages including questions and answers.</p>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-md ">
            <thead>

              <tr>
                <th>#</th>
                <th>{{ trans('t.activity.item.item_id') }}</th>
                <th>{{ trans('t.activity.item.title') }}</th>
                <th>{{trans('t.activity.item.type')}}</th>
                <th>{{ trans('t.activity.item.content') }}</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="items" data-content="{{ $content->id }}">
              @foreach ($items as $i)
              <tr>
                <td class="handle" data-id="{{ $i->id }}" data-position="{{ $i->position }}"><i class="fa fa-arrows-alt"></i></td>
                <td>{{$i->id}}</td>
                <td>
                  {{$i->title}}
                  <div class="table-links">
                    <a href="{{route('item.show',[$content->activity->id,$content->id,$i->id])}}">{{ trans('t.view') }}</a>
                    <div class="bullet"></div>
                    <a href="{{route('item.edit',[$content->activity->id,$content->id,$i->id])}}">{{ trans('t.edit') }}</a>
                    <div class="bullet"></div>
                    <a href="#" class="text-danger">{{ trans('t.trash') }}</a>
                  </div>
                </td>
                <td>{{ucfirst($i->itemType->name)}}</td>
                <td>{{$i->content}}</td>
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
        // fetch a?
        location.reload();
      }
    });
</script>
@endpush
