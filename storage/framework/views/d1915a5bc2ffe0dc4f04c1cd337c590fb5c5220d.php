
<?php $__env->startSection('title','Seller Withdraw'); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('/public/backEnd/')); ?>/assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<style>
    .seller__filers{
        width: 50%;
        gap: 10px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="<?php echo e(route('sellers.index',['status'=>'active'])); ?>" class="btn btn-primary rounded-pill">Back</a>
                </div>
                <h4 class="page-title">Seller Withdraw - <?php echo e($seller->name); ?></h4>
            </div>
        </div>
    </div>       
    <!-- end page title --> 
   <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route('sellers.withdraw.save')); ?>" method="POST" class="select_pay">
                    <input type="hidden" value="<?php echo e($seller->id); ?>" name="seller_id">
                <?php echo csrf_field(); ?>
               <div class="seller__filers d-flex mb-4">
                    <select name="withdraw_status"  class="form-control form-select"  required>
                  <option value="">Select..</option>
                  <option value="processing">Processing</option>
                  <option value="paid">Paid</option>
                </select>
                <button type="submit" class="btn btn-primary" >Apply</button>

               </div>
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th><div class="form-check checkall text-primary">
                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label" for="checkall">All</label>
                        </div></th>
                            <th>SL</th>
                            <th>Invoice</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Commission</th>
                            <th>Qty</th>
                            <th>Image</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><div class="form-check">
                                <input type="checkbox" class="form-check-input" value="<?php echo e($value->id); ?>" id="customCheck<?php echo e($value->id); ?>" name="order_id[]">
                                <label class="form-check-label" for="customCheck<?php echo e($value->id); ?>"><?php echo e($value->name); ?></label>
                            </div></td>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($value->order?$value->order->invoice_id:''); ?></td>
                            <td><?php echo e(Str::limit($value->product_name,30)); ?></td>
                            <td><?php echo e($value->sale_price); ?> Tk</td>
                            <td><?php echo e($value->seller_commision); ?> Tk</td>
                            <td><?php echo e($value->qty); ?></td>
                            <td><img src="<?php echo e(asset($value->image?$value->image->image:'')); ?>" class="backend-image" alt=""></td>
                            <td><?php if($value->order?$value->order->order_status=='pending':''): ?><span class="badge bg-soft-danger text-danger"><?php echo e($value->order?$value->order->order_status:''); ?></span> <?php else: ?> <span class="badge bg-soft-success text-success"><?php echo e($value->order?$value->order->order_status:''); ?></span> <?php endif; ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
   </div>
</div>
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
<script>
    jQuery(".checkall").click(function() {
    jQuery(':checkbox').each(function() {
      if(this.checked == true) {
        this.checked = false;                        
      } else {
        this.checked = true;                        
      }      
    });

  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp\htdocs\pikarihut1\resources\views/backEnd/seller/withdraw.blade.php ENDPATH**/ ?>