@extends('frontEnd.layouts.master')
@section('title','Page')
@section('content')
 <section class="hero"style="background: url({{ asset('public/frontEnd/images/bg-image-4.jpg') }}) no-repeat center center / cover;">
      <div class="overlay"></div>
      <div class="hero-content">
        <h1>Grid Blog</h1>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Duis
          aute irure dolor in reprehenderit.</p>
      </div>
    </section>
   <section class="section section-lg bg-default">
        <div class="container">
          <div class="row row-40 row-md-50 row-xxl-80">
            @foreach ($blog as $value)
             <div class="col-sm-6 col-lg-4 wow fadeIn">
                        <!-- Post Classic-->
                        <article class="post-classic"><a class="post-classic-figure" href="blog-post.html"><img
                                    class="post-classic-image" src="{{ asset($value->image) }}" alt="" width="339"
                                    height="251" /></a>
                            <time class="post-classic-time" datetime="2021"><p>{{ \Carbon\Carbon::parse($value->created_at)->format('M d, Y') }}</p></time>
                            <div class="post-classic-divider"></div>
                            <p class="post-classic-title fw-medium link-black">
                            <a href="{{ route('blog.details', $value->slug) }}">{{ $value->title }}</a>
                            </p>
                        </article>
                    </div>
            @endforeach
           
          </div>
        </div>
      </section>
@endsection

  
    
      <!-- Page Footer-->
    