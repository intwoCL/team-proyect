<div class="col-12 col-sm-6 col-md-6 col-lg-3">
  <article class="article card-items" role="button" onclick=" window.location='{{ route('app.activity',$a->id) }}'">
    <div class="article-header">
      <div class="article-image" data-background="{{ $a->present()->getPhoto() }}">
      </div>
      <div class="article-title">
        <h2><a href="#">{{ $a->name }}</a></h2>
      </div>
      <div class="article-badge" style="margin-bottom: 100px; margin-top: 25px;">
        <div class="article-badge-item bg-info"><strong>10 veces</strong></div>
      </div>
    </div>
    <div class="article-details">
      <p>{!! $a->objective !!}</p>
      <div class="article-cta">
        <a href="#" class="btn btn-primary btn-block">EMPEZAR</a>
      </div>
    </div>
  </article>
</div>