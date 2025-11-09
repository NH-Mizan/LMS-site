
<?php $__env->startSection('title','Page'); ?>
<?php $__env->startSection('content'); ?>
 <section class="hero"style="background: url(<?php echo e(asset('public/frontEnd/images/bg-image-4.jpg')); ?>) no-repeat center center / cover;">
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
<?php $__env->stopSection(); ?>

  
    
      <!-- Page Footer-->
    
<?php echo $__env->make('frontEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\aaa\resources\views/frontEnd/layouts/pages/blog.blade.php ENDPATH**/ ?>