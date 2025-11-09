
<?php $__env->startSection('title','Subcategory Edit'); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/backEnd')); ?>/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/backEnd')); ?>/assets/libs/summernote/summernote-lite.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="<?php echo e(route('subcategories.index')); ?>" class="btn btn-primary rounded-pill">Manage</a>
                </div>
                <h4 class="page-title">Subcategory Edit</h4>
            </div>
        </div>
    </div>       
    <!-- end page title --> 
   <div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route('subcategories.update')); ?>" method="POST" class="row" data-parsley-validate="" name="editForm"  enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" value="<?php echo e($edit_data->id); ?>" name="id">
                    

                    <div class="col-sm-12">
                        <div class="form-group mb-3">
                            <label for="category_id" class="form-label">Category *</label>
                             <select class="form-control select2-multiple <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="category_id" name="category_id" value="<?php echo e(old('category_id')); ?>" data-placeholder="Choose ..."required>
                                <optgroup >
                                    <option value="">Choose..</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>" <?php if($value->id == $edit_data->category_id): ?> selected <?php endif; ?>><?php echo e($value->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </optgroup>
                            </select>
                            <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <!-- col end -->

                    <div class="col-sm-12">
                        <div class="form-group mb-3">
                            <label for="subcategoryName" class="form-label">SubcategoryName *</label>
                            <input type="text" id="subcategoryName" class="form-control <?php $__errorArgs = ['subcategoryName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="subcategoryName" value="<?php echo e($edit_data->subcategoryName); ?>" id="subcategoryName" required="">
                            <?php $__errorArgs = ['subcategoryName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <!-- col-end -->
                    <div class="col-sm-12">
                        <div class="form-group mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" class="form-control <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="meta_title" value="<?php echo e($edit_data->meta_title); ?>" id="meta_title">
                            <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="form-group mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="summernote form-control <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="meta_description" rows="6"  id="meta_description" ><?php echo $edit_data->meta_description; ?></textarea>
                            <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                   
                    <div class="col mb-3">
                        <div class="form-group">
                            <label for="status" class="d-block">Status</label>
                            <label class="switch">
                              <input type="checkbox" value="1" name="status" <?php if($edit_data->status==1): ?>checked <?php endif; ?>>
                              <span class="slider round"></span>
                            </label>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <!-- col end -->
                    
                    
                    
                    <div>
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>

                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
   </div>
</div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/libs/parsleyjs/parsley.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/js/pages/form-validation.init.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/libs/select2/js/select2.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/js/pages/form-advanced.init.js"></script>

<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/libs//summernote/summernote-lite.min.js"></script>
<script>
    $(".summernote").summernote({
        placeholder: "Enter Your Text Here",    
    });
</script>

<script type="text/javascript">
    document.forms["editForm"].elements["subcategorytype"].value = "<?php echo e($edit_data->subcategorytype); ?>";
    document.forms["editForm"].elements["category_id"].value = "<?php echo e($edit_data->category_id); ?>";
</script>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/genzoram/public_html/resources/views/backEnd/subcategory/edit.blade.php ENDPATH**/ ?>