@extends('frontEnd.layouts.master')
@section('title', 'Blog Details')
@push('css')
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/jquery-ui.css')}}" />
@endpush
@section('content')
    <section class="hero"
        style="background: url({{ asset('public/frontEnd/images/bg-image-4.jpg') }}) no-repeat center center / cover;">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Grid Blog</h1>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Duis
                aute irure dolor in reprehenderit.</p>
        </div>
    </section>
    <section class="section section-md bg-default">
        <div class="container">
            <article class="blog-layout">
                <div class="blog-layout-main">
                    <div class="blog-layout-main-item">
                        <article class="post-corporate"><img class="post-corporate-image" src="{{ asset($details->image) }}"
                                alt="" width="768" height="396" />
                            <ul class="post-corporate-meta">
                                <li><span class="icon mdi mdi-calendar-today"></span>
                                    <time datetime="2021"><p>{{ \Carbon\Carbon::parse($details->created_at)->format('M d, Y') }}</p></time>
                                </li>
                                <li><span class="icon mdi mdi-account"></span><span>{{ $details->name }}</span></li>
                                <li><span
                                        class="icon mdi mdi-tag-outline"></span><span>{{ $details->category->name }}</span>
                                </li>
                            </ul>
                            <div class="post-corporate-divider"></div>
                            <div class="blog_details">
                                {!! $details->description !!}
                            </div>
                            <ul class="post-corporate-tags">
                                @foreach ($categories as $value)
                                    <li><a href="#">{{ $value->name }}</a></li>
                                @endforeach


                            </ul>
                            <div class="post-corporate-divider"></div>
                            <div class="post-corporate-footer">
                                <h5 class="fw-sbold">Share this post</h5>
                                <div>
                                    <div class="group group-sm"><a class="link-1 icon mdi mdi-facebook" href="#"></a><a
                                            class="link-1 icon mdi mdi-instagram" href="#"></a><a
                                            class="link-1 icon mdi mdi-behance" href="#"></a><a
                                            class="link-1 icon mdi mdi-twitter" href="#"></a></div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="blog-layout-main-item">
                        <h3 class="title-costume">Related Posts</h3>
                        <div class="row row-40">
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
                    <div class="blog-layout-main-item">
                        <h3 class="title-costume">Leave a Reply</h3>
                        <!-- RD Mailform-->
                        <form class="rd-form rd-mailform form-lg" data-form-output="form-output-global"
                            data-form-type="contact" method="post" action="bat/rd-mailform.php">
                            <div class="row row-30">
                                <div class="col-md-6">
                                    <div class="form-wrap form-wrap-icon">
                                        <input class="form-input" id="contact-name" type="text" name="name">
                                        <label class="form-label" for="contact-name">Name</label>
                                        <div class="icon form-icon mdi mdi-account-outline text-primary"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap form-wrap-icon">
                                        <input class="form-input" id="contact-email" type="email" name="email">
                                        <label class="form-label" for="contact-email">E-mail</label>
                                        <div class="icon form-icon mdi mdi-email-outline text-primary"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-wrap form-wrap-icon">
                                        <label class="form-label" for="contact-message">Message</label>
                                        <textarea class="form-input" id="contact-message" name="message"></textarea>
                                        <div class="icon form-icon mdi mdi-message-outline text-primary"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-wrap form-wrap-button">
                                <button class="button button-lg button-primary" type="submit">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="blog-layout-aside">
                    <div class="blog-layout-aside-item">
                        <!-- RD Search-->
                        <form class="rd-search rd-search-inline block-2 block-centered" action="search-results.html"
                            method="GET">
                            <div class="form-wrap">
                                <label class="form-label" for="rd-search-form-input">Search...</label>
                                <input class="form-input" id="rd-search-form-input" type="text" name="s" autocomplete="off">
                            </div>
                            <div class="form-button">
                                <button class="rd-search-submit" type="submit"></button>
                            </div>
                        </form>
                    </div>
                    <div class="blog-layout-aside-item">
                        <h3>Categories</h3>
                        <ul class="list-categories">
                            <li><a href="#"><span class="lc-text">News</span><span class="lc-counter">6</span></a></li>
                            <li><a href="#"><span class="lc-text">Blog</span><span class="lc-counter">6</span></a></li>
                            <li><a href="#"><span class="lc-text">English</span><span class="lc-counter">12</span></a></li>
                            <li><a href="#"><span class="lc-text">Language</span><span class="lc-counter">9</span></a></li>
                            <li><a href="#"><span class="lc-text">Tips</span><span class="lc-counter">9</span></a></li>
                        </ul>
                    </div>
                    <div class="blog-layout-aside-item">
                        <h3>Latest Posts</h3>
                        <div class="group-post-minimal">

                            @foreach ($lats_blog as $value)
                                <article class="post-minimal"><a class="post-minimal-media" href="{{ route('blog.details', $value->slug) }}"><img
                                            class="post-minimal-image" src="{{ asset($value->image) }}" alt="" width="79"
                                            height="78" /></a>
                                    <div class="post-minimal-main">
                                        <h6 class="post-minimal-title"><a href="{{ route('blog.details', $value->slug) }}">{{ $value->title }}</a></h6>
                                        <time class="post-minimal-time" datetime="2021"><p>{{ \Carbon\Carbon::parse($value->created_at)->format('M d, Y') }}</p></time>
                                    </div>
                                </article>
                            @endforeach


                        </div>
                    </div>
                    <div class="blog-layout-aside-item">
                        <!-- Tour Light-->
                        <article class="tour-light bg-image context-dark"
                            style="background-image: url({{ asset('public/frontEnd/images/blog-post-8.jpg') }});">
                            <div class="tour-light-inner">
                                <div class="tour-light-header">
                                    <div class="tour-light-badge">Sale</div>
                                    <div class="tour-light-pricing tour-light-inset"></div>
                                </div>
                                <div class="tour-light-main tour-light-inset">
                                    <h3 class="title-costume tour-light-title"><a href="english-for-business.html">English
                                            For Kids</a></h3>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="blog-layout-aside-item">
                        <h4>Subscribe</h4>
                        <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="subscribe"
                            method="post" action="bat/rd-mailform.php">
                            <div class="form-wrap form-wrap-icon">
                                <input class="form-input" id="subscribe-form-email" type="email" name="email">
                                <label class="form-label" for="subscribe-form-email">E-mail</label>
                                <div class="icon form-icon mdi mdi-email-outline"></div>
                            </div>
                            <div class="form-wrap mt-30">
                                <button class="button button-block button-lg button-primary" type="submit">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(".sort").change(function () {
            $('#loading').show();
            $(".sort-form").submit();
        })
    </script>
@endpush