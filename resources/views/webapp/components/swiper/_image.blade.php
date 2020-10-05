@php
  $col = empty($item->body) ? 'col-md-12' : 'col-md-6';
@endphp
<section class="ml-2 mr-2 row">
  <div class="section-body">
    <div class="tex-center">
      <div class="card">
        <div class="card-header">
          <h4>{{ $item->content->name }}</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              {{-- <h3 class="text-center mt-2"> Titulo </h3> --}}
              <h3 class="text-center">{{ $item->title }}</h3>
            </div>
            @if ($item->present()->getPhoto())
            <div class="col-sm-12 {{ $col }} col-xs-12">
              <img src="{{ $item->present()->getPhoto() }}" height="240px" alt="">  
            </div>
            @endif
            <div class="col-sm-12 col-md-6 col-xs-12">
              {!! $item->present()->getText() !!}
            </div>
          </div>            
        </div>
        <div class="card-footer d-flex justify-content-around">
          {{-- <button class="btn btn-secondary">ATRAS</button> --}}
          {{-- <button class="btn btn-success">CONTINUAR</button> --}}
        </div>
      </div>
    </div>
  </div>
</section>