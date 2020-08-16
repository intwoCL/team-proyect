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
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Lista de todos los Items</h2>
      <p class="section-lead">This page is for managing packages including questions and answers.</p>
      @include('partials._alert')
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-md ">
              <thead>
              <tr>
                <th>#</th>
                <th>Id Item</th>
                <th>Titulo</th>
                <th>Contenido</th>
                <th></th>
                <th></th>
              </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection