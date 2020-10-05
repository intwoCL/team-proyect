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
              <img src="{{ $item->present()->getPhoto() }}" height="240px" alt="">
              <div class="text-center mt-4">
                <div class="text-center">
                  <div class="mp3-audio">
                    <audio controls class="mp3-auido">
                      <source src="{{ !empty($item->data) ? $item->present()->getAudio() : '' }}">
                      Your browser does not support the audio element.
                    </audio>
                  </div>
                </div>
              </div>   
            </div>
            <div class="col-sm-12 col-md-6 col-xs-12 mt-2">
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