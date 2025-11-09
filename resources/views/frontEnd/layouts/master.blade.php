<!DOCTYPE html>
<html lang="en">

<head>
  <script type="text/javascript">
    (function (c, l, a, r, i, t, y) {
      c[a] = c[a] || function () { (c[a].q = c[a].q || []).push(arguments) };
      t = l.createElement(r); t.async = 1; t.src = "https://www.clarity.ms/tag/" + i;
      y = l.getElementsByTagName(r)[0]; y.parentNode.insertBefore(t, y);
    })(window, document, "clarity", "script", "svktcwluwo");
  </script>
  <link rel="shortcut icon" href="{{asset($generalsetting->favicon)}}" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>@yield('title') - {{$generalsetting->name}}</title>
  <!-- App favicon -->

  @stack('seo')
  @stack('css')
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/animate.css')}}" />
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/all.min.css')}}" />
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/owl.carousel.min.css')}}" />
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/owl.theme.default.min.css')}}" />
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/mobile-menu.css')}}" />
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/select2.min.css')}}" />
  <!-- toastr css -->
  <link rel="stylesheet" href="{{asset('public/backEnd/')}}/assets/css/toastr.min.css" />

  <link rel="stylesheet" href="{{asset('public/frontEnd/css/wsit-menu.css')}}" />
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/style.css?v=1.0.5')}}" />
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/responsive.css?v=1.0.5')}}" />
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/main.css')}}" />
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/fonts.css')}}" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <meta name="facebook-domain-verification" content="38f1w8335btoklo88dyfl63ba3st2e" />



  <!-- End Google Tag Manager -->
</head>

