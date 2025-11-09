
<?php $__env->startSection('title','Customer Login'); ?>
<?php $__env->startSection('content'); ?>
<style>
    input.input__pass{
    width: 89%;
}
</style>
<section class="auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <div class="form-content">
                    <p class="auth-title"> Customer Login </p>
                    <form action="<?php echo e(route('customer.signin')); ?>" method="POST"  data-parsley-validate="">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label for="phone">Phone Number</label>
                            <input type="number" id="phone" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" value="<?php echo e(old('phone')); ?>"  required>
                            <?php $__errorArgs = ['phone'];
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
                        <!-- col-end -->
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                          <div class="input-group input-group-merge">
  <input type="password" placeholder="Password" required class="input__pass" name="password" id="password" value="<?php echo e(old('password')); ?>">
  <div class="input-group-text" id="togglePassword">
    <span class="password-eye">️</span>
  </div>
</div>
                            <?php $__errorArgs = ['password'];
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
                        <!-- col-end -->
                        <a href="<?php echo e(route('customer.forgot.password')); ?>" class="forget-link"><i class="fa-solid fa-unlock"></i> Forgot Password?</a>
                        <div class="form-group mb-3">
                            <button class="submit-btn"> Login </button>
                        </div>
                     <!-- col-end -->
                     </form>
                     <div class="register-now no-account">
                        <p> If you don't have an account? </p>
                        <a href="<?php echo e(route('customer.register')); ?>"><i data-feather="edit-3"></i> Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
  const passwordInput = document.getElementById('password');
  const toggle = document.getElementById('togglePassword');

  toggle.addEventListener('click', function() {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    // Toggle data attribute
    const currentState = toggle.getAttribute('data-password') === 'true';
    toggle.setAttribute('data-password', !currentState);

    // Optional: Change icon when toggled
    toggle.querySelector('.password-eye').textContent = type === 'password' ? '️' : '';
  });
</script>
<script src="<?php echo e(asset('public/frontEnd/')); ?>/js/parsley.min.js"></script>
<script src="<?php echo e(asset('public/frontEnd/')); ?>/js/form-validation.init.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/flexzzyc/public_html/resources/views/frontEnd/layouts/customer/login.blade.php ENDPATH**/ ?>