@extends('layouts.app')

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
                <th>{{ trans('t.activity.item.content') }}</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $i)
              <tr>
                <td></td>
                <td>{{$i->id}}</td>
                <td>{{$i->title}}</td>
                <td>{{$i->content}}</td>
                <td> <a href="{{route('item.edit',[$content->activity->id,$content->id,$i->id])}}" class="btn btn-primary">Editar</a> </td>
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
