@php
    $now = new \DateTime();
    $fecha = $now->format('d-m-Y');
@endphp
@extends('layouts.app')

@push('stylesheet')
@endpush
@section('content')
<section class="section">
  <div class="section-header">
    <a href="{{ route('attention.index') }}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>Tickets</h1>
  </div>

  <div class="section-body">
    {{-- <h2 class="section-title">Help Your Customer</h2>
    <p class="section-lead">
      Some customers need your help.
    </p> --}}

    <div class="row">
      <div class="col-md-12">
        @include('partials._errors')
        <div class="card">
          <div class="card-header">
            <h4>Tickets</h4>
          </div>
          <div class="card-body">
            <a href="#" class="btn btn-primary btn-icon icon-left btn-lg btn-block mb-4 d-md-none" data-toggle-slide="#ticket-items">
              <i class="fas fa-list"></i> All Tickets
            </a>
            <div class="tickets">
              <div class="ticket-items" id="ticket-items">
                <div class="ticket-item active">
                  <div class="ticket-title">
                    <h4>{{ $a->getAttentionDate() }}</h4>
                  </div>
                  <div class="ticket-desc">
                    <div>Comentario de entrada: <p>{{ $a->comment_in }}.</p></div>
                  </div>

                  <div class="ticket-desc">
                    <div>Comentario de salida: <p>{{ $a->comment_out }}.</p></div>
                  </div>

                </div>
                <div class="ticket-item">
                  <div class="ticket-title">
                    <h4>Información</h4>
                  </div>
                  <div class="ticket-desc">
                    <div><a href=""></a></div>
                  </div>
                </div>
                {{-- <div class="ticket-item">
                  <div class="ticket-title">
                    <h4>Where is my mother?</h4>
                  </div>
                  <div class="ticket-desc">
                    <div>Irwansyah Saputra</div>
                    <div class="bullet"></div>
                    <div>July 18, 2018</div>
                  </div>
                </div> --}}
              </div>
              <div class="ticket-content">
                <div class="ticket-header">
                  <div class="ticket-sender-picture img-shadow">
                    <img src="{{ $a->user->getPhoto() }}" alt="image">
                  </div>
                  <div class="ticket-detail">
                    <div class="ticket-title">
                      <h4>{{ $a->user->getFullName() }}</h4>
                    </div>
                    <div class="ticket-info">
                      @php
                        $state = "warning";
                      @endphp
                      <div class="font-weight-600"><div class="badge badge-{{ $state }}">{{ $a->getState() }}</div></div>
                      <div class="bullet"></div>
                      {{-- <div class="text-primary font-weight-600">2 min ago</div> --}}
                    </div>
                  </div>
                </div>
                <div class="ticket-description">
                  <div class="ticket-divider"></div>
                  <div class="ticket-form">
                    <form action="{{route('attention.update', $a->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <textarea class="summernote form-control" name="commnet_out" placeholder="Type a reply ..." style="height: 100px"></textarea>
                      </div>
                      <div class="form-group text-right">
                        <button  type="submit" class="btn btn-primary btn-lg">
                          Reply
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@push('javascript')
@endpush