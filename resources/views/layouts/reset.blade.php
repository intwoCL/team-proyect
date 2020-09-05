@extends('layouts.skeleton')

@section('app')
    <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <h4 class="text-dark font-weight-normal"><span class="font-weight-bold">Team</span></h4>
            
            @if (session('success'))
            <div class="alert alert-success">
              <div class="alert-title">Enviado</div>
              {{ session('success') }}
            </div>
            @endif
            @if (session('danger'))
            <div class="alert alert-danger">
              <div class="alert-title">Error</div>
              {{ session('danger') }}
            </div>
            @endif

            <div class="card card-primary">
              <div class="card-header"><h4>{{ trans('t.login.forgot') }}</h4></div>

              <div class="card-body">
                <p class="text-muted">{{ trans('t.login.message') }}</p>
                <form method="POST" action="{{ route('reset.password') }}">
                  @csrf
                  <div class="form-group">
                    <label for="email">{{ trans('t.user.profile.email') }}</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      {{ trans('t.login.reset') }}
                    </button>
                  </div>
                </form>
              </div>
            </div>
            @include('partials.footer')
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection