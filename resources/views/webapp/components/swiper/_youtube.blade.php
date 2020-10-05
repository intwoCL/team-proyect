@php
$col = !empty($item->body) ? 'col-md-6' : 'col-md-12';
@endphp
<section class="ml-2 mr-2 row">
  <div class="section-body">
    {{-- <div class="tex-center"> --}}
      <div class="card">
        <div class="card-header">
          <h4>{{ $item->content->name }}</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <h3 class="text-center">{{ $item->title }}</h3>
            </div>
            <div class="col-sm-12 {{ $col }} col-xs-12">
              <iframe width="100%" height="250px" src="https://www.youtube.com/embed/{{ $item->data }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="text-justify col-sm-12 col-md-6 col-xs-12">
              {!! $item->present()->getText() !!}
            </div>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-around">
          {{-- <button class="btn btn-secondary">ATRAS</button> --}}
          {{-- <button class="btn btn-success">CONTINUAR</button> --}}
        </div>
      </div>
    {{-- </div> --}}
  </div>
</section>
