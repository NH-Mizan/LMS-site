@extends('frontEnd.layouts.master')
@section('title','Customer Login')
@section('content')
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
                    <form action="{{route('customer.signin')}}" method="POST"  data-parsley-validate="">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="phone">Phone Number</label>
                            <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- col-end -->
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                          <div class="input-group input-group-merge">
  <input type="password" placeholder="Password" required class="input__pass" name="password" id="password" value="{{ old('password') }}">
  <div class="input-group-text" id="togglePassword">
    <span class="password-eye">️</span>
  </div>
</div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- col-end -->
                        <a href="{{route('customer.forgot.password')}}" class="forget-link"><i class="fa-solid fa-unlock"></i> Forgot Password?</a>
                        <div class="form-group mb-3">
                            <button class="submit-btn"> Login </button>
                        </div>
                     <!-- col-end -->
                     </form>
                     <div class="register-now no-account">
                        <p> If you don't have an account? </p>
                        <a href="{{route('customer.register')}}"><i data-feather="edit-3"></i> Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
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
<script src="{{asset('public/frontEnd/')}}/js/parsley.min.js"></script>
<script src="{{asset('public/frontEnd/')}}/js/form-validation.init.js"></script>
@endpush