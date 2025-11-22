
<?php $__env->startSection('title', $details->name); ?>


<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/zoomsl.css')); ?>">
<?php $__env->stopPush(); ?>
 <section class="hero"style="background: url(<?php echo e(asset('public/frontEnd/images/bg-image-4.jpg')); ?>) no-repeat center center / cover;">
      <div class="overlay"></div>
      <div class="hero-content">
        <h1> Courses Details</h1>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Duis aute irure dolor in reprehenderit.</p>
      </div>
    </section>
  <section class="section">
        <!-- Bootstrap tabs-->
        <div class="tabs-custom tabs-complex" id="tabs-1">
          <button class="tabs-complex-nav-toggle" data-multitoggle="#tabs-complex-nav" data-isolate="#tabs-complex-nav"><span>Navigation</span><span class="icon mdi mdi-chevron-down"></span></button>
          <!-- Nav tabs-->
          <ul class="nav nav-tabs" id="tabs-complex-nav">
            <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-bs-toggle="tab"><span class="icon mdi mdi-information-outline"></span><span class="fw-medium">Information</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-bs-toggle="tab"><span class="icon mdi mdi-map"></span><span class="fw-medium">Course plan</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-bs-toggle="tab"><span class="icon mdi mdi-map-marker"></span><span class="fw-medium">Location</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-4" data-bs-toggle="tab"><span class="icon mdi mdi-image-filter"></span><span class="fw-medium">Gallery</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-5" data-bs-toggle="tab"><span class="icon mdi mdi-comment-outline"></span><span>Reviews</span></a></li>
          </ul>
          <!-- Tab panes-->
          <div class="tab-content">
            <div class="tab-pane fade show active" id="tabs-1-1">
              <div class="container">
                <div class="row row-50">
                  <div class="col-lg-8">
                    <article class="post-info inset-1">
                      <h2 class="text-uppercase fw-bold post-info-title"><?php echo e($details->name); ?></h2>
                      <div class="post-info-details">
                        <p class="post-info-price">$<?php echo e($details->new_price); ?></p>
                        <p class="big">per lesson</p>
                      </div>
                      <div class="post-info-meta">
                        <ul class="post-info-meta-list">
                          <li><span class="icon mdi mdi-clock"></span><span><?php echo e($details->stock); ?> </span></li>
                          <li><span class="icon mdi mdi-star-outline"></span><span><?php echo e($details->pro_unit); ?></span></li>
                        </ul>
                      </div>
                      <p><?php echo $details->description; ?></p>
                      <table class="post-info-table">
                        <tr>
                          <td>Location</td>
                          <td><?php echo e($details->location); ?></td>
                        </tr>
                        <tr>
                          <td>Teacher</td>
                          <td><?php echo e($details->pro_unit); ?></td>
                        </tr>
                        <tr>
                          <td>Time</td>
                          <td><?php echo e($details->sold); ?> PM</td>
                        </tr>
                      </table>
                      <h2 class="text-uppercase fw-bold mt-md-30 mt-lg-50 mt-xl-80 offset-top-40">Gallery</h2>
                      <p>Pellentesque quis dui varius, dapibus velit id, iaculis ipsum. Morbi ac eros feugiat, lacinia elit ut elementum turpis</p>
                      <div class="row row-6 row-x-6" data-lightgallery="group">
                        <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-4"><a class="thumbnail-light" href="<?php echo e(asset($value->image)); ?>" data-lightgallery="item"><img class="thumbnail-light-image" src="<?php echo e(asset($value->image)); ?>" alt="" width="355" height="359"/></a></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                      </div>
                    </article>
                  </div>
                  <div class="col-lg-4">
                    <article class="box-4">
                      <div class="box-4-inner">
                        <h3>Sign up for a class</h3>
                        <!-- RD Mailform-->
                        <form class="rd-form rd-mailform form-lg" >
                          <div class="form-wrap form-wrap-icon">
                            <label class="form-label form-label-outside" for="form-1-title">Full Name</label>
                            <input class="form-input" id="form-1-title" type="text" name="name" />
                            <div class="icon form-icon mdi mdi-border-color"></div>
                          </div>
                          <div class="form-wrap form-wrap-icon">
                            <label class="form-label form-label-outside" for="form-1-date">Date</label>
                            <input class="form-input" id="form-1-date" type="text" name="date"  data-time-picker="date"/>
                            <div class="icon form-icon mdi mdi-calendar-text"></div>
                          </div>
                          <div class="form-wrap form-wrap-icon">
                            <label class="form-label" for="form-1-email">E-mail</label>
                            <input class="form-input" id="form-1-email" type="email" name="email" />
                            <div class="icon form-icon mdi mdi-email-outline"></div>
                          </div>
                          <div class="form-wrap form-wrap-icon">
                            <input class="form-input" id="form-1-phone" type="text" name="phone" />
                            <label class="form-label" for="form-1-phone">Phone</label>
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
            </div>
            <div class="tab-pane fade" id="tabs-1-2">
              <div class="container">
                <div class="row row-50">
                  <div class="col-lg-8">
                    <div class="inset-1">
                      <!-- Bootstrap collapse-->
                      <div class="card-group-custom card-group-timeline" id="accordion1" role="tablist" aria-multiselectable="false">
                        <!-- Bootstrap card-->
                        <article class="card card-custom card-timeline">
                          <div class="card-header" role="tab">
                            <div class="card-title"><a class="card-link" id="accordion1-card-head-ailwqkhe" data-bs-toggle="collapse" data-parent="#accordion1" href="#accordion1-card-body-fnstwnww" aria-controls="accordion1-card-body-fnstwnww" aria-expanded="true" role="button">Module 1: Management
                                <div class="card-arrow"></div></a></div>
                          </div>
                          <div class="collapse show" id="accordion1-card-body-fnstwnww" aria-labelledby="accordion1-card-head-ailwqkhe" data-parent="#accordion1" role="tabpanel">
                            <div class="card-body">
                              <article class="box-float-1"><img src="<?php echo e(asset('public/frontEnd/images/single-tour-10-162x119.jpg')); ?>" alt="" width="162" height="119"/>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Velit ut tortor pretium viverra. Et tortor consequat id porta.</p>
                              </article>
                              <div class="row row-10">
                                <div class="col-sm-6">
                                  <ul class="list-marked">
                                    <li>Ut tellus elementum</li>
                                    <li>Sagittis vitae et</li>
                                  </ul>
                                </div>
                                <div class="col-sm-6">
                                  <ul class="list-marked">
                                    <li>Congue quisque egestas</li>
                                    <li>Diam in arcu cursus</li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </article>
                        <!-- Bootstrap card-->
                        <article class="card card-custom card-timeline">
                          <div class="card-header" role="tab">
                            <div class="card-title"><a class="card-link collapsed" id="accordion1-card-head-upikxjim" data-bs-toggle="collapse" data-parent="#accordion1" href="#accordion1-card-body-fcrawxji" aria-controls="accordion1-card-body-fcrawxji" aria-expanded="false" role="button">Module 2: Production
                                <div class="card-arrow"></div></a></div>
                          </div>
                          <div class="collapse" id="accordion1-card-body-fcrawxji" aria-labelledby="accordion1-card-head-upikxjim" data-parent="#accordion1" role="tabpanel">
                            <div class="card-body">
                              <article class="box-float-1"><img src="<?php echo e(asset('public/frontEnd/images/single-tour-11-162x119.jpg')); ?>" alt="" width="162" height="119"/>
                                <p>Urna cursus eget nunc scelerisque viverra mauris. Egestas maecenas pharetra convallis posuere. Rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat.</p>
                              </article>
                              <div class="row row-10">
                                <div class="col-sm-6">
                                  <ul class="list-marked">
                                    <li>Sed id semper</li>
                                    <li>Risus in hendrerit</li>
                                  </ul>
                                </div>
                                <div class="col-sm-6">
                                  <ul class="list-marked">
                                    <li>Pharetra diam sit amet nisl</li>
                                    <li>Tempus imperdiet nulla</li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </article>
                        <!-- Bootstrap card-->
                        <article class="card card-custom card-timeline">
                          <div class="card-header" role="tab">
                            <div class="card-title"><a class="card-link collapsed" id="accordion1-card-head-iwihlbrq" data-bs-toggle="collapse" data-parent="#accordion1" href="#accordion1-card-body-rquiknmj" aria-controls="accordion1-card-body-rquiknmj" aria-expanded="false" role="button">Module 3: Marketing
                                <div class="card-arrow"></div></a></div>
                          </div>
                          <div class="collapse" id="accordion1-card-body-rquiknmj" aria-labelledby="accordion1-card-head-iwihlbrq" data-parent="#accordion1" role="tabpanel">
                            <div class="card-body">
                              <article class="box-float-1"><img src="<?php echo e(asset('public/frontEnd/images/single-tour-12-162x119.jpg')); ?>" alt="" width="162" height="119"/>
                                <p>Sed euismod nisi porta lorem mollis aliquam ut porttitor leo. Volutpat consequat mauris nunc congue nisi vitae suscipit. At imperdiet dui accumsan sit amet nulla facilisi.</p>
                              </article>
                              <div class="row row-10">
                                <div class="col-sm-6">
                                  <ul class="list-marked">
                                    <li>Eu augue ut lectu</li>
                                    <li>Mauris nunc congue nisi vitae</li>
                                  </ul>
                                </div>
                                <div class="col-sm-6">
                                  <ul class="list-marked">
                                    <li>Dignissim suspendisse</li>
                                    <li>Fringilla urna porttitor</li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </article>
                        <!-- Bootstrap card-->
                        <article class="card card-custom card-timeline">
                          <div class="card-header" role="tab">
                            <div class="card-title"><a class="card-link collapsed" id="accordion1-card-head-skaxldij" data-bs-toggle="collapse" data-parent="#accordion1" href="#accordion1-card-body-thxakpsi" aria-controls="accordion1-card-body-thxakpsi" aria-expanded="false" role="button">Module 4: Finance
                                <div class="card-arrow"></div></a></div>
                          </div>
                          <div class="collapse" id="accordion1-card-body-thxakpsi" aria-labelledby="accordion1-card-head-skaxldij" data-parent="#accordion1" role="tabpanel">
                            <div class="card-body">
                              <article class="box-float-1"><img src="<?php echo e(asset('public/frontEnd/images/single-tour-13-162x119.jpg')); ?>" alt="" width="162" height="119"/>
                                <p>Ut placerat orci nulla pellentesque. Elementum integer enim neque volutpat ac tincidunt. Elementum nibh tellus molestie nunc non blandit massa. Leo in vitae turpis massa. Tincidunt augue interdum velit euismod in pellentesque massa placerat.</p>
                              </article>
                              <div class="row row-10">
                                <div class="col-sm-6">
                                  <ul class="list-marked">
                                    <li>Volutpat commodo sed</li>
                                    <li>Purus gravida quis blandit</li>
                                  </ul>
                                </div>
                                <div class="col-sm-6">
                                  <ul class="list-marked">
                                    <li>Pulvinar etiam non</li>
                                    <li>Nunc mattis enim</li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </article>
                        <!-- Bootstrap card-->
                        <article class="card card-custom card-timeline">
                          <div class="card-header" role="tab">
                            <div class="card-title"><a class="card-link collapsed" id="accordion1-card-head-xvhyjdgv" data-bs-toggle="collapse" data-parent="#accordion1" href="#accordion1-card-body-htylbjfv" aria-controls="accordion1-card-body-htylbjfv" aria-expanded="false" role="button">Module 5: Economics
                                <div class="card-arrow"></div></a></div>
                          </div>
                          <div class="collapse" id="accordion1-card-body-htylbjfv" aria-labelledby="accordion1-card-head-xvhyjdgv" data-parent="#accordion1" role="tabpanel">
                            <div class="card-body">
                              <article class="box-float-1"><img src="<?php echo e(asset('public/frontEnd/images/single-tour-14-162x119.jpg')); ?>" alt="" width="162" height="119"/>
                                <p>Donec adipiscing tristique risus nec. Curabitur gravida arcu ac tortor dignissim convallis. At elementum eu facilisis sed. Placerat vestibulum lectus mauris ultrices eros.</p>
                              </article>
                              <div class="row row-10">
                                <div class="col-sm-6">
                                  <ul class="list-marked">
                                    <li>Consectetur purus ut</li>
                                    <li>Eget aliquet nibh praesent</li>
                                  </ul>
                                </div>
                                <div class="col-sm-6">
                                  <ul class="list-marked">
                                    <li>Tempor orci eu lobortis</li>
                                    <li>Mauris rhoncus aenean vel</li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </article>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <article class="box-4">
                      <div class="box-4-inner">
                        <h3>Sign up for a class</h3>
                        <!-- RD Mailform-->
                        <form class="rd-form rd-mailform form-lg" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                          <div class="form-wrap form-wrap-icon">
                            <label class="form-label form-label-outside" for="form-2-title">Full Name</label>
                            <input class="form-input" id="form-2-title" type="text" name="name" />
                            <div class="icon form-icon mdi mdi-border-color"></div>
                          </div>
                          <div class="form-wrap form-wrap-icon">
                            <label class="form-label form-label-outside" for="form-2-date">Date</label>
                            <input class="form-input" id="form-2-date" type="text" name="date"  data-time-picker="date"/>
                            <div class="icon form-icon mdi mdi-calendar-text"></div>
                          </div>
                          <div class="form-wrap form-wrap-icon">
                            <label class="form-label" for="form-2-email">E-mail</label>
                            <input class="form-input" id="form-2-email" type="email" name="email" />
                            <div class="icon form-icon mdi mdi-email-outline"></div>
                          </div>
                          <div class="form-wrap form-wrap-icon">
                            <input class="form-input" id="form-2-phone" type="text" name="phone" />
                            <label class="form-label" for="form-2-phone">Phone</label>
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
            </div>
            <div class="tab-pane fade" id="tabs-1-3">
              <div class="container">
                <div class="row row-50">
                  <div class="col-lg-8">
                    <div class="inset-1">
                      <div class="google-map-container" data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-zoom="4" data-styles="[{&quot;featureType&quot;:&quot;landscape.man_made&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f7f1df&quot;}]},{&quot;featureType&quot;:&quot;landscape.natural&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#d0e3b4&quot;}]},{&quot;featureType&quot;:&quot;landscape.natural.terrain&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;labels&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;poi.business&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;poi.medical&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fbd3da&quot;}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#bde6ab&quot;}]},{&quot;featureType&quot;:&quot;road&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;road&quot;,&quot;elementType&quot;:&quot;labels&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffe15f&quot;}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#efd151&quot;}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;black&quot;}]},{&quot;featureType&quot;:&quot;transit.station.airport&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#cfb2db&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#a2daf2&quot;}]}]" data-icon="images/gmap_marker.png" data-icon-active="images/gmap_marker_active.png">
                        <div class="google-map"></div>
                        <ul class="google-map-markers">
                          <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-description="9870 St Vincent Place, Glasgow"></li>
                        </ul>
                      </div>
                      <h3 class="mt-md-35">Location</h3>
                      <p>Pellentesque quis dui varius, dapibus velit id, iaculis ipsum. Morbi ac eros feugiat, lacinia elit ut elementum turpis. Curabitur justo sapien, tempus sit amet rutrum eu, commodo eu lacus. Morbi in ligula nibh. Maecenas ut mi at odio hendrerit eleifend tempor vitae augue. Fusce eget arcu et nibh dapibus maximus consectetur in est.</p>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <article class="box-4">
                      <div class="box-4-inner">
                        <h3>Sign up for a class</h3>
                        <!-- RD Mailform-->
                        <form class="rd-form rd-mailform form-lg" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                          <div class="form-wrap form-wrap-icon">
                            <label class="form-label form-label-outside" for="form-3-title">Full Name</label>
                            <input class="form-input" id="form-3-title" type="text" name="name" />
                            <div class="icon form-icon mdi mdi-border-color"></div>
                          </div>
                          <div class="form-wrap form-wrap-icon">
                            <label class="form-label form-label-outside" for="form-3-date">Date</label>
                            <input class="form-input" id="form-3-date" type="text" name="date"  data-time-picker="date"/>
                            <div class="icon form-icon mdi mdi-calendar-text"></div>
                          </div>
                          <div class="form-wrap form-wrap-icon">
                            <label class="form-label" for="form-3-email">E-mail</label>
                            <input class="form-input" id="form-3-email" type="email" name="email" />
                            <div class="icon form-icon mdi mdi-email-outline"></div>
                          </div>
                          <div class="form-wrap form-wrap-icon">
                            <input class="form-input" id="form-3-phone" type="text" name="phone" />
                            <label class="form-label" for="form-3-phone">Phone</label>
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
            </div>
            <div class="tab-pane fade" id="tabs-1-4">
              <div class="container">
                <div class="row row-50">
                  <div class="col-lg-8">
                    <div class="inset-1">
                      <h2 class="text-uppercase fw-bold">Gallery</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec posuere metus et tortor pulvinar venenatis. Aliquam erat volutpat. Nam ultrices semper felis, at laoreet metus</p>
                      <div class="row row-6 row-x-6" data-lightgallery="group">
                        <div class="col-4"><a class="thumbnail-light" href="images/single-tour-4-original.jpg" data-lightgallery="item"><img class="thumbnail-light-image" src="<?php echo e(asset('public/frontEnd/images/single-tour-4-355x359.jpg')); ?>" alt="" width="355" height="359"/></a></div>
                        <div class="col-4"><a class="thumbnail-light" href="images/single-tour-7-original.jpg" data-lightgallery="item"><img class="thumbnail-light-image" src="<?php echo e(asset('public/frontEnd/images/single-tour-7-355x359.jpg')); ?>" alt="" width="355" height="359"/></a></div>
                        <div class="col-4"><a class="thumbnail-light" href="images/single-tour-9-original.jpg" data-lightgallery="item"><img class="thumbnail-light-image" src="<?php echo e(asset('public/frontEnd/images/single-tour-9-355x359.jpg')); ?>" alt="" width="355" height="359"/></a></div>
                        <div class="col-4"><a class="thumbnail-light" href="images/single-tour-2-original.jpg" data-lightgallery="item"><img class="thumbnail-light-image" src="<?php echo e(asset('public/frontEnd/images/single-tour-2-355x359.jpg')); ?>" alt="" width="355" height="359"/></a></div>
                        <div class="col-4"><a class="thumbnail-light" href="images/single-tour-5-original.jpg" data-lightgallery="item"><img class="thumbnail-light-image" src="<?php echo e(asset('public/frontEnd/images/single-tour-5-355x359.jpg')); ?>" alt="" width="355" height="359"/></a></div>
                        <div class="col-4"><a class="thumbnail-light" href="images/single-tour-6-original.jpg" data-lightgallery="item"><img class="thumbnail-light-image" src="<?php echo e(asset('public/frontEnd/images/single-tour-6-355x359.jpg')); ?>" alt="" width="355" height="359"/></a></div>
                        <div class="col-4"><a class="thumbnail-light" href="images/single-tour-1-original.jpg" data-lightgallery="item"><img class="thumbnail-light-image" src="<?php echo e(asset('public/frontEnd/images/single-tour-1-355x359.jpg')); ?>" alt="" width="355" height="359"/></a></div>
                        <div class="col-4"><a class="thumbnail-light" href="images/single-tour-8-original.jpg" data-lightgallery="item"><img class="thumbnail-light-image" src="<?php echo e(asset('public/frontEnd/images/single-tour-8-355x359.jpg')); ?>" alt="" width="355" height="359"/></a></div>
                        <div class="col-4"><a class="thumbnail-light" href="images/single-tour-3-original.jpg" data-lightgallery="item"><img class="thumbnail-light-image" src="<?php echo e(asset('public/frontEnd/images/single-tour-3-355x359.jpg')); ?>" alt="" width="355" height="359"/></a></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <article class="box-4">
                      <div class="box-4-inner">
                        <h3>Sign up for a class</h3>
                        <!-- RD Mailform-->
                        <form class="rd-form rd-mailform form-lg" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                          <div class="form-wrap form-wrap-icon">
                            <label class="form-label form-label-outside" for="form-4-title">Full Name</label>
                            <input class="form-input" id="form-4-title" type="text" name="name" />
                            <div class="icon form-icon mdi mdi-border-color"></div>
                          </div>
                          <div class="form-wrap form-wrap-icon">
                            <label class="form-label form-label-outside" for="form-4-date">Date</label>
                            <input class="form-input" id="form-4-date" type="text" name="date"  data-time-picker="date"/>
                            <div class="icon form-icon mdi mdi-calendar-text"></div>
                          </div>
                          <div class="form-wrap form-wrap-icon">
                            <label class="form-label" for="form-4-email">E-mail</label>
                            <input class="form-input" id="form-4-email" type="email" name="email" />
                            <div class="icon form-icon mdi mdi-email-outline"></div>
                          </div>
                          <div class="form-wrap form-wrap-icon">
                            <input class="form-input" id="form-4-phone" type="text" name="phone" />
                            <label class="form-label" for="form-4-phone">Phone</label>
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
            </div>
            <div class="tab-pane fade" id="tabs-1-5">
              <div class="container">
                <div class="row row-50">
                  <div class="col-lg-8">
                    <div class="inset-1">
                      <article class="box-5">
                        <div class="box-5-aside">
                          <p class="box-5-rating">9,5</p>
                          <h5 class="box-5-title">Superb</h5>
                        </div>
                        <div class="box-5-main">
                          <ul class="box-5-list">
                            <li>
                              <!-- Linear progress bar-->
                              <article class="progress-linear tab-progress-bar" data-formatter="rating">
                                <div class="progress-header">
                                  <p class="progress-title">Content</p>
                                </div>
                                <div class="progress-bar-linear-wrap">
                                  <div class="progress-bar-linear"><span class="progress-value">57</span></div>
                                </div>
                              </article>
                            </li>
                            <li>
                              <!-- Linear progress bar-->
                              <article class="progress-linear tab-progress-bar" data-formatter="rating">
                                <div class="progress-header">
                                  <p class="progress-title">Educational Resources</p>
                                </div>
                                <div class="progress-bar-linear-wrap">
                                  <div class="progress-bar-linear"><span class="progress-value">78</span></div>
                                </div>
                              </article>
                            </li>
                            <li>
                              <!-- Linear progress bar-->
                              <article class="progress-linear tab-progress-bar" data-formatter="rating">
                                <div class="progress-header">
                                  <p class="progress-title">Received Knowledge</p>
                                </div>
                                <div class="progress-bar-linear-wrap">
                                  <div class="progress-bar-linear"><span class="progress-value">68</span></div>
                                </div>
                              </article>
                            </li>
                            <li>
                              <!-- Linear progress bar-->
                              <article class="progress-linear tab-progress-bar" data-formatter="rating">
                                <div class="progress-header">
                                  <p class="progress-title">Results</p>
                                </div>
                                <div class="progress-bar-linear-wrap">
                                  <div class="progress-bar-linear"><span class="progress-value">81</span></div>
                                </div>
                              </article>
                            </li>
                            <li>
                              <!-- Linear progress bar-->
                              <article class="progress-linear tab-progress-bar" data-formatter="rating">
                                <div class="progress-header">
                                  <p class="progress-title">Value for Money</p>
                                </div>
                                <div class="progress-bar-linear-wrap">
                                  <div class="progress-bar-linear"><span class="progress-value">72</span></div>
                                </div>
                              </article>
                            </li>
                          </ul>
                        </div>
                      </article>
                      <div class="comment-review-group">
                        <article class="comment-review"><img class="comment-review-avatar" src="<?php echo e(asset('public/frontEnd/images/single-tour-15-86x86.jpg')); ?>" alt="" width="86" height="86"/>
                          <div class="comment-review-main">
                            <p class="heading-5 comment-review-name">Jane Smith</p>
                            <time datetime="2021">October 5, 2021 at 1:44 pm</time>
                            <div class="comment-review-text">
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate</p>
                            </div>
                            <ul class="comment-review-meta review-meta">
                              <li>
                                <p>Overall</p>
                                <ul class="comment-review-rating review-rating">
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star"></li>
                                  <li class="icon mdi mdi-star"></li>
                                </ul>
                              </li>
                              <li>
                                <p>Knowledge</p>
                                <ul class="comment-review-rating review-rating">
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star"></li>
                                  <li class="icon mdi mdi-star"></li>
                                </ul>
                              </li>
                              <li>
                                <p>Resources</p>
                                <ul class="comment-review-rating review-rating">
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star"></li>
                                  <li class="icon mdi mdi-star"></li>
                                </ul>
                              </li>
                              <li>
                                <p>Content</p>
                                <ul class="comment-review-rating review-rating">
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star"></li>
                                  <li class="icon mdi mdi-star"></li>
                                </ul>
                              </li>
                            </ul>
                          </div>
                        </article>
                        <article class="comment-review"><img class="comment-review-avatar" src="<?php echo e(asset('public/frontEnd/images/single-tour-16-86x86.jpg')); ?>" alt="" width="86" height="86"/>
                          <div class="comment-review-main">
                            <p class="heading-5 comment-review-name">Peter Wilson</p>
                            <time datetime="2021">October 5, 2021 at 2:15 pm</time>
                            <div class="comment-review-text">
                              <p>Silva, impositio, et eleates. Contencios experimentum, tanquam fatalis zelus. Bromiums cantare, tanquam varius eleates. Competition ires, tanquam bi-color adiurator. Eleates, devatio, et caesium. Zelus velums, tanquam salvus aonides. Bubos sunt eposs de secundus sectam.</p>
                            </div>
                            <ul class="comment-review-meta review-meta">
                              <li>
                                <p>Overall</p>
                                <ul class="comment-review-rating review-rating">
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star"></li>
                                  <li class="icon mdi mdi-star"></li>
                                </ul>
                              </li>
                              <li>
                                <p>Knowledge</p>
                                <ul class="comment-review-rating review-rating">
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star"></li>
                                  <li class="icon mdi mdi-star"></li>
                                </ul>
                              </li>
                              <li>
                                <p>Resources</p>
                                <ul class="comment-review-rating review-rating">
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star"></li>
                                  <li class="icon mdi mdi-star"></li>
                                </ul>
                              </li>
                              <li>
                                <p>Content</p>
                                <ul class="comment-review-rating review-rating">
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star text-primary"></li>
                                  <li class="icon mdi mdi-star"></li>
                                  <li class="icon mdi mdi-star"></li>
                                </ul>
                              </li>
                            </ul>
                          </div>
                        </article>
                      </div>
                      <h3 class="mt-40 mt-md-45 mt-xl-70">Write a Review</h3>
                      <article class="box-6">
                        <ul class="comment-review-meta review-meta">
                          <li>
                            <p>Overall</p>
                            <ul class="comment-review-rating review-rating">
                              <li class="icon mdi mdi-star text-primary"></li>
                              <li class="icon mdi mdi-star text-primary"></li>
                              <li class="icon mdi mdi-star text-primary"></li>
                              <li class="icon mdi mdi-star"></li>
                              <li class="icon mdi mdi-star"></li>
                            </ul>
                          </li>
                          <li>
                            <p>Knowledge</p>
                            <ul class="comment-review-rating review-rating">
                              <li class="icon mdi mdi-star text-primary"></li>
                              <li class="icon mdi mdi-star text-primary"></li>
                              <li class="icon mdi mdi-star text-primary"></li>
                              <li class="icon mdi mdi-star"></li>
                              <li class="icon mdi mdi-star"></li>
                            </ul>
                          </li>
                          <li>
                            <p>Resources</p>
                            <ul class="comment-review-rating review-rating">
                              <li class="icon mdi mdi-star text-primary"></li>
                              <li class="icon mdi mdi-star text-primary"></li>
                              <li class="icon mdi mdi-star text-primary"></li>
                              <li class="icon mdi mdi-star"></li>
                              <li class="icon mdi mdi-star"></li>
                            </ul>
                          </li>
                          <li>
                            <p>Content</p>
                            <ul class="comment-review-rating review-rating">
                              <li class="icon mdi mdi-star text-primary"></li>
                              <li class="icon mdi mdi-star text-primary"></li>
                              <li class="icon mdi mdi-star text-primary"></li>
                              <li class="icon mdi mdi-star"></li>
                              <li class="icon mdi mdi-star"></li>
                            </ul>
                          </li>
                        </ul>
                        <!-- RD Mailform-->
                        <form class="rd-form rd-mailform form-lg" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                          <div class="row row-30">
                            <div class="col-md-6">
                              <div class="form-wrap form-wrap-icon">
                                <input class="form-input" id="form-name" type="text" name="name" >
                                <label class="form-label" for="form-name">Name</label>
                                <div class="icon form-icon mdi mdi-account-outline text-primary"></div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-wrap form-wrap-icon">
                                <input class="form-input" id="form-email" type="email" name="email" >
                                <label class="form-label" for="form-email">E-mail</label>
                                <div class="icon form-icon mdi mdi-email-outline text-primary"></div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-wrap form-wrap-icon">
                                <label class="form-label" for="form-review">Review</label>
                                <textarea class="form-input" id="form-review" name="review" ></textarea>
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
                  </div>
                  <div class="col-lg-4">
                    <article class="box-4">
                      <div class="box-4-inner">
                        <h3>Sign up for a class</h3>
                        <!-- RD Mailform-->
                        <form class="rd-form rd-mailform form-lg" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                          <div class="form-wrap form-wrap-icon">
                            <label class="form-label form-label-outside" for="form-5-title">Full Name</label>
                            <input class="form-input" id="form-5-title" type="text" name="name" />
                            <div class="icon form-icon mdi mdi-border-color"></div>
                          </div>
                          <div class="form-wrap form-wrap-icon">
                            <label class="form-label form-label-outside" for="form-5-date">Date</label>
                            <input class="form-input" id="form-5-date" type="text" name="date"  data-time-picker="date"/>
                            <div class="icon form-icon mdi mdi-calendar-text"></div>
                          </div>
                          <div class="form-wrap form-wrap-icon">
                            <label class="form-label" for="form-5-email">E-mail</label>
                            <input class="form-input" id="form-5-email" type="email" name="email" />
                            <div class="icon form-icon mdi mdi-email-outline"></div>
                          </div>
                          <div class="form-wrap form-wrap-icon">
                            <input class="form-input" id="form-5-phone" type="text" name="phone" />
                            <label class="form-label" for="form-5-phone">Phone</label>
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
            </div>
          </div>
        </div>
      </section>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/frontEnd/js/owl.carousel.min.js')); ?>"></script>

    <script src="<?php echo e(asset('public/frontEnd/js/zoomsl.min.js')); ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php $__errorArgs = [$errors->any()];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: '<?php echo e($error); ?>',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </script>



<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\aaa\resources\views/frontEnd/layouts/pages/details.blade.php ENDPATH**/ ?>