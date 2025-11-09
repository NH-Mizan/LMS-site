<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Seller Forgot Password | <?php echo e($generalsetting->name); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset($generalsetting->favicon)); ?>">
    <!-- Bootstrap css -->
    <link href="<?php echo e(asset('public/backEnd/')); ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- App css -->
    <link href="<?php echo e(asset('public/backEnd/')); ?>/assets/css/app.min.css" rel="stylesheet" id="app-style"/>
    <!-- icons -->
    <link href="<?php echo e(asset('public/backEnd/')); ?>/assets/css/icons.min.css" rel="stylesheet" />
    <!-- toastr js -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/assets/css/toastr.min.css">
    <!-- Head js -->
    <script src="<?php echo e(asset('public/backEnd/')); ?>/assets/js/head.js"></script>
<style>
body {
  margin: 0;
  font-family: Arial, sans-serif;
}

/* Header Styles */
.header {
    background-color: #e8f0fe;
    padding: 20px;
    color: #111184;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
  font-size: 1.5rem;
  font-weight: bold;
}

.nav-list {
  display: flex;
  gap: 20px;
  list-style: none;
  margin: 0;
  padding: 0;
}
section.join__sellers {
    padding: 30px 0;
}
.nav-list a {
    color: #ffffff;
    text-decoration: none;
    background: #111184;
    padding: 8px 10px;
    border-radius: 3px;
    font-size: 15px;
} 

.nav-list a:hover {
  text-decoration: underline;
}

