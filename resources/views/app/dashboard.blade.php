@extends('layouts.app')

@section('title', 'Admin Dashboard')
@push('stylesheet')
<script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
{{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/> --}}

@endpush
@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
 
  <!-- Simple List -->
  <ul class="list-group" id="demo1">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Morbi leo risus</li>
    <li class="list-group-item">Porta ac consectetur ac</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
  <ul class="list-group mt-4" id="demo2">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Morbi leo risus</li>
    <li class="list-group-item">Porta ac consectetur ac</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
  <br>
  <br>
  <br>
  <br>
  

  </section>
@endsection
@push('javascript')

<script>
      Sortable.create(demo1, {
      animation: 100,
      group: 'list-1',
      draggable: '.list-group-item',
      handle: '.list-group-item',
      sort: true,
      filter: '.sortable-disabled',
      chosenClass: 'active'
    });

    Sortable.create(demo2, {
      group: 'list-1',
      handle: '.list-group-item'
    });

</script>
@endpush