<body>

  <div class="preloader">
    <div class="preloader-inner">
      <div class="preloader-top">
        <div class="preloader-top-sun">
          <div class="preloader-top-sun-bg"></div>
          <div class="preloader-top-sun-line preloader-top-sun-line-0"></div>
          <div class="preloader-top-sun-line preloader-top-sun-line-45"></div>
          <div class="preloader-top-sun-line preloader-top-sun-line-90"></div>
          <div class="preloader-top-sun-line preloader-top-sun-line-135"></div>
          <div class="preloader-top-sun-line preloader-top-sun-line-180"></div>
          <div class="preloader-top-sun-line preloader-top-sun-line-225"></div>
          <div class="preloader-top-sun-line preloader-top-sun-line-270"></div>
          <div class="preloader-top-sun-line preloader-top-sun-line-315"></div>
        </div>
      </div>
      <div class="preloader-bottom">
        <div class="preloader-bottom-line preloader-bottom-line-lg"></div>
        <div class="preloader-bottom-line preloader-bottom-line-md"></div>
        <div class="preloader-bottom-line preloader-bottom-line-sm"></div>
        <div class="preloader-bottom-line preloader-bottom-line-xs"></div>
      </div>
    </div>
  </div>

  <div class="page">


    <header class="navbar logo-area">
      <div class="container">
        <div class="logo">
          <img src="{{ asset($generalsetting->dark_logo) }}" alt="">
        </div>
        <nav class="nav-links">
          <a href="{{route( 'home')}}">Home</a>
          <a href="{{route('hotdeals')}}">Our Courses</a>
          <a href="{{route('about')}}">About</a>
         
          <a href="{{route('blog')}}" >Blog</a>
        </nav>
        <div class="menu-toggle" id="menu-toggle">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </header>
   


    <div id="content">
      @yield('content')
    </div>
    <!-- content end -->
    <footer class="section footer-classic footer-classic-md">
      <div class="footer-classic-main">
        <div class="container">
          <div class="footer-classic-layout justify-content-sm-around justify-content-md-between divider-4">
            <div class="footer-classic-layout-item"><a class="brand" href="index.html"><img class="brand-logo-dark"
                  src="{{ asset($generalsetting->dark_logo) }}" alt="" width="110" height="39" /><img class="brand-logo-light"
                  src="{{ asset($generalsetting->dark_logo) }}" alt="" width="110" height="39" /></a>
              <div class="footer-classic-item-block footer-classic-item-block-1">
                <h6>10000+ Satisfied Students</h6>
                <div class="owl-carousel-quote-light">
                  <!-- Owl Carousel-->
                  <div class="owl-carousel" data-items="1" data-dots="false" data-nav="false" data-stage-padding="0"
                    data-loop="true" data-margin="30" data-nav-custom="#footer-owl-nav" data-animation-in="fadeIn"
                    data-animation-out="fadeOut" data-mouse-drag="false">
                    <blockquote class="quote-light quote-light-sm">
                      <div class="icon linearicons-quote-open text-primary icon-md"></div>
                      <div class="quote-light-main">
                        <div class="quote-light-text">
                          <q>The staff here is really supportive, teachers are great, the school has a good structure.
                            Thank you!</q>
                        </div>
                        <cite class="quote-light-cite">Jane Smith</cite>
                      </div>
                    </blockquote>
                    <blockquote class="quote-light quote-light-sm">
                      <div class="icon linearicons-quote-open text-primary icon-md"></div>
                      <div class="quote-light-main">
                        <div class="quote-light-text">
                          <q>I am really enjoying my experience here. Teachers are very friendly and there is a friendly
                            atmosphere.</q>
                        </div>
                        <cite class="quote-light-cite">Peter McMillan</cite>
                      </div>
                    </blockquote>
                    <blockquote class="quote-light quote-light-sm">
                      <div class="icon linearicons-quote-open text-primary icon-md"></div>
                      <div class="quote-light-main">
                        <div class="quote-light-text">
                          <q>I like that it has a busy atmosphere but it’s never stressful. Everyone is very nice and
                            you can ask anything at any time.</q>
                        </div>
                        <cite class="quote-light-cite">Kate Wilson</cite>
                      </div>
                    </blockquote>
                  </div>
                  <div class="owl-nav" id="footer-owl-nav">
                    <button class="owl-arrow owl-arrow-prev" aria-label="Prev">
                      <svg width="20" height="16" viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M6.7,15.1c0.4,0.4,1,0.4,1.4,0c0.4-0.4,0.4-1,0-1.4L2.4,8l5.7-5.7c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0L0.3,7.3										c-0.4,0.4-0.4,1,0,1.4L6.7,15.1z M20,7H1v2h19V7z">
                        </path>
                      </svg>
                    </button>
                    <div class="owl-nav-divider"></div>
                    <button class="owl-arrow owl-arrow-next" aria-label="Next">
                      <svg width="20" height="16" viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M19.7071 8.70711C20.0976 8.31658 20.0976 7.68342 19.7071 7.29289L13.3431 0.928932C12.9526 0.538408 12.3195 0.538408 11.9289 0.928932C11.5384 1.31946 11.5384 1.95262 11.9289 2.34315L17.5858 8L11.9289 13.6569C11.5384 14.0474 11.5384 14.6805 11.9289 15.0711C12.3195 15.4616 12.9526 15.4616 13.3431 15.0711L19.7071 8.70711ZM0 9H19V7L0 7L0 9Z">
                        </path>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="footer-classic-layout-item">
              <h6 class="footer-classic-title inset-3">Popular Courses</h6>
              <div class="footer-classic-item-block footer-classic-item-block-3">
                <ul class="list-pricing">
                  <li><a href="{{route('hotdeals')}}"><span class="list-pricing-title">English for
                        Kids</span><span>$45</span></a></li>
                  <li><a href="english-for-business.html"><span class="list-pricing-title">Online
                        Learning</span><span>$15</span></a></li>
                  <li><a href="english-for-business.html"><span class="list-pricing-title">German
                        Club</span><span>$36</span></a></li>
                  <li><a href="english-for-business.html"><span class="list-pricing-title">Personal
                        Lessons</span><span>$21</span></a></li>
                  <li><a href="english-for-business.html"><span class="list-pricing-title">Group
                        Lessons</span><span>$35</span></a></li>
                </ul>
              </div>
            </div>
            <div class="footer-classic-layout-item">
              <h6 class="footer-classic-title inset-3">Get in Touch</h6>
              <div class="footer-classic-item-block">
                <ul class="list list-1">
                  <li><a href="#">Send a Message</a></li>
                  <li><a href="contact-us.html">Contacts</a></li>
                  <li><a href="#">Request a Callback</a></li>
                </ul>
                <ul class="list-inline list-inline-md">
                  <li><a class="link-2 icon mdi mdi-instagram" href="#"></a></li>
                  <li><a class="link-2 icon mdi mdi-facebook" href="#"></a></li>
                  <li><a class="link-2 icon mdi mdi-youtube-play" href="#"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container mt-0">
        <div class="divider-2"></div>
      </div>
      <div class="footer-classic-aside">
        <div class="container">
          <p class="rights"><span>&copy;&nbsp; </span><span
              class="copyright-year"></span><span>&nbsp;</span><span>ispeak</span><span>. All rights
              reserved.&nbsp;</span><a href="privacy-policy.html">Privacy Policy</a><span>.</span><span>
              Design&nbsp;by&nbsp; M.E soft it</span></p>
        </div>
      </div>
    </footer>
  </div>
  <div class="snackbars" id="form-output-global"></div>



  <div id="custom-modal"></div>
  <div id="page-overlay"></div>
  <div id="loading">
    <div class="custom-loader"></div>
  </div>

  <script src="{{asset('public/frontEnd/js/jquery-3.6.3.min.js')}}"></script>
  <script src="{{asset('public/frontEnd/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('public/frontEnd/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('public/frontEnd/js/mobile-menu.js')}}"></script>
  <script src="{{asset('public/frontEnd/js/wsit-menu.js')}}"></script>
  <script src="{{asset('public/frontEnd/js/mobile-menu-init.js')}}"></script>
  <script src="{{asset('public/frontEnd/js/wow.min.js')}}"></script>
  <script src="{{ asset('public/frontEnd/js/script.js')}}"></script>
  <script src="{{ asset('public/frontEnd/js/core.min.js')}}"></script>
  <script>
    new WOW().init();
  </script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <!-- feather icon -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
  <script>
    const toggle = document.getElementById('menu-toggle');
    const nav = document.querySelector('.nav-links');

    toggle.addEventListener('click', () => {
      nav.classList.toggle('active');
      toggle.classList.toggle('open');
    });
  </script>
  <script>
    feather.replace();
  </script>


  <script>
        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 100) {
                $('.logo-area').addClass('fixed-top');
                $('.mobile-menu').addClass('fixed-top');
                $('.mobile-header').addClass('fixed-top');
            } else {
                $('.logo-area').removeClass('fixed-top');
                $('.mobile-menu').removeClass('fixed-top');
                $('.mobile-header').removeClass('fixed-top');
            }
        });
    </script>



  <!--End of Tawk.to Script-->
  <script src="{{asset('public/backEnd/')}}/assets/js/toastr.min.js"></script>
  {!! Toastr::message() !!} @stack('script')
  <script>
    $(".quick_view").on("click", function () {
      var id = $(this).data("id");
      $("#loading").show();
      if (id) {
        $.ajax({
          type: "GET",
          data: { id: id },
          url: "{{route('quickview')}}",
          success: function (data) {
            if (data) {
              $("#custom-modal").html(data);
              $("#custom-modal").show();
              $("#loading").hide();
              $("#page-overlay").show();
            }
          },
        });
      }
    });
  </script>
  <!-- quick view end -->
  <!-- cart js start -->
  <script>
    $(".addcartbutton").on("click", function () {
      var id = $(this).data("id");
      var checkout = $(this).data("checkout");
      var qty = 1;
      if (id) {
        $.ajax({
          cache: "false",
          type: "GET",
          url: "{{url('add-to-cart')}}/" + id + "/" + qty,
          dataType: "json",
          success: function (data) {
            if (data) {
              toastr.success('Success', 'Product add to cart successfully');
              return cart_count() + mobile_cart();
            }
          },
        });
      }
      if (checkout) {
        window.location.href = '{{route('customer.checkout')}}';
      }
    });
    $(".cart_store").on("click", function () {
      var id = $(this).data("id");
      var qty = $(this).parent().find("input").val();
      if (id) {
        $.ajax({
          type: "GET",
          data: { id: id, qty: qty ? qty : 1 },
          url: "{{route('cart.store')}}",
          success: function (data) {
            if (data) {
              toastr.success('Success', 'Product add to cart succfully');
              return cart_count() + mobile_cart();
            }
          },
        });
      }
    });

    $(".cart_remove").on("click", function () {
      var id = $(this).data("id");
      if (id) {
        $.ajax({
          type: "GET",
          data: { id: id },
          url: "{{route('cart.remove')}}",
          success: function (data) {
            if (data) {
              $(".cartlist").html(data);
              return cart_count() + mobile_cart() + cart_summary();
            }
          },
        });
      }
    });

    $(".cart_increment").on("click", function () {
      var id = $(this).data("id");
      if (id) {
        $.ajax({
          type: "GET",
          data: { id: id },
          url: "{{route('cart.increment')}}",
          success: function (data) {
            if (data) {
              $(".cartlist").html(data);
              return cart_count() + mobile_cart();
            }
          },
        });
      }
    });

    $(".cart_decrement").on("click", function () {
      var id = $(this).data("id");
      if (id) {
        $.ajax({
          type: "GET",
          data: { id: id },
          url: "{{route('cart.decrement')}}",
          success: function (data) {
            if (data) {
              $(".cartlist").html(data);
              return cart_count() + mobile_cart();
            }
          },
        });
      }
    });

    function cart_count() {
      $.ajax({
        type: "GET",
        url: "{{route('cart.count')}}",
        success: function (data) {
          if (data) {
            $("#cart-qty").html(data);
          } else {
            $("#cart-qty").empty();
          }
        },
      });
    }
    function mobile_cart() {
      $.ajax({
        type: "GET",
        url: "{{route('mobile.cart.count')}}",
        success: function (data) {
          if (data) {
            $(".mobilecart-qty").html(data);
          } else {
            $(".mobilecart-qty").empty();
          }
        },
      });
    }
    function cart_summary() {
      $.ajax({
        type: "GET",
        url: "{{route('shipping.charge')}}",
        dataType: "html",
        success: function (response) {
          $(".cart-summary").html(response);
        },
      });
    }
  </script>
  <!-- cart js end -->
  <script>
    $(".search_click").on("keyup change", function () {
      var keyword = $(".search_keyword").val();
      $.ajax({
        type: "GET",
        data: { keyword: keyword },
        url: "{{route('livesearch')}}",
        success: function (products) {
          if (products) {
            $(".search_result").html(products);
          } else {
            $(".search_result").empty();
          }
        },
      });
    });
    $(".msearch_click").on("keyup change", function () {
      var keyword = $(".msearch_keyword").val();
      $.ajax({
        type: "GET",
        data: { keyword: keyword },
        url: "{{route('livesearch')}}",
        success: function (products) {
          if (products) {
            $("#loading").hide();
            $(".search_result").html(products);
          } else {
            $(".search_result").empty();
          }
        },
      });
    });
  </script>
  <!-- search js start -->
  <script></script>
  <script></script>
  <script>
    $(".district").on("change", function () {
      var id = $(this).val();
      $.ajax({
        type: "GET",
        data: { id: id },
        url: "{{route('districts')}}",
        success: function (res) {
          if (res) {
            $(".area").empty();
            $(".area").append('<option value="">Select..</option>');
            $.each(res, function (key, value) {
              $(".area").append('<option value="' + key + '" >' + value + "</option>");
            });
          } else {
            $(".area").empty();
          }
        },
      });
    });
  </script>
  <script>
    $(".toggle").on("click", function () {
      $("#page-overlay").show();
      $(".mobile-menu").addClass("active");
    });

    $("#page-overlay").on("click", function () {
      $("#page-overlay").hide();
      $(".mobile-menu").removeClass("active");
      $(".feature-products").removeClass("active");
    });

    $(".mobile-menu-close").on("click", function () {
      $("#page-overlay").hide();
      $(".mobile-menu").removeClass("active");
    });

    $(".mobile-filter-toggle").on("click", function () {
      $("#page-overlay").show();
      $(".feature-products").addClass("active");
    });
  </script>
  <script>
    $(document).ready(function () {
      $(".parent-category").each(function () {
        const menuCatToggle = $(this).find(".menu-category-toggle");
        const secondNav = $(this).find(".second-nav");

        menuCatToggle.on("click", function () {
          menuCatToggle.toggleClass("active");
          secondNav.slideToggle("fast");
          $(this).closest(".parent-category").toggleClass("active");
        });
      });
      $(".parent-subcategory").each(function () {
        const menuSubcatToggle = $(this).find(".menu-subcategory-toggle");
        const thirdNav = $(this).find(".third-nav");

        menuSubcatToggle.on("click", function () {
          menuSubcatToggle.toggleClass("active");
          thirdNav.slideToggle("fast");
          $(this).closest(".parent-subcategory").toggleClass("active");
        });
      });
    });
  </script>

  <script>
    var menu = new MmenuLight(document.querySelector("#menu"), "all");

    var navigator = menu.navigation({
      selectedClass: "Selected",
      slidingSubmenus: true,
      // theme: 'dark',
      title: "ক্যাটাগরি",
    });

    var drawer = menu.offcanvas({
      // position: 'left'
    });

    //  Open the menu.
    document.querySelector('a[href="#menu"]').addEventListener("click", (evnt) => {
      evnt.preventDefault();
      drawer.open();
    });
  </script>

  <script>
    // document.addEventListener("DOMContentLoaded", function () {
    //     window.addEventListener("scroll", function () {
    //         if (window.scrollY > 200) {
    //             document.getElementById("navbar_top").classList.add("fixed-top");
    //         } else {
    //             document.getElementById("navbar_top").classList.remove("fixed-top");
    //             document.body.style.paddingTop = "0";
    //         }
    //     });
    // });
    /*=== Main Menu Fixed === */
    // document.addEventListener("DOMContentLoaded", function () {
    //     window.addEventListener("scroll", function () {
    //         if (window.scrollY > 0) {
    //             document.getElementById("m_navbar_top").classList.add("fixed-top");
    //             // add padding top to show content behind navbar
    //             navbar_height = document.querySelector(".navbar").offsetHeight;
    //             document.body.style.paddingTop = navbar_height + "px";
    //         } else {
    //             document.getElementById("m_navbar_top").classList.remove("fixed-top");
    //             // remove padding top from body
    //             document.body.style.paddingTop = "0";
    //         }
    //     });
    // });
    /*=== Main Menu Fixed === */

    $(window).scroll(function () {
      if ($(this).scrollTop() > 50) {
        $(".scrolltop:hidden").stop(true, true).fadeIn();
      } else {
        $(".scrolltop").stop(true, true).fadeOut();
      }
    });
    $(function () {
      $(".scroll").click(function () {
        $("html,body").animate({ scrollTop: $(".gotop").offset().top }, "1000");
        return false;
      });
    });
  </script>
  <script>
    $(".filter_btn").click(function () {
      $(".filter_sidebar").addClass('active');
      $("body").css("overflow-y", "hidden");
    })
    $(".filter_close").click(function () {
      $(".filter_sidebar").removeClass('active');
      $("body").css("overflow-y", "auto");
    })
  </script>

  <!-- End Google Tag Manager (noscript) -->
</body>

</html>