.login-section {
    background-color: #1c1c79de;
    color: white;
    padding: 40px 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.login-content {
    max-width: 490px;
    background: #111184;
    padding: 25px;
    border-radius: 10px;
    border: 1px solid #fff;
}

.login-content h1 {
    font-size: 2rem;
    margin-bottom: 10px;
    color: white;
}
.login-content p {
  font-size: 1rem;
  margin-bottom: 20px;
}

.login-form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.login-form input {
    padding: 11px 10px;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
}

.login-form button {
  background-color: #ffffff;
  color: #111184;
  padding: 11px;
  font-size: 1rem;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.login-form button:hover {
  background-color: #ffe2d1;
}

.form-links {
  font-size: 0.9rem;
}

.form-links a {
  color: white;
  text-decoration: underline;
  margin: 0 5px;
}

.form-links a:hover {
  color: #ffe2d1;
}
/* Why Sell on Flexzzy Section */
.why-sell-section {
  text-align: center;
  padding: 50px 20px;
  background-color: #ffffff;
  color: #333;
}

.why-sell-section h2 {
  font-size: 2rem;
  margin-bottom: 30px;
}

.features-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  max-width: 1200px;
  margin: 0 auto;
}

.feature-box {
  background-color: #f9f9f9;
  border: 1px solid #ddd;
  border-radius: 10px;
  padding: 20px;
  text-align: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.feature-box img {
  width: 50px;
  height: 50px;
  margin-bottom: 15px;
}

.feature-box h3 {
  font-size: 1.25rem;
  color: #111184;
  margin-bottom: 10px;
}

.feature-box p {
  font-size: 0.95rem;
  color: #555;
}

.feature-box:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
/* Testimonials Section */
.testimonials-section {
  background-color: #f9f9f9;
  padding: 50px 20px;
  text-align: center;
}

.testimonials-section h2 {
  font-size: 2rem;
  margin-bottom: 30px;
}

.testimonial-container {
  display: flex;
  justify-content: space-around;
  gap: 40px;
  flex-wrap: wrap;
}

.testimonial {
  background-color: #ffffff;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  text-align: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.testimonial img {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  margin-bottom: 20px;
  object-fit: cover;
}

.testimonial h3 {
  font-size: 1.25rem;
  color: #111184;
  margin-bottom: 10px;
}

.testimonial p {
  font-size: 1rem;
  color: #555;
  margin-bottom: 15px;
}

.video-link a {
  text-decoration: none;
  color: #007bff;
  font-weight: bold;
}

.testimonial:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}
/* Steps Section */
.steps-section {
  background-color: #fff;
  padding: 50px 20px;
  text-align: center;
}

.steps-section h2 {
  font-size: 2rem;
  margin-bottom: 30px;
}

.steps-container {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  gap: 40px;
}

.step {
  background-color: #fffbf3;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  max-width: 300px;
  text-align: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.step img {
  width: 80px;
  height: 80px;
  margin-bottom: 20px;
}

.step h3 {
  font-size: 1.25rem;
  color: #111184;
  margin-bottom: 10px;
}

.step p {
  font-size: 1rem;
  color: #555;
  margin-bottom: 15px;
}

.step:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.download-app p {
  font-size: 1.25rem;
  margin-bottom: 20px;
}

.app-links {
  display: flex;
  gap: 20px;
  justify-content: center;
}

.app-links img {
  width: 150px;
  height: auto;
}
/* FAQ Section */
.faq-section {
  background-color: #f8f8f8;
  padding: 50px 20px;
  text-align: center;
}

.faq-section h2 {
  font-size: 2rem;
  margin-bottom: 30px;
}

.faq-container {
  display: flex;
  flex-direction: column;
  gap: 30px;
  max-width: 900px;
  margin: 0 auto;
}

.faq-item {
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.faq-item h3 {
  font-size: 1.25rem;
  color: #111184;
  margin-bottom: 15px;
}

.faq-item p {
  font-size: 1rem;
  color: #555;
}
/* Call to Action Section */
.cta-section {
  background-color: #111184;
  color: white;
  padding: 50px 20px;
  text-align: center;
}

.cta-container h2 {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: white;
}

.cta-container p {
  font-size: 1.2rem;
  margin-bottom: 30px;
}

.cta-button {
  background-color: #ffffff;
  color: #111184;
  padding: 15px 30px;
  font-size: 1.2rem;
  text-decoration: none;
  border-radius: 5px;
  font-weight: bold;
  transition: background-color 0.3s ease;
}

.cta-button:hover {
  background-color: #f4f4f4;
}
.login-content img {
    height: 50px;
}
.parsley-errors-list {
    margin: 0;
    padding: 0;
    text-align: left;
    color: yellow;
}

</style>
</head>
<body>
  <header class="header">
    <div class="logo">
      Flexzzy Seller Forgot Password
    </div>
    <nav>
      <ul class="nav-list">
        <li><a href="<?php echo e(route('home')); ?>">Go To Home</a></li>
      </ul>
    </nav>
  </header>
<section class="login-section">
  <div class="login-content">
    <img src="<?php echo e(asset('public/frontEnd/images/main-logo.png')); ?>" alt="">
    <h1>Become A Flexzzy Seller Today!</h1>
    <p>Create a Flexzzy seller account now and reach millions of customers!</p>
    <form action="<?php echo e(route('seller.forgot.verify')); ?>" method="POST" data-parsley-validate="" class="login-form">
        <?php echo csrf_field(); ?>
      <input type="text" placeholder="Mobile Number" required name="phone" class=" <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phone" value="<?php echo e(old('phone')); ?>">
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
     
      <button type="submit">Submit</button>
      <div class="form-links">
        <a href="<?php echo e(route('seller.login')); ?>">Login</a> |
        <a href="<?php echo e(route('seller.register')); ?>">Create a new account</a>
       
      </div>
    </form>
  </div>
</section>
 
 <section class="join__sellers">
   <div class="features-container">
     <div class="data_join_seller">
        <h3>Join the Flexzzy Seller Community</h3>
        <p class="mb-3">
          Welcome to Flexzzy, your premier destination for fast and reliable online shopping. We are excited to invite you to become a part of our growing seller community. By partnering with Flexzzy, you can expand your business reach, connect with a diverse customer base, and boost your sales.
        </p>
        <h3 class="mt-3">How to Get Started</h3>
        <p class="mb-3">
          1.  Register as a Seller: Sign up by providing your business details and agreeing to our terms and conditions.<br>
          2.  List Your Products: Upload high-quality images and detailed descriptions of the items you wish to sell.<br>
          3.  Start Selling: Once your products are live, customers can view and purchase them directly through our platform.<br>
          4.  Receive Payments: Enjoy timely payments with our secure and efficient payment processing system.
          </p>
          <h3 class="mt-3">Required Documents</h3>
          <p class="mb-3">
            To ensure a smooth registration process, please have the following documents ready:<br class="2">
            ● Trade License<br>
            ● Business Identification Number (BIN) Certificate<br>
            ● Tax Identification Number (TIN) Certificate<br>
            ● Bank Details on Company Letterhead (with signature)<br class="mb-2">

            For certain products, additional certifications such as BSTI or Importer's License may be required.
            </p>
            <h3 class="mt-3">Support and Contact Information</h3>
            <p class="mb-3">
              Our vendor support team is here to help you with any questions or concerns.<br>
              ● Email: vendorsupport@quikaro.com<br>
              ● Phone: +8801303278542<br>
              Join Flexzzy today and take your business to new heights by reaching customers nationwide.

            </p>
     </div>
   </div>
 </section>
<section class="why-sell-section">
  <h2>Why Sell on Flexzzy?</h2>
  <div class="features-container">
    <div class="feature-box">
      <img src="icons/reach.png" alt="Reach Icon">
      <h3>Extensive Customer Base</h3>
      <p>Gain access to a wide audience actively seeking quality products across various categories.</p>
    </div>
    <div class="feature-box">
      <img src="icons/free-registration.png" alt="Free Registration Icon">
      <h3>User-Friendly Platform</h3>
      <p>Our intuitive interface makes it easy to list your products, manage inventory, and process orders efficiently.</p>
    </div>
    <div class="feature-box">
      <img src="icons/reliable-shipping.png" alt="Reliable Shipping Icon">
      <h3>Secure Transactions</h3>
      <p>We prioritize the safety of our sellers and buyers by ensuring secure payment gateways and protecting your business interests.</p>
    </div>
    <div class="feature-box">
      <img src="icons/timely-payments.png" alt="Timely Payments Icon">
      <h3>Dedicated Support</h3>
      <p>Our vendor support team is available to assist you at every step, ensuring a seamless selling experience.</p>
    </div>
  </div>
</section>
<!-- =================== -->
<section class="join__sellers">
   <div class="features-container">
     <div class="data_join_seller">
        <h2>Join the Flexzzy Seller Program</h2>
        <p class="mb-3">
         Welcome to Flexzzy, the ultimate multi-vendor eCommerce platform where entrepreneurs like you can showcase products, connect with customers, and grow your business. Our seller-friendly marketplace offers all the tools and support you need to succeed in the competitive online space.
        </p>
        <h3 class="mt-3">Why Sell on Flexzzy?</h3>
        <p class="mb-3">
          1.  <b>Reach a Broader Audience</b>
          Tap into a large and diverse customer base actively searching for quality products.<br>
          2.  <b>Seamless Seller Tools</b>
          From product listing to order management, our intuitive dashboard simplifies your selling experience.<br>
          3.  <b>Low Commission Fees</b>
          Keep more of your earnings with our competitive and transparent fee structure.<br>
          4.  <b>Secure Transactions</b>
          Enjoy peace of mind with our secure payment gateway ensuring timely payouts.<br>
          5.  <b>Dedicated Support</b>
          Our expert team is available 24/7 to assist you in growing and optimizing your business.

        </p>
     </div>
   </div>
 </section>
<!-- =================== -->
<section class="steps-section">
  <h2>How It Works</h2>
  <div class="features-container">
    <div class="step">
      <img src="images/signup-icon.png" alt="Sign Up">
      <h3>Sign Up</h3>
      <p>Register your seller account on Flexzzy in just a few easy steps.</p>
    </div>

    <div class="step">
      <img src="images/profile-icon.png" alt="Profile Information">
      <h3>Set Up Your Store</h3>
      <p>Create a personalized storefront, upload your product listings, and start showcasing your offerings.</p>
    </div>

    <div class="step">
      <img src="images/address-icon.png" alt="Address Information">
      <h3>Start Selling</h3>
      <p>Receive orders, process them efficiently, and watch your sales grow with our streamlined system.</p>
    </div>

    <div class="step">
      <img src="images/id-bank-icon.png" alt="ID & Bank Information">
      <h3>Get Paid</h3>
      <p>Securely receive payments directly to your bank account on time, every time.</p>
    </div>

  </div>
</section>
<section class="join__sellers">
   <div class="features-container">
     <div class="data_join_seller">
        <h2>What You Can Sell on Flexzzy</h2>
        <p class="mb-3">
         From fashion and electronics to handmade crafts and more, Flexzzy allows you to list a wide range of products. With category-specific tools and features, you can optimize your product visibility and appeal to the right audience.
        </p>
        <h3 class="mt-3">Seller Benefits</h3>
        <p class="mb-3">
          ● Customizable Storefront: Build your brand with a unique and professional online store.<br>
          ● Marketing & Promotion: Leverage our platform’s promotional tools to attract more buyers.<br>
          ● Detailed Analytics: Gain insights into your sales, customer behavior, and performance metrics.<br>
          ● Logistics Support: Access partnerships with reliable shipping providers to ensure smooth deliveries.

        </p>
        <h3 class="mt-3">Join the Community of Successful Sellers</h3>
        <p class="mb-3">
         Flexzzy is more than a marketplace—it’s a thriving community of entrepreneurs and innovators. Whether you're just starting or an established business, we offer the resources and exposure you need to grow.
        </p>

        <h3 class="mt-3">Ready to Get Started?</h3>
        <p class="mb-3">
        Take the first step toward building a successful online business. Click the button below to register as a seller on Flexzzy today!
        </p>
        <h4 class="mt-3">Become a Seller Now</h4>
        <h4 class="mt-1">For inquiries or support, contact us at support@quikaro.com. We’re here to help you succeed!</h4>
       
     </div>
   </div>
 </section>
<section class="faq-section">
  <h2>Frequently Asked Questions</h2>
  <div class="faq-container">
    <div class="faq-item">
      <h3>How Can I Sell On Flexzzy?</h3>
      <p>To start selling on Flexzzy, visit the Flexzzy Seller Center and create a new account using your phone number. Complete the sign-up process by verifying your email, adding your pickup address, and uploading the required documents for verification. Once your store is approved, you can start listing your products!</p>
    </div>

    <div class="faq-item">
      <h3>What Categories Can I Sell on Flexzzy?</h3>
      <p>With multiple categories on Flexzzy—ranging from fashion, lifestyle, digital goods, FMCG, and lifestyle—you’ll find the perfect fit for your products. However, it’s essential to avoid listing counterfeits, dangerous, or prohibited items as per our cultural norms.</p>
    </div>

    <div class="faq-item">
      <h3>How Much Commission Does Flexzzy Charge?</h3>
      <p>Opening a shop on Flexzzy is free! However, a small commission is deducted from each order’s payment, with rates varying based on the product category. You can find more details about commissions in different categories here.</p>
    </div>

    <div class="faq-item">
      <h3>What is the Payment Policy of Flexzzy?</h3>
      <p>Seller payments are based on orders marked as “Delivered” to the customer in the Seller Center. Payments for delivered products are settled weekly. In case public holidays or weekends fall upon these dates, the payment date will be released on the upcoming business day.</p>
    </div>
  </div>
</section>

<!-- =================== -->
<section class="cta-section">
  <div class="cta-container">
    <h2>Ready to Start Selling on Flexzzy?</h2>
    <p>Join thousands of successful sellers today and take your business to new heights. Start selling and reach millions of customers!</p>
    <a href="https://www.Flexzzy.com.bd/seller-center" class="cta-button">Start Selling Now</a>
  </div>
</section>

<!-- =================== -->

<!-- Vendor js -->
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/js/vendor.min.js"></script>
<script src="<?php echo e(asset('public/frontEnd/')); ?>/js/parsley.min.js"></script>
<script src="<?php echo e(asset('public/frontEnd/')); ?>/js/form-validation.init.js"></script>
<!-- App js -->
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/js/app.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/js/toastr.min.js"></script>
<?php echo Toastr::message(); ?>

</body>
</html>
<?php /**PATH G:\xampp\htdocs\pikarihut1\resources\views/frontEnd/seller/forgot_password.blade.php ENDPATH**/ ?>