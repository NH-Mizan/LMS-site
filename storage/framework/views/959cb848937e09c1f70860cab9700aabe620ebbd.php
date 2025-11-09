
<?php $__env->startSection('title','Seller Profile'); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="<?php echo e(route('sellers.index',['status'=>'active'])); ?>" class="btn btn-primary rounded-pill">Seller List</a>
                    <form method="post" action="<?php echo e(route('sellers.adminlog')); ?>" class="d-inline" target="_blank">
                        <?php echo csrf_field(); ?>
                    <input type="hidden" value="<?php echo e($profile->id); ?>" name="hidden_id">        
                    <button type="button" class="btn btn-info rounded-pill change-confirm" title="Login as customer"><i class="fe-log-in"></i> Login</button></form>
                </div>
                <h4 class="page-title">Seller Profile</h4>
            </div>
        </div>
    </div>  
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card text-center">
                <div class="card-body">
                    <img src="<?php echo e(asset($profile->image)); ?>" class="rounded-circle avatar-lg img-thumbnail"
                    alt="seller-image">

                    <h4 class="mb-0"><?php echo e($profile->name); ?></h4>
                    <p class="text-muted">Balance - <?php echo e($profile->balance); ?></p>

                    <a href="tel:<?php echo e($profile->phone); ?>" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Call</a>
                    <a href="mailto:<?php echo e($profile->email); ?>" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Email</a>

                    <div class="text-start mt-3">
                        <h4 class="font-13 text-uppercase">About Me :</h4>
                        <table class="table">
                            <tbody>
                            <tr class="text-muted mb-2 font-13">
                                <td>Full Name </td>
                                <td class="ms-2"><?php echo e($profile->name); ?></td>
                            </tr>

                            <tr class="text-muted mb-2 font-13">
                                <td>Mobile </td>
                                <td class="ms-2"><?php echo e($profile->phone); ?></td>
                            </tr>

                            <tr class="text-muted mb-2 font-13">
                                <td>Email </td> 
                                <td class="ms-2"><?php echo e($profile->email); ?></td>
                            </tr>

                            <tr class="text-muted mb-1 font-13">
                                <td>Address </td> 
                                <td class="ms-2"><?php echo e($profile->address); ?></td>
                            </tr>
                            <tr class="text-muted mb-1 font-13">
                                <td>District </td> 
                                <td class="ms-2"><?php echo e($profile->district); ?></td>
                            </tr>
                            <tr class="text-muted mb-1 font-13">
                                <td>Upzlila </td> 
                                <td class="ms-2"><?php echo e($profile->area); ?></td>
                            </tr>

                            <tr class="text-muted mb-1 font-13">
                                <td>Balance </td> 
                                <td class="ms-2"><?php echo e($profile->balance); ?> Tk</td>
                            </tr>
                            
                            <tr class="text-muted mb-1 font-13">
                                <td>Withdraw :</td> 
                                <td class="ms-2"><?php echo e($profile->withdraw); ?> Tk</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end card -->

        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-fill navtab-bg">
                        <li class="nav-item">
                            <a href="#order" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                               Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#withdraw" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                               Withdraw
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="order">
                            <h4>Orders</h4>
                            <table class="table table-striped dt-responsive nowrap w-100 datatable2">
                                <thead>
                                    <tr>
                                       <th>SL</th>
                                        <th>Invoice</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $profile->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($value->order?$value->order->invoice_id:''); ?></td>
                                        <td><?php echo e($value->product_name); ?></td>
                                        <td><?php echo e($value->sale_price); ?> Tk</td>
                                        <td><?php echo e($value->qty); ?></td>
                                        <td><img src="<?php echo e(asset($value->image?$value->image->image:'')); ?>" class="backend-image" alt=""></td>
                                        <td><?php if($value->order?$value->order->order_status=='pending':''): ?><span class="badge bg-soft-danger text-danger"><?php echo e($value->order?$value->order->order_status:''); ?></span> <?php else: ?> <span class="badge bg-soft-success text-success"><?php echo e($value->order?$value->order->order_status:''); ?></span> <?php endif; ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end  item-->
                        <div class="tab-pane" id="withdraw">
                            <h4>Withdraw List</h4>
                            <table class="table table-striped dt-responsive nowrap w-100 datatable2">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $profile->withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($value->created_at->format('d-m-Y H:m a')); ?></td>
                                        <td><?php echo e($value->amount); ?></td>
                                        <td><?php if($value->status=='pending'): ?><span class="badge bg-soft-danger text-danger"><?php echo e($value->status); ?></span> <?php else: ?> <span class="badge bg-soft-success text-success"><?php echo e($value->status); ?></span> <?php endif; ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end  item-->
                    </div> <!-- end tab-content -->
                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end row-->

</div> <!-- container -->

</div> <!-- content -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<!-- third party js -->
<script src="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php echo e(asset('/public/backEnd/')); ?>/assets/js/pages/datatables.init.js"></script>
<!-- third party js ends -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp\htdocs\pikarihut1\resources\views/backEnd/seller/profile.blade.php ENDPATH**/ ?>