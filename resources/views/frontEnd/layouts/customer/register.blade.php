@extends('frontEnd.layouts.master')
@section('title','Customer Register')
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
                    <p class="auth-title"> Customer Register </p>
                    <form action="{{route('customer.store')}}" method="POST"  data-parsley-validate="">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder=" Your Name " required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- col-end -->
                        <div class="form-group mb-3">
                            <label for="phone"> Phone Number </label>
                            <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- col-end -->
                        <!--<div class="form-group mb-3">-->
                        <!--    <label for="email"> Email</label>-->
                        <!--    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="ইমেইল">-->
                        <!--    @error('email')-->
                        <!--        <span class="invalid-feedback" role="alert">-->
                        <!--            <strong>{{ $message }}</strong>-->
                        <!--        </span>-->
                        <!--    @enderror-->
                        <!--</div>-->
                        <!-- col-end -->
                        <div class="form-group mb-3">
                            <label for="password"> Password </label>
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
                        <button class="submit-btn">Register</button>
                         <div class="register-now no-account">
                        <p><i class="fa-solid fa-user"></i> If already registered?</p>
                        <a href="{{route('customer.login')}}"><i data-feather="edit-3"></i> Login</a>
                    </div>
                        </div>
                     <!-- col-end -->
                     
                    
                     </form>
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