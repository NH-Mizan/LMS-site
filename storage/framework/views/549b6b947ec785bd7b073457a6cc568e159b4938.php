
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
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="col-sm-6">
                  <article class="tour-classic">
                    <div class="tour-classic-media"><a class="tour-classic-figure" href="<?php echo e(route('product', $value->slug)); ?>"><img class="tour-classic-image" src="<?php echo e(asset($value->image->image)); ?>" alt="" width="365" height="248"/></a>
                      <div class="tour-classic-pricing">
                        <p class="tour-classic-price tour-classic-price-new">$<?php echo e($value->new_price); ?></p>
                      </div>
                    </div>
                    <div class="tour-classic-body">
                      <h3 class="tour-classic-title"><a href="<?php echo e(route('product', $value->slug)); ?>"><?php echo e($value->name); ?></a></h3>
                      <div class="tour-classic-footer"><span class="mdi mdi-account-outline"></span>
                        <p class="tour-classic-caption"><?php echo e($value->pro_unit); ?></p>
                      </div>
                    </div>
                  </article>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              
              </div>
            </div>
          </div>
        </div>
      </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\aaa\resources\views/frontEnd/layouts/pages/hotdeals.blade.php ENDPATH**/ ?>