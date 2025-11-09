
<?php $__env->startSection('title',$store->title); ?>
<?php $__env->startSection('content'); ?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="seller_profile_banner">
                    <img src="<?php echo e(asset($store->cover_photo)); ?>" alt="" />
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="seller__part_sections">
                <div class="seller__logo">
                    <img src="<?php echo e(asset($store->logo)); ?>" alt="<?php echo e($store->title); ?>" />
                </div>
                <div class="seller__panel__data">
                    <div class="data__seller_lest">
                        <div class="shop__name"><p><?php echo e($seller->name); ?></p></div>
                        <div class="shop__title"><p><?php echo e($store->title); ?></p></div>
                        <div class="shop_item">
                            <p>Available <strong><?php echo e($allpro); ?></strong> items in the store</p>
                        </div>
                    </div>
                    <div class="chat__now__btn">
                        <a href="https://api.whatsapp.com/send?phone=88<?php echo e($store->whatsapp); ?>"><i class="fa-solid fa-headset"></i> Chat Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Seller Tabs Section (Bootstrap 5) -->
<section class="mt-3">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="nav___tabs_seller">

          <!-- Tabs -->
          <ul class="nav nav-pills mb-3 seller_nav" id="sellerTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button
                class="tab_button_seller active"
                id="seller-tab-store"
                data-bs-toggle="tab"
                data-bs-target="#seller-pane-store"
                type="button"
                role="tab"
                aria-controls="seller-pane-store"
                aria-selected="true"
              >Store</button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="tab_button_seller"
                id="seller-tab-products"
                data-bs-toggle="tab"
                data-bs-target="#seller-pane-products"
                type="button"
                role="tab"
                aria-controls="seller-pane-products"
                aria-selected="false"
              >Products</button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="tab_button_seller"
                id="seller-tab-profile"
                data-bs-toggle="tab"
                data-bs-target="#seller-pane-profile"
                type="button"
                role="tab"
                aria-controls="seller-pane-profile"
                aria-selected="false"
              >Profile</button>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content" id="sellerTabsContent">
            <!-- Store Pane -->
            <div
              class="tab-pane fade show active"
              id="seller-pane-store"
              role="tabpanel"
              aria-labelledby="seller-tab-store"
              tabindex="0"
            >
              <div class="row">
                <div class="col-sm-12">
                  <div class="store__banners">
                    <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="banner_campaign">
                        <a href="<?php echo e($value->link); ?>">
                          <img src="<?php echo e(asset($value->image)); ?>" alt="Banner <?php echo e($key + 1); ?>" />
                        </a>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>

              <div class="row mt-1 mb-3">
                <div class="col-sm-12">
                  <h4>Latest Sold Products</h4>
                  <div class="category-product main_product_inner">
                    <?php $__currentLoopData = $topsolds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="product_item wist_item wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.<?php echo e($key); ?>s">
                        <div class="product_item_inner">
                          <?php if(!empty($value->old_price) && (float) $value->old_price > 0 && (float) $value->new_price > 0): ?>
                            <?php
                              $discount = (($value->old_price - $value->new_price) * 100) / $value->old_price;
                            ?>
                            <div class="sale-badge">
                              <div class="sale-badge-inner">
                                <div class="sale-badge-box">
                                  <span class="sale-badge-text">
                                    <p><?php echo e(number_format($discount, 0)); ?>%</p>
                                  </span>
                                </div>
                              </div>
                            </div>
                          <?php endif; ?>

                          <div class="pro_img">
                            <a href="<?php echo e(route('product', $value->slug)); ?>">
                              <img
                                src="<?php echo e(asset(optional($value->image)->image ?? '')); ?>"
                                alt="<?php echo e($value->name); ?>"
                              />
                            </a>
                          </div>

                          <div class="pro_des">
                            <div class="pro_name">
                              <a href="<?php echo e(route('product', $value->slug)); ?>"><?php echo e(Str::limit($value->name, 35)); ?></a>
                            </div>
                          </div>
                        </div>

                        <?php
                          $averageRating = (float) ($value->reviews->avg('ratting') ?? 0);
                          $averageRating = max(0, min(5, $averageRating));
                          $filledStars = floor($averageRating);
                          $hasHalfStar = ($averageRating - $filledStars) >= 0.5;
                          $emptyStars = 5 - $filledStars - ($hasHalfStar ? 1 : 0);
                        ?>

                        <div class="rating_stars" aria-label="Average rating <?php echo e(number_format($averageRating, 1)); ?> out of 5">
                          <?php for($i = 0; $i < $filledStars; $i++): ?>
                            <i class="fas fa-star" aria-hidden="true"></i>
                          <?php endfor; ?>
                          <?php if($hasHalfStar): ?>
                            <i class="fas fa-star-half-alt" aria-hidden="true"></i>
                          <?php endif; ?>
                          <?php for($i = 0; $i < $emptyStars; $i++): ?>
                            <i class="far fa-star" aria-hidden="true"></i>
                          <?php endfor; ?>
                        </div>

                        <div class="pro_price">
                          <p>
                            <?php if(!empty($value->old_price) && (float) $value->old_price > 0): ?>
                              <del>৳ <?php echo e(number_format($value->old_price, 2)); ?></del>
                            <?php endif; ?>
                            ৳ <?php echo e(number_format($value->new_price, 2)); ?>

                          </p>
                        </div>

                        <?php if(!$value->prosizes->isEmpty() || !$value->procolors->isEmpty()): ?>
                          <div class="pro_btn">
                            <div class="cart_btn order_button">
                              <a href="<?php echo e(route('product', $value->slug)); ?>" class="addcartbutton">
                                <span>Buy Now</span>
                              </a>
                            </div>
                          </div>
                        <?php else: ?>
                          <div class="pro_btn">
                            <div class="cart_btn order_button">
                              <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($value->id); ?>" />
                                <input type="hidden" name="qty" value="1" />
                                <button type="submit">Buy Now</button>
                              </form>
                            </div>
                          </div>
                        <?php endif; ?>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            </div>

            <!-- Products Pane -->
            <div
              class="tab-pane fade"
              id="seller-pane-products"
              role="tabpanel"
              aria-labelledby="seller-tab-products"
              tabindex="0"
            >
              <div class="row">
                <div class="col-sm-12">
                  <div class="category-product main_product_inner">
                    <?php $__currentLoopData = $flashpro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="product_item wist_item wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.<?php echo e($key); ?>s">
                        <div class="product_item_inner">
                          <?php if(!empty($value->old_price) && (float) $value->old_price > 0 && (float) $value->new_price > 0): ?>
                            <?php
                              $discount = (($value->old_price - $value->new_price) * 100) / $value->old_price;
                            ?>
                            <div class="sale-badge">
                              <div class="sale-badge-inner">
                                <div class="sale-badge-box">
                                  <span class="sale-badge-text">
                                    <p><?php echo e(number_format($discount, 0)); ?>%</p>
                                  </span>
                                </div>
                              </div>
                            </div>
                          <?php endif; ?>

                          <div class="pro_img">
                            <a href="<?php echo e(route('product', $value->slug)); ?>">
                              <img
                                src="<?php echo e(asset(optional($value->image)->image ?? '')); ?>"
                                alt="<?php echo e($value->name); ?>"
                              />
                            </a>
                          </div>
                          <div class="pro_des">
                            <div class="pro_name">
                              <a href="<?php echo e(route('product', $value->slug)); ?>"><?php echo e(Str::limit($value->name, 35)); ?></a>
                            </div>
                          </div>
                        </div>

                        <?php
                          $averageRating = (float) ($value->reviews->avg('ratting') ?? 0);
                          $averageRating = max(0, min(5, $averageRating));
                          $filledStars = floor($averageRating);
                          $hasHalfStar = ($averageRating - $filledStars) >= 0.5;
                          $emptyStars = 5 - $filledStars - ($hasHalfStar ? 1 : 0);
                        ?>

                        <div class="rating_stars" aria-label="Average rating <?php echo e(number_format($averageRating, 1)); ?> out of 5">
                          <?php for($i = 0; $i < $filledStars; $i++): ?>
                            <i class="fas fa-star" aria-hidden="true"></i>
                          <?php endfor; ?>
                          <?php if($hasHalfStar): ?>
                            <i class="fas fa-star-half-alt" aria-hidden="true"></i>
                          <?php endif; ?>
                          <?php for($i = 0; $i < $emptyStars; $i++): ?>
                            <i class="far fa-star" aria-hidden="true"></i>
                          <?php endfor; ?>
                        </div>

                        <div class="pro_price">
                          <p>
                            <?php if(!empty($value->old_price) && (float) $value->old_price > 0): ?>
                              <del>৳ <?php echo e(number_format($value->old_price, 2)); ?></del>
                            <?php endif; ?>
                            ৳ <?php echo e(number_format($value->new_price, 2)); ?>

                          </p>
                        </div>

                        <?php if(!$value->prosizes->isEmpty() || !$value->procolors->isEmpty()): ?>
                          <div class="pro_btn">
                            <div class="cart_btn order_button">
                              <a href="<?php echo e(route('product', $value->slug)); ?>" class="addcartbutton">
                                <span>Buy Now</span>
                              </a>
                            </div>
                          </div>
                        <?php else: ?>
                          <div class="pro_btn">
                            <div class="cart_btn order_button">
                              <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($value->id); ?>" />
                                <input type="hidden" name="qty" value="1" />
                                <button type="submit">Buy Now</button>
                              </form>
                            </div>
                          </div>
                        <?php endif; ?>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="custom_paginate">
                    <?php echo e($flashpro->links('pagination::bootstrap-4')); ?>

                  </div>
                </div>
              </div>
            </div>

            <!-- Profile Pane -->
            <div
              class="tab-pane fade"
              id="seller-pane-profile"
              role="tabpanel"
              aria-labelledby="seller-tab-profile"
              tabindex="0"
            >
              <div class="row">
                <div class="col-sm-12">
                  <div class="seller-stats">
                    <div class="seller-stat">
                      <div class="seller-stat-title">Joined</div>
                      <div>
                        <span class="seller-stat-value">4</span>
                        <span class="seller-stat-unit">+ months</span>
                      </div>
                    </div>
                    <div class="seller-stat">
                      <div class="seller-stat-title">Shipped on Time <span class="info-icon">ℹ️</span></div>
                      <div class="seller-stat-highlight">100%</div>
                    </div>
                    <div class="seller-stat">
                      <div class="seller-stat-title">Chat</div>
                      <div class="seller-stat-note">Chat response rate</div>
                      <div class="seller-stat-highlight">No data</div>
                      <div class="seller-stat-note">Chat response time</div>
                      <div class="seller-stat-highlights">Active: Within hours</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
  // Optional: Activate a tab from URL hash (e.g., #seller-pane-products)
  document.addEventListener('DOMContentLoaded', function () {
    var hash = window.location.hash;
    if (hash) {
      var triggerEl = document.querySelector('[data-bs-target="' + hash + '"]');
      if (triggerEl) {
        var tab = new bootstrap.Tab(triggerEl);
        tab.show();
      }
    }

    // Keep URL hash in sync when switching tabs
    var triggerTabList = document.querySelectorAll('#sellerTabs [data-bs-toggle="tab"]');
    triggerTabList.forEach(function (triggerEl) {
      triggerEl.addEventListener('shown.bs.tab', function (event) {
        var target = event.target.getAttribute('data-bs-target');
        if (history.replaceState) {
          history.replaceState(null, null, target);
        } else {
          window.location.hash = target;
        }
      });
    });
  });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp\htdocs\pikarihut1\resources\views/frontEnd/layouts/pages/store.blade.php ENDPATH**/ ?>