<div class="row">
  <div class="col-12 col-md-6 col-lg-6">
    @if (session('info'))
    <div class="alert alert-primary alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        {{ session('info') }}
      </div>
    </div>        
    @endif
    @if (session('success'))
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        {{ session('success') }}
      </div>
    </div>
    @endif
    @if (session('danger'))
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        {{ session('danger') }}
      </div>
    </div>
    @endif
    @if (session('warning'))
    <div class="alert alert-warning alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        {{ session('warning') }}
      </div>
    </div>
    @endif
    {{-- <div class="alert alert-secondary alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        This is a secondary alert.
      </div>
    </div> --}}
    {{-- <div class="alert alert-info alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        This is a info alert.
      </div>
    </div> --}}
    {{-- <div class="alert alert-light alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        This is a light alert.
      </div>
    </div> --}}
    {{-- <div class="alert alert-dark alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        This is a dark alert.
      </div>
    </div> --}}
  </div>
</div>