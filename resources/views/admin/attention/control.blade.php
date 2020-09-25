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
                    <div>{{ trans('t.user.calendar.comment_in') }}: <p>{{ $a->comment_in }}.</p></div>
                  </div>

                  <div class="ticket-desc">
                    <div>{{ trans('t.user.calendar.comment_out') }}: <p>{{ $a->comment_out }}.</p></div>
                  </div>

                </div>
                <div class="ticket-item">
                  <div class="ticket-title">
                    <h4>{{ trans('t.user.calendar.information') }}</h4>
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
                      <h4>{{ $a->user->present()->getFullName() }}</h4>
                    </div>
                    <div class="ticket-info">
                      <div class="font-weight-600"><div class="badge badge-{{ $a->getColor() }}">{{ $a->getState() }}</div></div>
                      <div class="bullet"></div>
                      {{-- <div class="text-primary font-weight-600">2 min ago</div> --}}
                    </div>
                  </div>
                </div>
                <div class="ticket-description">
                  <div class="ticket-divider"></div>
                  <div class="ticket-form">
                    <form action="{{route('attention.update', $a->id)}}" method="POST">
                      @csrf
                      @method('PUT')

                      <fieldset class="form-group">
                        <label>{{ trans('t.user.calendar.status') }}<small class="text-danger">*</small></label>

                        <select class="form-control select2" name="status" required>
                          @foreach ($a->states as $key => $value )
                          @if($key==$a->status-1)
                          <option selected value="{{ $key + 1 }}">{{ $value }}</option>
                          @else
                          <option value="{{ $key + 1 }}">{{ $value }}</option>
                          @endif
                          @endforeach
                        </select>  
                      </fieldset>

                      <div class="form-group">
                        <label>{{ trans('t.user.calendar.comment_out') }}<small class="text-danger">*</small></label>
                        <textarea class="form-control" name="comment_out" placeholder="Comentario de salida ..." style="height: 100px" required="">{{ $a->comment_out }}</textarea>
                      </div>

                      <div class="form-group text-right">
                        <button  type="submit" class="btn btn-primary btn-lg">
                          {{ trans('button.update') }}
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