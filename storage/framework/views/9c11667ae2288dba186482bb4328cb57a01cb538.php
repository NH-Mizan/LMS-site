 <?php $__env->startSection('title', 'Fast, Easy & Secure Online Marketplace'); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/owl.carousel.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/owl.theme.default.min.css')); ?>" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Header-->
    <section class="hero"
        style="background: url(<?php echo e(asset('public/frontEnd/images/bg-image-01.jpg')); ?>) no-repeat center center / cover;">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>WHY YOU SHOULD CONSIDER DOING THE FCE</h1>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Duis
                aute irure dolor in reprehenderit.</p>
        </div>
    </section>

    <!-- Tours-->
    <section class="section section-custom-1 bg-default">
        <div class="container">
            <div class="row row-50 justify-content-xl-between flex-lg-row-reverse">
                <div class="col-lg-5 col-xl-5">
                    <div class="section-custom-1-block box-decoration">
                        <div class="row row-40">
                            <div class="col-md-6 col-lg-12">
                                <div class="d-flex justify-content-between">
                                    <h4 class="text-uppercase fw-sbold wow fadeIn">Book a free lesson</h4><span
                                        class="icon mdi icon-sm linearicons-pencil3"></span>
                                </div>
                                <!-- RD Mailform-->
                                <form class="rd-form rd-mailform form-lg" data-form-output="form-output-global"
                                    data-form-type="contact" method="post" action="bat/rd-mailform.php">
                                    <div class="form-wrap form-wrap-icon wow fadeIn" data-wow-delay=".05s">
                                        <label class="form-label form-label-outside" for="contact-1-name">Name</label>
                                        <input class="form-input" id="contact-1-name" type="text" name="name">
                                        <div class="icon form-icon mdi mdi-account-outline"></div>
                                    </div>
                                    <div class="form-wrap form-wrap-icon wow fadeIn" data-wow-delay=".1s">
                                        <label class="form-label form-label-outside" for="contact-1-phone">Phone</label>
                                        <input class="form-input" id="contact-1-phone" type="text" name="phone"
                                            data-constraints="">
                                        <div class="icon form-icon mdi mdi-phone"></div>
                                    </div>
                                    <div class="form-wrap form-wrap-icon wow fadeIn" data-wow-delay=".15s">
                                        <label class="form-label form-label-outside" for="contact-1-email">E-mail</label>
                                        <input class="form-input" id="contact-1-email" type="email" name="email">
                                        <div class="icon form-icon mdi mdi-email-outline"></div>
                                    </div>
                                    <div class="form-wrap wow fadeIn" data-wow-delay=".2s">
                                        <button class="button button-lg button-icon button-2 button-primary"
                                            type="submit">book now</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <h5 class="text-uppercase wow fadeIn">Lots of Happy Students</h5>
                                <p class="text-gray-500 mt-30 wow fadeIn" data-wow-delay=".05s">We have over 4 thousand
                                    students</p>
                                <ul class="list-number mt-15 mt-md-30">
                                    <li class="wow fadeIn" data-wow-delay=".1s">4</li>
                                    <li class="wow fadeIn" data-wow-delay=".15s">1</li>
                                    <li class="wow fadeIn" data-wow-delay=".2s">4</li>
                                    <li class="wow fadeIn" data-wow-delay=".25s">5</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-6">
                    <div class="inset-4">
                        <div class="layout-2 wow fadeIn">
                            <h2 class="text-uppercase fw-bold">Courses We Offer</h2>
                            <div class="layout-2-item"><a class="button button-sm button-style-1"
                                    href="<?php echo e(route('hotdeals')); ?>">See All</a></div>
                        </div>
                        <div class="row row-30 mt-xl-60">
                            <div class="col-xs-6 col-sm-6 wow fadeIn">
                                <article class="tour-minimal context-dark">
                                    <div class="tour-minimal-inner img-overlay"
                                        style="background-image: url(<?php echo e(asset('public/frontEnd/images/home-3-2-258x273.jpg')); ?>);">
                                        <div class="tour-minimal-header">
                                        </div>
                                        <div class="tour-minimal-main">
                                            <h3 class="tour-minimal-title fw-sbold"><a
                                                    href="english-for-business.html">English for Beginners</a></h3>
                                            <div class="tour-minimal-pricing">
                                                <p class="tour-minimal-price tour-minimal-price-new">$25</p>
                                            </div>
                                            <p class="tour-minimal-comment">Price per lesson</p>
                                        </div>
                                        <div class="tour-minimal-caption">
                                            <p>Our best English course for starter level.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-xs-6 col-sm-6 wow fadeIn" data-wow-delay=".05s">
                                <article class="tour-minimal context-dark">
                                    <div class="tour-minimal-inner img-overlay"
                                        style="background-image: url(<?php echo e(asset('public/frontEnd/images/home-3-3-258x273.jpg')); ?>);">
                                        <div class="tour-minimal-header">
                                        </div>
                                        <div class="tour-minimal-main">
                                            <h3 class="tour-minimal-title fw-sbold"><a
                                                    href="english-for-business.html">Online Learning</a></h3>
                                            <div class="tour-minimal-pricing">
                                                <p class="tour-minimal-price tour-minimal-price-new">$35</p>
                                            </div>
                                            <p class="tour-minimal-comment">Price per lesson</p>
                                        </div>
                                        <div class="tour-minimal-caption">
                                            <p>Perfect if you prefer distance education.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-xs-6 col-sm-6 wow fadeIn" data-wow-delay=".05s">
                                <article class="tour-minimal context-dark">
                                    <div class="tour-minimal-inner img-overlay"
                                        style="background-image: url(<?php echo e(asset('public/frontEnd/images/home-3-4-258x273.jpg')); ?>);">
                                        <div class="tour-minimal-header">
                                        </div>
                                        <div class="tour-minimal-main">
                                            <h3 class="tour-minimal-title fw-sbold"><a
                                                    href="english-for-business.html">English for Business</a></h3>
                                            <div class="tour-minimal-pricing">
                                                <p class="tour-minimal-price tour-minimal-price-new">$40</p>
                                            </div>
                                            <p class="tour-minimal-comment">Price per lesson</p>
                                        </div>
                                        <div class="tour-minimal-caption">
                                            <p>Business English course designed for managers.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-xs-6 col-sm-6 wow fadeIn" data-wow-delay=".1s">
                                <article class="tour-minimal context-dark">
                                    <div class="tour-minimal-inner img-overlay"
                                        style="background-image: url(<?php echo e(asset('public/frontEnd/images/home-3-5-258x273.jpg')); ?>);">
                                        <div class="tour-minimal-header">
                                        </div>
                                        <div class="tour-minimal-main">
                                            <h3 class="tour-minimal-title fw-sbold"><a
                                                    href="english-for-business.html">English for Kids</a></h3>
                                            <div class="tour-minimal-pricing">
                                                <p class="tour-minimal-price tour-minimal-price-new">$17</p>
                                            </div>
                                            <p class="tour-minimal-comment">Price per lesson</p>
                                        </div>
                                        <div class="tour-minimal-caption">
                                            <p>Easy-to-learn English course for children.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Tours-->
    <section class="section section-1 bg-gray-100">
        <div class="container">
            <div class="row row-50 justify-content-center justify-content-lg-between">
                <div class="col-sm-10 col-md-10 col-lg-8">
                    <h2 class="text-uppercase fw-bold text-center text-md-start">Our Gallery</h2>
                    <div class="post-corporate-gallery post-corporate-gallery-2 inset-1" data-lightgallery="group">
                        <a class="post-corporate-thumbnail post-corporate-thumbnail-1 post-corporate-thumbnail-custom"
                            href="<?php echo e(asset($home_gallery1->image)); ?>" data-lightgallery="item">
                            <img class="post-corporate-thumbnail-image"
                                src="<?php echo e(asset($home_gallery1->image)); ?>" alt="" width="722"
                                height="490" /></a>
                        <a class="post-corporate-thumbnail post-corporate-thumbnail-5" href="<?php echo e(asset($home_gallery2->image)); ?>"
                            data-lightgallery="item">
                            <img class="post-corporate-thumbnail-image"
                                src="<?php echo e(asset($home_gallery2->image)); ?>" alt="" width="360"
                                height="326" /></a>
                        <a class="post-corporate-thumbnail post-corporate-thumbnail-5" href="<?php echo e(asset($home_gallery3->image)); ?>"
                            data-lightgallery="item">
                            <img class="post-corporate-thumbnail-image"
                                src="<?php echo e(asset($home_gallery3->image)); ?>" alt="" width="360"
                                height="326" /></a>
                    </div>
                </div>
                <div class="col-lg-4 offset-top-96">
                    <div class="row row-30 row-md-50 row-xxl-80">
                        <div class="col-md-6 col-lg-12">
                            <article class="box-8 mt-30 mt-xl-60 wow fadeIn" data-wow-delay=".1s">
                                <ul class="list-pricing">
                                    <li><a href="english-for-business.html"><span class="list-pricing-title">Language
                                                for Business</span><span>$45</span></a></li>
                                    <li><a href="english-for-business.html"><span class="list-pricing-title">English for
                                                Kids</span><span>$15</span></a></li>
                                    <li><a href="english-for-business.html"><span class="list-pricing-title">Online
                                                Learning</span><span>$36</span></a></li>
                                    <li><a href="english-for-business.html"><span class="list-pricing-title">German
                                                Club</span><span>$21</span></a></li>
                                    <li><a href="english-for-business.html"><span class="list-pricing-title">Personal
                                                Lessons</span><span>$35</span></a></li>
                                    <li><a href="english-for-business.html"><span class="list-pricing-title">Group
                                                Lessons</span><span>$34</span></a></li>
                                    <li><a href="english-for-business.html"><span class="list-pricing-title">French for
                                                Beginners</span><span>$32</span></a></li>
                                </ul>
                            </article>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <h2 class="text-uppercase fw-bold text-center text-sm-start wow fadeIn">why choose us</h2>
                            <ul class="row list-group-2 row-20 row-md-30 mt-30 mt-xl-40">
                                <li class="col-sm-6 col-md-12 wow fadeIn" data-wow-delay=".05s">
                                    <article class="lg-2-item">
                                        <div class="lg-2-item-aside bg-box-1">
                                            <div class="icon lg-2-item-icon mdi mdi-checkbox-marked-circle-outline">
                                            </div><span class="lg-2-item-counter"></span>
                                        </div>
                                        <div class="lg-2-item-main">
                                            <h3 class="fw-regular lg-2-item-title">Quick Results</h3>
                                            <p>Get quick and guaranteed results with the best teachers.</p>
                                        </div>
                                    </article>
                                </li>
                                <li class="col-sm-6 col-md-12 wow fadeIn" data-wow-delay=".1s">
                                    <article class="lg-2-item">
                                        <div class="lg-2-item-aside">
                                            <div class="icon lg-2-item-icon mdi mdi-coin"></div><span
                                                class="lg-2-item-counter"></span>
                                        </div>
                                        <div class="lg-2-item-main">
                                            <h3 class="fw-regular lg-2-item-title">Save Money</h3>
                                            <p>You can save a lot of money on our lessons & resources.</p>
                                        </div>
                                    </article>
                                </li>
                                <li class="col-sm-6 col-md-12 wow fadeIn" data-wow-delay=".15s">
                                    <article class="lg-2-item">
                                        <div class="lg-2-item-aside bg-tertiary">
                                            <div class="icon lg-2-item-icon mdi mdi-comment-multiple-outline"></div>
                                            <span class="lg-2-item-counter"></span>
                                        </div>
                                        <div class="lg-2-item-main">
                                            <h3 class="fw-regular lg-2-item-title">Get Support</h3>
                                            <p>Our staff and teachers are always ready to help you.</p>
                                        </div>
                                    </article>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Join Our Newsletter -->
    <section class="section section-xl context-dark bg-image bg-overlay-1 text-center"
        style="background-image: url(<?php echo e(asset('public/frontEnd/images/bg-image-3.jpg')); ?>);">
        <div class="container">
            <h2 class="text-uppercase fw-bold wow fadeIn">Join Our Newsletter</h2>
            <h3 class="fw-regular mt-md-20 mt-lg-40 wow fadeIn" data-wow-delay=".025s">Subscribe to our newsletter to
                receive the latest news & updates.</h3>
            <div class="block-2 block-centered mt-30 mt-lg-60 wow fadeIn" data-wow-delay=".05s">
                <form class="rd-form rd-mailform form-inline form-lg" data-form-output="form-output-global"
                    data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
                    <div class="form-wrap form-wrap-icon">
                        <input class="form-input" id="subscribe-form-email" type="email" name="email">
                        <label class="form-label" for="subscribe-form-email">E-mail</label>
                        <div class="icon form-icon form-icon-2 mdi mdi-email-outline"></div>
                    </div>
                    <div class="form-button">
                        <button class="button button-lg button-primary" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Latest News-->
    <section class="section section-lg bg-default text-center">
        <div class="container">
            <h2 class="text-uppercase fw-bold wow fadeIn">Latest News</h2>
            <div class="row row-40 row-md-50 row-xxl-80">
                <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-6 col-lg-4 wow fadeIn">
                        <!-- Post Classic-->
                        <article class="post-classic"><a class="post-classic-figure" href="blog-post.html"><img
                                    class="post-classic-image" src="<?php echo e(asset($value->image)); ?>" alt="" width="339"
                                    height="251" /></a>
                            <time class="post-classic-time" datetime="2021"><p><?php echo e(\Carbon\Carbon::parse($value->created_at)->format('M d, Y')); ?></p></time>
                            <div class="post-classic-divider"></div>
                            <p class="post-classic-title fw-medium link-black">
                            <a href="<?php echo e(route('blog.details', $value->slug)); ?>"><?php echo e($value->title); ?></a>
                            </p>
                        </article>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

               
            </div>
        </div>
    </section>
    <!-- Get in Touch-->
    <section class="section section-lg bg-gradient">
        <div class="container">
            <div class="row row-50">
                <div class="col-lg-8">
                    <h2 class="text-white text-uppercase fw-bold wow fadeIn">Get in Touch</h2>
                    <article class="box-7 mt-md-45 mt-xxl-70 wow fadeIn" data-wow-delay=".05s">
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
                    </article>
                </div>
                <div class="col-lg-4">
                    <h2 class="text-white text-uppercase fw-bold wow fadeIn">Our Teachers</h2>
                    <div class="row row-30 row-md-50 mt-md-45 mt-xxl-70">
                        <div class="col-sm-6 col-lg-12 wow fadeIn" data-wow-delay=".05s">
                            <!-- Profile Light-->
                            <article class="profile-light"><img class="profile-light-image"
                                    src="<?php echo e(asset('public/frontEnd/images/home-3-6-95x95.jpg')); ?>" alt="" width="95"
                                    height="95" />
                                <div class="profile-light-main">
                                    <p class="profile-light-position text-white-lighter">English teacher</p>
                                    <h5 class="profile-light-name text-white">Sam Johnson</h5>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-lg-12 wow fadeIn" data-wow-delay=".1s">
                            <!-- Profile Light-->
                            <article class="profile-light"><img class="profile-light-image"
                                    src="<?php echo e(asset('public/frontEnd/images/home-3-7-95x95.jpg')); ?>" alt="" width="95"
                                    height="95" />
                                <div class="profile-light-main">
                                    <p class="profile-light-position text-white-lighter">German Teacher</p>
                                    <h5 class="profile-light-name text-white">Pamela Reed</h5>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-lg-12 wow fadeIn" data-wow-delay=".15s">
                            <p class="big mt-md-30 mt-xl-50 text-white">9 Valley St. Brooklyn, NY 11203</p>
                            <article class="box-inline-1"><span class="icon mdi mdi-phone"></span><a
                                    href="tel:#">1-800-346-6277</a></article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Footer-->


