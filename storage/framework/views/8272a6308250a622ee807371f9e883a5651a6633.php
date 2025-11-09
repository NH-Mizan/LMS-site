
<?php $__env->startSection('title','Payment Withdraw'); ?>
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
                <h4 class="page-title text-capitalize">Payment Withdraw </h4>
            </div>
            <div class="my-dashboard mb-2">
                <button class="withdraw_rquest btn btn-success" data-bs-toggle="modal" data-bs-target="#withdraw">New Withdraw</button>
            </div>
        </div>
    </div>       
    <!-- end page title --> 
   <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                        <?php $__currentLoopData = $withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($value->created_at->format('d-d-Y H:m a')); ?></td>
                            <td><?php echo e($value->amount); ?></td>
                            <td><?php if($value->status=='pending'): ?><span class="badge bg-soft-danger text-danger"><?php echo e($value->status); ?></span> <?php else: ?> <span class="badge bg-soft-success text-success"><?php echo e($value->status); ?></span> <?php endif; ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
 
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
   </div>
</div>

<!-- withdraw modal-start -->
<div class="modal fade" id="withdraw" tabindex="-1" aria-labelledby="withdraw" aria-hidden="true">
  <div class="modal-dialog custom_modal">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="withdrawLabel">New Withdraw</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('seller.sellerwithdraw_request')); ?>" method="POST" class="withdraw_form">
             <?php echo csrf_field(); ?>
             <div class="from-group">
                <label for="amount">Amount <strong class="text-danger"> (Current Balance <?php echo e(Auth::guard('seller')->user()->balance); ?> TK)</strong></label>
                 <input type="number" id="amount" name="amount" class="form-control border" placeholder="Enter Amount" required>
             </div>
             <div class="from-group">
                <label for="method">Payment Method</label>
                 <select name="method" id="method" class="form-control border" required>
                     <option value="">Select..</option>
                     <option value="bKash">bKash</option>
                     <option value="Nagad">Nagad</option>
                     <option value="Rocket">Rocket</option>
                     <option value="Bank">Bank</option>
                 </select>
             </div>
             <div class="from-group">
                <label for="amount">Receive Number</label>
                 <input type="number" id="amount" name="receive" class="form-control border" placeholder="Enter Receive Number" required>
             </div>
             <div class="from-group">
                <label for="note">Note</label>
                 <textarea  id="note" name="note" class="form-control border" placeholder="Write your payment receive information"></textarea>
             </div>
             <div class="from-group">
                <label for="password"> Your Password</label>
                 <input type="password" id="password" name="password" class="form-control border" placeholder="Enter Your Password" required>
             </div>
             <div class="form-group my-2">
                 <button type="submit" class="btn btn-success"> Submit Withdraw</button>
             </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- withdraw modal-end -->
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
<?php echo $__env->make('frontEnd.seller.pages.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp\htdocs\pikarihut1\resources\views/frontEnd/seller/pages/withdraws.blade.php ENDPATH**/ ?>