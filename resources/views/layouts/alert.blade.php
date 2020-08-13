<div class="alert alert-info">
  {{ session()->get('status') }}
  nice
</div>


<ul>
  @foreach ($errors->get('email') as $error)
  <li>{{ $error }}</li>
  @endforeach
</ul