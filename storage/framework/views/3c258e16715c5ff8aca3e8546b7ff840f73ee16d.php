
<?php $__env->startSection('title','Page'); ?>
<?php $__env->startSection('content'); ?>

      <!-- Page Header-->
        <section class="hero"style="background: url(<?php echo e(asset('public/frontEnd/images/bg-image-4.jpg')); ?>) no-repeat center center / cover;">
      <div class="overlay"></div>
      <div class="hero-content">
        <h1>About</h1>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Duis
          aute irure dolor in reprehenderit.</p>
      </div>
    </section>
     
      <!-- Basic Info-->
      <section class="section section-sm bg-default">
        <div class="container">
          <div class="row row-50 justify-content-center align-items-center">
            <div class="col-md-10 col-lg-7">
              <h3 class="title-costume block-1"><?php echo e($about_data->title); ?></h3>
              <div class="block-2 mt-20 mt-md-30 mt-lg-50">
               <p><?php echo $about_data->description; ?></p>
              </div><a class="button button-lg button-primary mt-lg-40" href="">Get Started</a>
            </div>
            <div class="col-md-10 col-lg-5 position-relative">
              <div class="figure-1"><img src="<?php echo e(asset($about_data->image)); ?>" alt="" width="457" height="566"/>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Features-->
      <section class="section section-lg bg-gray-100 text-center text-sm-start">
        <div class="container">
          <ul class="list-group-1 row row-50">
            <li class="col-sm-6 col-lg-3">
              <article class="lg-1-item">
                <div class="icon lg-1-item-icon linearicons-thumbs-up2"></div>
                <div class="lg-1-item-main">
                  <h4 class="lg-1-item-title"><span class="lg-1-item-counter"></span>Quick Results</h4>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
              </article>
            </li>
            <li class="col-sm-6 col-lg-3">
              <article class="lg-1-item">
                <div class="icon lg-1-item-icon linearicons-bubble-quote"></div>
                <div class="lg-1-item-main">
                  <h4 class="lg-1-item-title"><span class="lg-1-item-counter"></span>Get Support</h4>
                  <p>Lura, capio, et diatria. Mori recte ducunt ad alter plasmator. Experimentum sapienter ducunt ad audax.</p>
                </div>
              </article>
            </li>
            <li class="col-sm-6 col-lg-3">
              <article class="lg-1-item">
                <div class="icon lg-1-item-icon linearicons-mustache-glasses"></div>
                <div class="lg-1-item-main">
                  <h4 class="lg-1-item-title"><span class="lg-1-item-counter"></span>Best Teachers</h4>
                  <p>Indexs ortum! Classiss sunt solitudos de altus adgium. Castus, regius triticums superbe anhelare.</p>
                </div>
              </article>
            </li>
            <li class="col-sm-6 col-lg-3">
              <article class="lg-1-item">
                <div class="icon lg-1-item-icon linearicons-wallet"></div>
                <div class="lg-1-item-main">
                  <h4 class="lg-1-item-title"><span class="lg-1-item-counter"></span>Save Money</h4>
                  <p>Cur nixus mori? Pol. Sunt hippotoxotaes convertam festus, brevis buboes. Brevis terror nunquam amors.</p>
                </div>
              </article>
            </li>
          </ul>
        </div>
      </section>
      <!-- Testimonials-->
      <section class="section section-lg bg-default text-center">
        <div class="container">
          <h3 class="title-costume">What Clients Say About Us</h3>
          <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
          <div class="row row-30 row-md-50 justify-content-center justify-content-lg-start">
            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6">
              <!-- Quote Classic-->
              <blockquote class="quote-classic">
                <div class="quote-classic-inner">
                  <div class="quote-classic-header">
                    <div class="quote-classic-profile"><img class="quote-classic-avatar" src="<?php echo e(asset($value->image)); ?>" alt="" width="84" height="84"/>
                      <cite class="quote-classic-cite heading-5"><?php echo e($value->name); ?></cite>
                    </div>
                    <div class="quote-classic-links"><a class="quote-classic-social-link mdi mdi-facebook" href="<?php echo e($value->link); ?>"></a></div>
                  </div>
                  <div class="quote-classic-text">
                    <p><?php echo $value->description; ?></p>
                  </div>
                  <time class="quote-classic-time" datetime="2021"><?php echo e(\Carbon\Carbon::parse($value->created_at)->format('M d, Y')); ?></time>
                </div>
              </blockquote>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
          </div>
        </div>
      </section>
      <!-- Our Team-->
      <section class="section bg-color-gray-100">
        <div class="range">
          <div class="cell-lg-7 cell-xl-8 cell-xxl-9">
            <div class="cell-inner section-lg text-center text-sm-start">
              <h3 class="title-costume">Meet Our Team</h3>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit</p>
              <!-- Owl Carousel-->
              <div class="owl-carousel owl-1 mt-lg-50" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="2" data-xl-items="3" data-dots="true" data-nav="false" data-stage-padding="0" data-loop="false" data-margin="30" data-mouse-drag="false">
                <!-- Profile Classic-->
                 <?php $__currentLoopData = $our_team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="profile-classic"><img class="profile-classic-image" src="<?php echo e(asset($value->image)); ?>" alt="" width="272" height="197"/>
                  <div class="profile-classic-main">
                    <p class="heading-5 profile-classic-position"><?php echo e($value->designation); ?></p>
                    <p class="profile-classic-name heading-4"><?php echo e($value->name); ?></p>
                    <div class="profile-classic-unit">
                      <div class="icon mdi mdi-phone"></div><a class="heading-6" href="tel:<?php echo e($value->phone); ?>"><?php echo e($value->phone); ?></a>
                    </div>
                  </div>
                </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- Profile Classic-->
               
              </div>
            </div>
          </div>
          <div class="cell-lg-5 cell-xl-4 cell-xxl-3 height-fill">
            <div class="box-3 bg-image" style="background-image: url(<?php echo e(asset('public/frontEnd/images/about-2.jpg')); ?>);"><a class="box-3-play" data-lightgallery="item" href="https://www.youtube.com/watch?v=dk9uNWPP7EA"><span class="icon mdi mdi-play"></span></a></div>
          </div>
        </div>
      </section>
      <!-- Partners-->
      <section class="section section-lg bg-default">
        <div class="container">
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-2" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4" data-xl-items="5" data-dots="true" data-nav="false" data-stage-padding="0" data-loop="false" data-margin="30" data-mouse-drag="false"><a class="link-image" href="#"><img src="<?php echo e(asset('public/frontEnd/images/brand-1-229x162.png')); ?>" alt="" width="229" height="162"/></a><a class="link-image" href="#"><img src="<?php echo e(asset('public/frontEnd/images/brand-2-228x162.png')); ?>" alt="" width="228" height="162"/></a><a class="link-image" href="#"><img src="<?php echo e(asset('public/frontEnd/images/brand-3-228x154.png')); ?>" alt="" width="228" height="154"/></a><a class="link-image" href="#"><img src="<?php echo e(asset('public/frontEnd/images/brand-4-228x162.png')); ?>" alt="" width="228" height="162"/></a><a class="link-image" href="#"><img src="<?php echo e(asset('public/frontEnd/images/brand-5-228x162.png')); ?>" alt="" width="228" height="162"/></a></div>
        </div>
      </section>
      <!-- Page Footer-->
   
  

<?php $__env->stopSection(); ?>




<?php echo $__env->make('frontEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\aaa\resources\views/frontEnd/layouts/pages/about.blade.php ENDPATH**/ ?>