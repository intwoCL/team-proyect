<div class="profile-widget">
  <div class="profile-widget-header">
    <div class="profile-widget-items">
      <div class="profile-widget-item">
        <div class="profile-widget-item-label">
          <img alt="image" src="{{ $photo }}" style="width: 50px !important;" class="rounded-circle">
        </div>
        {{-- <div class="profile-widget-item-value">187</div> --}}
      </div>
      {{-- <div class="profile-widget-item">
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
      </div> --}}
    </div>
  </div>
  <div class="profile-widget-description pb-0">
    <div class="profile-widget-name">
      {{ $name }}
      <div class="text-muted d-inline font-weight-normal"><div class="slash">
      </div> {{ $email }}</div>
    </div>
    <p>{{ $description }}</p>
  </div>
</div>