@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Article</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Components</a></div>
      <div class="breadcrumb-item">Article</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Articles</h2>
    <p class="section-lead">This article component is based on card and flexbox.</p>

    <div class="row">
      <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <article class="article">
          <div class="article-header">
            <div class="article-image" data-background="../assets/img/news/img08.jpg">
            </div>
            <div class="article-title">
              <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
            </div>
          </div>
          <div class="article-details">
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. </p>
            <div class="article-cta">
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </article>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <article class="article">
          <div class="article-header">
            <div class="article-image" data-background="../assets/img/news/img04.jpg">
            </div>
            <div class="article-title">
              <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
            </div>
          </div>
          <div class="article-details">
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. </p>
            <div class="article-cta">
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </article>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <article class="article">
          <div class="article-header">
            <div class="article-image" data-background="../assets/img/news/img09.jpg">
            </div>
            <div class="article-title">
              <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
            </div>
          </div>
          <div class="article-details">
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. </p>
            <div class="article-cta">
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </article>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <article class="article">
          <div class="article-header">
            <div class="article-image" data-background="../assets/img/news/img12.jpg">
            </div>
            <div class="article-title">
              <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
            </div>
          </div>
          <div class="article-details">
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. </p>
            <div class="article-cta">
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </article>
      </div>
    </div>

    <h2 class="section-title">Article Style B</h2>
    <div class="row">
      <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <article class="article article-style-b">
          <div class="article-header">
            <div class="article-image" data-background="../assets/img/news/img13.jpg">
            </div>
            <div class="article-badge">
              <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> Trending</div>
            </div>
          </div>
          <div class="article-details">
            <div class="article-title">
              <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
            </div>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. </p>
            <div class="article-cta">
              <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </article>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <article class="article article-style-b">
          <div class="article-header">
            <div class="article-image" data-background="../assets/img/news/img15.jpg">
            </div>
          </div>
          <div class="article-details">
            <div class="article-title">
              <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
            </div>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. </p>
            <div class="article-cta">
              <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </article>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <article class="article article-style-b">
          <div class="article-header">
            <div class="article-image" data-background="../assets/img/news/img07.jpg">
            </div>
          </div>
          <div class="article-details">
            <div class="article-title">
              <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
            </div>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. </p>
            <div class="article-cta">
              <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </article>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <article class="article article-style-b">
          <div class="article-header">
            <div class="article-image" data-background="../assets/img/news/img02.jpg">
            </div>
          </div>
          <div class="article-details">
            <div class="article-title">
              <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
            </div>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. </p>
            <div class="article-cta">
              <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </article>
      </div>
    </div>
 
  </div>
</section>
</section>



@endsection
@push('javascript')

@endpush