<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/frontEnd/js/owl.carousel.min.js')); ?>"></script>

    <script src="<?php echo e(asset('public/frontEnd/js/jquery.syotimer.min.js')); ?>"></script>

    <script>
        $(document).ready(function () {
            $(".main_slider").owlCarousel({
                items: 1,
                loop: true,
                dots: false,
                autoplay: true,
                nav: true,
                autoplayHoverPause: false,
                margin: 0,
                mouseDrag: true,
                smartSpeed: 800, // 800ms is more natural, 8000 is too long
                autoplayTimeout: 3000,
                navText: [
                    "<i class='fa-solid fa-angle-left'></i>",
                    "<i class='fa-solid fa-angle-right'></i>"
                ],
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".hotdeals-slider").owlCarousel({
                margin: 15,
                loop: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 3,
                        nav: true,
                    },
                    600: {
                        items: 3,
                        nav: false,
                    },
                    1000: {
                        items: 5,
                        nav: true,
                        loop: false,
                    },
                },
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".category-slider").owlCarousel({
                margin: 15,
                loop: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 3,
                        nav: true,
                    },
                    600: {
                        items: 5,
                        nav: false,
                    },
                    1000: {
                        items: 8,
                        nav: true,
                        loop: false,
                    },
                },
            });

            $(".product_slider").owlCarousel({
                margin: 15,
                items: 6,
                loop: true,
                dots: false,
                autoplay: false,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2,
                        nav: false,
                    },
                    600: {
                        items: 5,
                        nav: false,
                    },
                    1000: {
                        items: 5,
                        nav: false,
                    },
                },
            });
            $(".customer-review").owlCarousel({
                margin: 8,
                items: 6,
                loop: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2,
                        nav: false,
                    },
                    600: {
                        items: 3,
                        nav: false,
                    },
                    1000: {
                        items: 5,
                        nav: false,
                    },
                },
            });
        });
    </script>

    <script>
        $("#simple_timer").syotimer({
            date: new Date(2015, 0, 1),
            layout: "hms",
            doubleNumbers: false,
            effectType: "opacity",

            periodUnit: "d",
            periodic: true,
            periodInterval: 1,
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\aaa\resources\views/frontEnd/layouts/pages/index.blade.php ENDPATH**/ ?>