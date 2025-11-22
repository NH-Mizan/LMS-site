@extends('frontEnd.layouts.master')
@section('title','Page')
@section('content')
 <section class="hero"style="background: url({{ asset('public/frontEnd/images/bg-image-4.jpg') }}) no-repeat center center / cover;">
      <div class="overlay"></div>
      <div class="hero-content">
        <h1>Our Courses</h1>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Duis aute irure dolor in reprehenderit.</p>
      </div>
    </section>
<section class="section section-md bg-gray-100">
        <div class="container">
          <div class="row row-40 row-xl-50 flex-lg-row-reverse">
            <div class="col-lg-4">
              <div class="block-custom-centered">
                <div class="box-4-outer">
                  <button class="box-4-toggle" data-multitoggle="#box-4" data-scope=".box-4-outer" aria-label="Filter Toggle"><span>Search</span><span class="icon mdi mdi-magnify"></span></button>
                  <article class="box-4" id="box-4">
                    <div class="box-4-inner">
                      <h3>Sign up for a class</h3>
                      <!-- RD Mailform-->
                      <form class="rd-form rd-mailform form-lg" >
                        <div class="form-wrap form-wrap-icon">
                          <label class="form-label form-label-outside" for="contact-2-name">Full Name</label>
                          <input class="form-input" id="contact-2-name" type="text" name="name" required >
                          <div class="icon form-icon mdi mdi-border-color"></div>
                        </div>
                        <div class="form-wrap form-wrap-icon">
                          <label class="form-label form-label-outside" for="contact-2-date">Date</label>
                          <input class="form-input" id="contact-2-date" type="text" name="date" data-constraints="" data-time-picker="date" required>
                          <div class="icon form-icon mdi mdi-calendar-text"></div>
                        </div>
                        <div class="form-wrap form-wrap-icon">
                          <label class="form-label form-label-outside" for="contact-2-email">E-mail</label>
                          <input class="form-input" id="contact-2-email" type="email" name="email" data-constraints="" required>
                          <div class="icon form-icon mdi mdi-email-outline"></div>
                        </div>
                        <div class="form-wrap form-wrap-icon wow fadeIn" data-wow-delay=".1s">
                          <label class="form-label form-label-outside" for="contact-2-phone">Phone</label>
                          <input class="form-input" id="contact-2-phone" type="text" name="phone" required>
                          <div class="icon form-icon mdi mdi-phone"></div>
                        </div>
                        <div class="form-wrap mt-xl-55">
                          <button class="button button-lg button-primary button-block" type="submit">send request</button>
                        </div>
                      </form>
                    </div>
                  </article>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="row row-30 row-xl-40">
                @foreach ($products as $value )
                 <div class="col-sm-6">
                  <article class="tour-classic">
                    <div class="tour-classic-media"><a class="tour-classic-figure" href="{{ route('product', $value->slug) }}"><img class="tour-classic-image" src="{{ asset($value->image->image) }}" alt="" width="365" height="248"/></a>
                      <div class="tour-classic-pricing">
                        <p class="tour-classic-price tour-classic-price-new">${{ $value->new_price }}</p>
                      </div>
                    </div>
                    <div class="tour-classic-body">
                      <h3 class="tour-classic-title"><a href="{{ route('product', $value->slug) }}">{{ $value->name }}</a></h3>
                      <div class="tour-classic-footer"><span class="mdi mdi-account-outline"></span>
                        <p class="tour-classic-caption">{{$value->pro_unit }}</p>
                      </div>
                    </div>
                  </article>
                </div>
                @endforeach

              
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection