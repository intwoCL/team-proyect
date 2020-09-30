<div class="card profile-widget">
  <div class="profile-widget-header">
  <img alt="image" src="{{ $user->present()->getPhoto() }}" class="rounded-circle profile-widget-picture">
  <div class="profile-widget-items">
    <div class="profile-widget-item">
    <div class="profile-widget-item-label">Posts</div>
    <div class="profile-widget-item-value">187</div>
    </div>
    <div class="profile-widget-item">
    <div class="profile-widget-item-label">Followers</div>
    <div class="profile-widget-item-value">6,8K</div>
    </div>
    <div class="profile-widget-item">
    <div class="profile-widget-item-label">Following</div>
    <div class="profile-widget-item-value">2,1K</div>
    </div>
  </div>
  </div>
  <div class="profile-widget-description pb-0">
  <div class="profile-widget-name">{{ $user->present()->getFullName() }} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{ $user->email }}</div></div>
  {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat.</p> --}}
  </div>
</div>