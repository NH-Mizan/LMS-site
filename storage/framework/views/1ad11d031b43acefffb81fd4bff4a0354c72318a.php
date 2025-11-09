
<?php $__env->startSection('title',$title.'Ventor Withdraw'); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/backEnd')); ?>/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/backEnd/')); ?>/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
<style>
    p{
        margin:0;
    }
   @page { 
        margin: 50px 0px 0px 0px;
    }
   @media print {
    td{
        font-size: 18px;
    }
    p{
        margin:0;
    }
    title {
        font-size: 25px;
    }
    header,footer,.no-print,.left-side-menu,.navbar-custom {
      display: none !important;
    }
  }
</style>
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title text-capitalize"><?php echo e($title); ?> Withdraw</h4>
            </div>
        </div>
    </div>   
    <form class="no-print">
        <div class="row">   
            <div class="col-sm-3">
                <div class="form-group mb-3">
                    <label for="seller_id" class="form-label">Seller </label>
                    <select class="form-control select2 <?php $__errorArgs = ['seller_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="seller_id" value="<?php echo e(old('seller_id')); ?>" >
                        <option value="">Select..</option>
                        <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->id); ?>" <?php if(request()->get('seller_id') == $value->id): ?> selected <?php endif; ?>><?php echo e($value->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3">
                <div class="form-group">
                   <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" value="<?php echo e(request()->get('start_date')); ?>"  class="form-control flatdate" name="start_date">
                </div>
            </div>
            <!--col-sm-3--> 
            <div class="col-sm-3">
                <div class="form-group">
                   <label for="end_date" class="form-label">End Date</label>
                    <input type="date" value="<?php echo e(request()->get('end_date')); ?>" class="form-control flatdate" name="end_date">
                </div>
            </div>
            <!--col-sm-3-->
            <div class="col-sm-3">
                <div class="form-group mt-3">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
            <!-- col end -->
        </div>  
    </form>
    <!-- end page title -->
    <div class="row mb-3">
        <div class="col-sm-6 no-print">
             <?php echo e($withdraws->links('pagination::bootstrap-4')); ?>

        </div>
        <div class="col-sm-6">
            <div class="export-print text-end">
                <button onclick="printFunction()"class="no-print btn btn-success"><i class="fa fa-print"></i> Print</button>
                <button id="export-excel-button" class="no-print btn btn-info"><i class="fas fa-file-export"></i> Export</button>
            </div>
        </div>
    </div>
   <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="content-to-export" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th style="width:5%">SL</th>
                            <th style="width:17%">Request Date <br> Pay Date</th>
                            <th style="width:10%">Seller</th>
                            <th style="width:10%">Method</th>
                            <th style="width:10%">Receive</th>
                            <th style="width:10%">Amount</th>
                            <th style="width:10%">Note</th>
                            <th style="width:10%">Receipt</th>
                            <th style="width:8%">Status</th>
                            <th style="width:10%">Action</th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                        <?php $__currentLoopData = $withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e(date('d-m-Y', strtotime($value->request_date))); ?>,<br><?php echo e(date('d-m-Y', strtotime($value->pay_date))); ?></td>
                            <td><?php echo e($value->seller?$value->seller->name:''); ?></td>
                            <td><?php echo e($value->method); ?></td>
                            <td><?php echo e($value->receive); ?></td>
                            <td><?php echo e($value->amount); ?></td>
                            <td><?php echo e($value->note); ?></td>
                            <td><a href="<?php echo e(route('admin.slip',$value->id)); ?>" class="btn btn-xs btn-blue waves-effect waves-light"><i class="fe-eye"></i></a></td>
                            <td><?php echo e($value->status); ?></td>
                            <td>
                               <a data-bs-toggle="modal" data-bs-target="#withdraw<?php echo e($value->id); ?>" class="btn btn-success btn-xs btn-rounded">Status</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
 
            </div> <!-- end card body-->
        </div> <!-- end card -->
        <div class="custom-paginate">
            <?php echo e($withdraws->links('pagination::bootstrap-4')); ?>

        </div>
    </div><!-- end col-->
   </div>
</div>

<?php $__currentLoopData = $withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="withdraw<?php echo e($value->id); ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title">Withdraw Status - <?php echo e($value->name); ?> (<?php echo e($loop->iteration); ?>)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body">
           <form action="<?php echo e(route('admin.ventorwithdraw_change')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($value->id); ?>">
             <div class="form-group mb-3">
                 <label class="form-label">Status</label>
                 <select class="form-control" name="status" required>
                     <option value="">Select...</option>
                     <option  value="paid" <?php echo e($value->status == 'paid' ? 'selected':''); ?>>Paid</option>
                     <option  value="cancel" <?php echo e($value->status == 'cancel' ? 'selected':''); ?>>cancel</option>
                 </select>
             </div>
             <!-- <div class="form-group mb-3">
                 <label class="form-label">Admin Note</label>
                 <textarea name="note" class="form-control" required><?php echo e($value->note); ?></textarea>
             </div> -->
             <div class="form-group">
                 <button <?php echo e($value->status=='paid'?'disabled':''); ?> type="submit" class="btn btn-success change-confirm">Submit</button>
             </div>
            </form>
       </div>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/libs/select2/js/select2.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/js/pages/form-advanced.init.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/libs/flatpickr/flatpickr.min.js"></script>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.select2').select2();
        flatpickr(".flatdate", {});
    });
</script>
<script>
    function printFunction() {
        window.print();
    }
</script>
<script>
    $(document).ready(function() {
        $('#export-excel-button').on('click', function() {
            var contentToExport = $('#content-to-export').html();
            var tempElement = $('<div>');
            tempElement.html(contentToExport);
            tempElement.find('.table').table2excel({
                exclude: ".no-export",
                name: "Order Report" 
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp\htdocs\pikarihut1\resources\views/backEnd/ventor/withdraw.blade.php ENDPATH**/ ?>