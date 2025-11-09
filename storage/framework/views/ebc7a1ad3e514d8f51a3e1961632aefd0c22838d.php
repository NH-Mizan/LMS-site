
<?php $__env->startSection('title','Page'); ?>
<?php $__env->startSection('content'); ?>
 <section class="hero"style="background: url(<?php echo e(asset('public/frontEnd/images/bg-image-4.jpg')); ?>) no-repeat center center / cover;">
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
                      <form class="rd-form rd-mailform form-lg" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                        <div class="form-wrap form-wrap-icon">
                          <label class="form-label form-label-outside" for="contact-2-name">Full Name</label>
                          <input class="form-input" id="contact-2-name" type="text" name="name" >
                          <div class="icon form-icon mdi mdi-border-color"></div>
                        </div>
                        <div class="form-wrap form-wrap-icon">
                          <label class="form-label form-label-outside" for="contact-2-date">Date</label>
                          <input class="form-input" id="contact-2-date" type="text" name="date" data-constraints="" data-time-picker="date">
                          <div class="icon form-icon mdi mdi-calendar-text"></div>
                        </div>
                        <div class="form-wrap form-wrap-icon">
                          <label class="form-label form-label-outside" for="contact-2-email">E-mail</label>
                          <input class="form-input" id="contact-2-email" type="email" name="email" data-constraints="">
                          <div class="icon form-icon mdi mdi-email-outline"></div>
                        </div>
                        <div class="form-wrap form-wrap-icon wow fadeIn" data-wow-delay=".1s">
                          <label class="form-label form-label-outside" for="contact-2-phone">Phone</label>
                          <input class="form-input" id="contact-2-phone" type="text" name="phone" data-constraints="@PhoneNumber">
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
                <div class="col-sm-6">
                  <article class="tour-classic">
                    <div class="tour-classic-media"><a class="tour-classic-figure" href="english-for-business.html"><img class="tour-classic-image" src="<?php echo e(asset('public/frontEnd/images/tour-list-2-1-365x248.jpg')); ?>" alt="" width="365" height="248"/></a>
                      <div class="tour-classic-pricing">
                        <p class="tour-classic-price tour-classic-price-new">$34</p>
                      </div>
                    </div>
                    <div class="tour-classic-body">
                      <h3 class="tour-classic-title"><a href="english-for-business.html">English for Beginners</a></h3>
                      <div class="tour-classic-footer"><span class="mdi mdi-account-outline"></span>
                        <p class="tour-classic-caption">Sam Johnson</p>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="col-sm-6">
                  <article class="tour-classic">
                    <div class="tour-classic-media"><a class="tour-classic-figure" href="english-for-business.html"><img class="tour-classic-image" src="<?php echo e(asset('public/frontEnd/images/tour-list-2-2-365x248.jpg')); ?>" alt="" width="365" height="248"/></a>
                      <div class="tour-classic-pricing">
                        <p class="tour-classic-price tour-classic-price-new">$25</p>
                      </div>
                    </div>
                    <div class="tour-classic-body">
                      <h3 class="tour-classic-title"><a href="english-for-business.html">Online Learning</a></h3>
                      <div class="tour-classic-footer"><span class="mdi mdi-account-outline"></span>
                        <p class="tour-classic-caption">Sam Johnson</p>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="col-sm-6">
                  <article class="tour-classic">
                    <div class="tour-classic-media"><a class="tour-classic-figure" href="english-for-business.html"><img class="tour-classic-image" src="<?php echo e(asset('public/frontEnd/images/tour-list-2-3-365x248.jpg')); ?>" alt="" width="365" height="248"/></a>
                      <div class="tour-classic-pricing">
                        <p class="tour-classic-price tour-classic-price-new">$35</p>
                      </div>
                    </div>
                    <div class="tour-classic-body">
                      <h3 class="tour-classic-title"><a href="english-for-business.html">English for Business</a></h3>
                      <div class="tour-classic-footer"><span class="mdi mdi-account-outline"></span>
                        <p class="tour-classic-caption">Sam Johnson</p>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="col-sm-6">
                  <article class="tour-classic">
                    <div class="tour-classic-media"><a class="tour-classic-figure" href="english-for-business.html"><img class="tour-classic-image" src="<?php echo e(asset('public/frontEnd/images/tour-list-2-4-365x248.jpg')); ?>" alt="" width="365" height="248"/></a>
                      <div class="tour-classic-pricing">
                        <p class="tour-classic-price tour-classic-price-new">$24</p>
                      </div>
                    </div>
                    <div class="tour-classic-body">
                      <h3 class="tour-classic-title"><a href="english-for-business.html">English for Kids</a></h3>
                      <div class="tour-classic-footer"><span class="mdi mdi-account-outline"></span>
                        <p class="tour-classic-caption">Sam Johnson</p>
                      </div>
                    </div>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abokaash/public_html/onlinehab/resources/views/frontEnd/layouts/pages/hotdeals.blade.php ENDPATH**/ ?>