@extends('layouts.app')

@section('content')


<section class="section">
  <div class="section-header">
    {{-- <a href="{{ route('user.index') }}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a> --}}
    <a href="{{ $callback }}">
      <i class="fa fa-chevron-circle-left mr-2 fa-2x text-secundary"></i>
    </a>
    <h1>{{trans('t.user.show.title')}}</h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        @include('components.card._profile')
      </div>
      <div class="col-md-6">
        <section class="section">
          <div class="section-body">
            <div class="card">
              <div class="card-header">
                <h3>Calendarios</h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="tableSelect" class="table table-sm table-hover">
                    <thead>
                    <tr>
                      {{-- <th>#</th> --}}
                      <th>Nombre</th>
                      <th>Email</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                      @forelse (current_user()->assignmentUsers as $ass)
                      <tr>
                        {{-- <td>{{ $u->id }}</td> --}}
                        <td>{{ $ass->user->present()->getFullName() }}</td>
                        <td>{{ $ass->user->email }}
                          <div class="table-links">
                            <div class="bullet"></div>
                            <a href="{{ route('enrollment.show',$ass->id) }}">{{ trans('t.view') }}</a>
                            {{-- <a href="">{{ trans('t.edit') }}</a>
                            <div class="bullet"></div>
                            <a href="" class="text-danger">{{ trans('t.trash') }}</a> --}}
                          </div>
                        </td>
                          {{-- <td><a href="{{ route('assignment.show',$u->id) }}" class="btn btn-success">Asignados</a></td> --}}
                        <td><a href="{{ route('attention.create', $ass->user->id) }}" class="btn btn-success btn-sm">Tomar hora</a>
                        <a href="{{ route('attention.historial', $ass->user->id) }}" class="btn btn-primary btn-sm ml-2">Historial</a></td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="3" class="text-center">No tiene agregado</td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="col-12 col-md-6 col-lg-6">
        
        {{-- <div class="card">
          <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Horizontal Form</h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">{{ trans('t.user.profile.email') }}</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="inputEmail3" placeholder="{{ trans('t.user.profile.email') }}" required="" name="email" value="{{$user->email}}" disabled="true">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputRut" class="col-sm-3 col-form-label">{{ trans('t.user.profile.run') }}</label>
                <div class="col-sm-9">
                  <input type="text"  name="run" class="form-control" autocomplete="off" value="{{$user->run}}" required maxlength="9" min="8" autocomplete="off" onkeyup="this.value = validateRun(this.value)" placeholder="{{ trans('t.user.profile.run') }}" disabled="true">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputFirstName" class="col-sm-3 col-form-label">{{ trans('t.user.profile.first_name') }}</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputFirstName" placeholder="{{ trans('t.user.profile.first_name') }}" required="" name="first_name" value="{{$user->first_name}}" disabled="true">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputLastName" class="col-sm-3 col-form-label">{{ trans('t.user.profile.last_name') }}</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputLastName" placeholder="{{ trans('t.user.profile.last_name') }}" required="" name="last_name" value="{{$user->last_name}}" disabled="true">
                </div>
              </div>

              <fieldset class="form-group">
                <label>{{ trans('t.user.profile.lang') }}<small class="text-danger">*</small></label>
                <select class="form-control select2" name="lang" required="" value="{{$user->lang}}" disabled="true">
                  <option value="es">{{ trans('t.spanish') }}</option>
                  <option value="en">{{ trans('t.english') }}</option>
                </select>  
              </fieldset>

              <fieldset class="form-group">
                <div class="row">
                  <div class="col-form-label col-sm-3 pt-0">{{ trans('t.user.index.admin') }}<small class="text-danger">*</small></div>
                  <label class="custom-switch mt-2">
                    <input type="checkbox" name="admin" class="custom-switch-input" value="{{$user->admin}}" disabled="true">
                    <span class="custom-switch-description mr-2">{{ trans('t.no') }}</span>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">{{ trans('t.yes') }}</span>
                  </label>
                </div>
              </fieldset>

              <fieldset class="form-group">
                <div class="row">
                  <div class="col-form-label col-sm-3 pt-0">{{ trans('t.user.index.specialist') }}<small class="text-danger">*</small></div>
                  <label class="custom-switch mt-2">
                    <input type="checkbox" name="specialist" class="custom-switch-input" value="{{$user->speciaist}}" disabled="true">
                    <span class="custom-switch-description mr-2">{{ trans('t.no') }}</span>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">{{ trans('t.yes') }}</span>
                  </label>
                </div>
              </fieldset>

              <div class="form-group row">
                <label for="inputSpecialty" class="col-sm-3 col-form-label">{{ trans('t.user.profile.specialty') }} <span class="text-danger"></span></label>
                <div class="col-sm-9">
                  <input type="text" name="specialty" class="form-control" id="inputSpecialty" placeholder="{{ trans('t.user.profile.specialty') }}" required="" value="{{$user->specialty}}" disabled>
                </div>
              </div>

          </form>
        </div> --}}
      </div>
    </div>
  </div>
</section>
@endsection
