
<?php $__env->startSection('title','Profile'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="<?php echo e(route('seller.profile_edit')); ?>" class="btn btn-primary rounded-pill">Update</a>
                </div>
                <h4 class="page-title">My Profile</h4>
            </div>
        </div>
    </div>       
    <!-- end page title --> 
   <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <tbody>
                    	<tr>
                            <td>Shop Name</td>
                            <td><?php echo e($seller->name); ?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><?php echo e($seller->phone); ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo e($seller->email); ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo e($seller->address); ?></td>
                        </tr>
                        <tr>
                            <td>Disctrict</td>
                            <td><?php echo e($seller->district); ?></td>
                        </tr>
                        <tr>
                            <td>Area</td>
                            <td><?php echo e($seller->cust_area?$seller->cust_area->area_name:''); ?></td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><img src="<?php echo e(asset($seller->image)); ?>" alt="" height="80" class="circle-5"></td>
                        </tr>
                    </tbody>
                </table>
 
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontEnd.seller.pages.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp\htdocs\pikarihut1\resources\views/frontEnd/seller/pages/profile.blade.php ENDPATH**/ ?>