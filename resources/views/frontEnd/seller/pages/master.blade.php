<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />

        <title>@yield('title') - {{$generalsetting->name}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset($generalsetting->favicon)}}">

		<!-- Bootstrap css -->
		<link href="{{asset('public/backEnd/')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- App css -->
		<link href="{{asset('public/backEnd/')}}/assets/css/app.min.css" rel="stylesheet" type="text/css"/>
		<!-- icons -->
		<link href="{{asset('public/backEnd/')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- toastr css -->
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/assets/css/toastr.min.css">
        <!-- custom css -->
        <link href="{{asset('public/backEnd/')}}/assets/css/custom.css?v=1.0.1'" rel="stylesheet" type="text/css" />
		<!-- Head js -->
        @yield('css')
		<script src="{{asset('public/backEnd/')}}/assets/js/head.js"></script>
<style>
        
        /* Modal Overlay */
        .custom-modal {
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
        }

        /* Modal Main Box */
        .custom-modal .modal-content {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(20px);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.4);
            animation: fadeInUp 0.5s ease-in-out;
        }

        /* Modal Header */
        .custom-modal .modal-header {
            border-bottom: none;
            text-align: center;
            padding: 20px;
        }

        /* Modal Title */
        .custom-modal .modal-title {
            font-size: 24px;
            font-weight: 700;
            color: #fff;
            text-align: center;
        }

        /* Modal Body */
        .custom-modal .modal-body {
            text-align: center;
            font-size: 18px;
            color: rgba(255, 255, 255, 0.9);
            padding: 20px 30px;
        }

        /* Modal Footer */
        .custom-modal .modal-footer {
            border-top: none;
            justify-content: center;
            padding-bottom: 20px;
        }

        /* Create Store Button */
        .custom-modal .btn-create-store {
            background: linear-gradient(135deg, #ff7eb3, #ff758c);
            border: none;
            padding: 12px 25px;
            font-size: 18px;
            font-weight: 600;
            color: white;
            border-radius: 10px;
            transition: 0.3s ease-in-out;
            box-shadow: 0px 5px 15px rgba(255, 117, 140, 0.5);
        }

        .custom-modal .btn-create-store:hover {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            transform: scale(1.07);
            box-shadow: 0px 8px 20px rgba(255, 117, 140, 0.8);
        }

        /* Fade In Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Custom Close Button */
        .custom-modal .btn-close {
            filter: invert(1);
            opacity: 0.7;
        }

        .custom-modal .btn-close:hover {
            opacity: 1;
        }
    </style>
    </head>

    <!-- body start -->
    <body data-layout-mode="default" data-theme="light" data-layout-width="fluid" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>

        <!-- Begin page -->
        <div id="wrapper">
        @php
            $seller = Auth::guard('seller')->user();
            $data = 0;
            if ($seller) {
            $data = App\Models\SellerStore::where(['seller_id' => $seller->id, 'status' => 1])->count();
            }
            
        @endphp
            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-end mb-0">
    
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                                <i class="fe-maximize noti-icon"></i>
                            </a>
                        </li>
                            <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset(Auth::guard('seller')->user()->image)}}" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ms-1">
                                    {{Auth::guard('seller')->user()->name}} <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
    
                                <!-- item-->
                                <a href="{{route('seller.account')}}" >
                                    <i class="fe-user"></i>
                                    <span>Dashboard</span>
                                </a>
    
                                <!-- item-->
                                <a href="{{route('seller.change_pass')}}" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>Change Password</span>
                                </a>
    
                                <div class="dropdown-divider"></div>
    
                                <!-- item-->
                                <a  href="{{ route('seller.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                    <i class="fe-log-out me-1"></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('seller.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
    
                            </div>
                        </li>
                    </ul>
    
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="{{url('admin/dashboard')}}" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="{{asset($generalsetting->white_logo)}}" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset($generalsetting->dark_logo)}}" alt="" height="20">
                                <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                        </a>
    
                        <a href="{{route('seller.account')}}" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="{{asset($generalsetting->white_logo)}}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset($generalsetting->white_logo)}}" alt="" height="20">
                            </span>
                        </a>
                    </div>
    
                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile waves-effect waves-light">
                                <i class="fe-menu"></i>
                            </button>
                        </li>

                        <li>
                            <!-- Mobile menu toggle (Horizontal Layout)-->
                            <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>   
            
                        <li class="dropdown d-none d-xl-block">
                            @if($data > 0)
                            <a class="nav-link dropdown-toggle waves-effect waves-light" 
                               target="_blank" href="{{ route('seller.stores', Auth::guard('seller')->user()->slug) }}">
                               <i data-feather="globe"></i> Visit Shop 
                            </a>
                            @else
                            <a class="nav-link dropdown-toggle waves-effect waves-light" 
                                href="#">
                               <i data-feather="globe"></i> Visit Shop 
                            </a>
                            @endif
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!-- User box -->
                    <div class="user-box text-center">
                        <img src="{{asset(Auth::guard('seller')->user()->image)}}" alt="user-img" title="Mat Helme"
                            class="rounded-circle avatar-md">
                        <div class="dropdown">
                            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                                data-bs-toggle="dropdown">{{Auth::guard('seller')->user()->name}}</a>
                            <div class="dropdown-menu user-pro-dropdown">
                                <!-- item-->
                                <a href="{{route('seller.account')}}" class="dropdown-item notify-item">
                                    <i class="fe-user me-1"></i>
                                    <span>My Account</span>
                                </a>
                                <!-- item-->
                                <a  href="{{ route('seller.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                    <i class="fe-log-out me-1"></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('seller.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>

                            </div>
                        </div>
                        <p class="text-muted">Admin Head</p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul id="side-menu">
                            <li>
                                <a href="{{route('seller.account')}}" data-bs-toggle="collapse">
                                    <i data-feather="airplay"></i>
                                    <span> Dashboards </span>
                                </a>
                            </li>
                            <li class="menu-title mt-2">Sales</li>
                            <!-- nav items -->
                            <li>
                                <a href="#sidebar-orders" data-bs-toggle="collapse">
                                    <i data-feather="shopping-cart"></i>
                                    <span> Orders </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebar-orders">
                                    <ul class="nav-second-level">
                                        @foreach($orderstatus as $ordertype)
                                        <li>
                                            <a href="{{route('seller.orders',['slug'=>$ordertype->slug])}}"><i data-feather="file-plus"></i>{{$ordertype->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <!-- nav items -->
                            <li class="menu-title mt-2">Shop Setting</li>
                            <li>
                                <a href="#siebar-product" data-bs-toggle="collapse">
                                    <i data-feather="database"></i>
                                    <span> Product Manage </span>
                                    <span class="menu-arrow"></span>
                                </a>
                              

                                <div class="collapse" id="siebar-product">
                                    <ul class="nav-second-level">
                                        @if(! $data > 0)
                                          <li><a>Please create your store</a></li>
                                        @else
                                        <li>
                                            <a href="{{route('seller.products.index')}}">Products Manage</a>
                                        </li>
                                        <li>
                                            <a href="{{route('seller.products.create')}}">New Products</a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            <!-- reviews -->
                            <li>
                                <a href="#siebar-Review" data-bs-toggle="collapse">
                                    <i data-feather="database"></i>
                                    <span> Review Manage </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="siebar-Review">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('seller.reviews.index')}}">Manage</a>
                                        </li>
                                        <li>
                                            <a href="{{route('seller.reviews.create')}}">Add</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- quetion -->
                             <li>
                                <a href="#siebar-question" data-bs-toggle="collapse">
                                    <i data-feather="database"></i>
                                    <span> Question Manage </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="siebar-question">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('seller.question.index')}}">Manage</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- quetion -->
                          
                            <li class="menu-title mt-2">Setting</li>
                            <li>
                                <a href="#setting-product" data-bs-toggle="collapse">
                                    <i data-feather="edit"></i>
                                    <span> Profile Manage </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="setting-product">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('seller.profile')}}">My Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{route('seller.profile_edit')}}">Profile Update</a>
                                        </li>
                                        <li>
                                            <a href="{{route('seller.change_pass')}}">Change Password</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                             <li>
                                <a href="#setting-store" data-bs-toggle="collapse">
                                    <i data-feather="edit"></i>
                                    <span> Store Manage </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="setting-store">
                                    <ul class="nav-second-level">
                                       
                                        @if($data > 0)
                                        <li>
                                            <a target="_blank" href="{{ route('seller.stores', Auth::guard('seller')->user()->slug) }}">My Store</a>
                                        </li>
                                        @endif
                                        <li>
                                            <a href="{{ route('seller.store.index') }}">Store Manage</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('seller.banner.index') }}">Store banner Manage</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                            <!-- nav items end -->
                            <li class="menu-title mt-2">Withdraw</li>
                            <li>
                                <a href="#setting-withdraw" data-bs-toggle="collapse">
                                    <i data-feather="credit-card"></i>
                                    <span> Withdraws </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="setting-withdraw">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('seller.withdraws')}}">My Withdraw</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- nav items end -->
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <div class="content-page">
                <div class="content">

                    @yield('content');

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 text-end">
                                 &copy; {{$generalsetting->name}} <a href="https://developerekramul.xyz" target="_blank">Ekramul Haque</a> 
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

        </div>



        <!-- Vendor js -->
        <script src="{{asset('public/backEnd/')}}/assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="{{asset('public/backEnd/')}}/assets/js/app.min.js"></script>
        <script src="{{asset('public/backEnd/')}}/assets/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
        <script src="{{asset('public/backEnd/')}}/assets/js/sweetalert.min.js"></script>
        @if(! $data > 0)     
        <script>
            $(document).ready(function () {
                $('#storeModal').modal('show');
            });
        </script>
        @endif
        <script type="text/javascript">
             $('.delete-confirm').click(function(event) {
                  var form =  $(this).closest("form");
                  event.preventDefault();
                  swal({
                      title: `Are you sure you want to delete this record?`,
                      text: "If you delete this, it will be gone forever.",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      form.submit();
                    }
                  });
              });
             $('.change-confirm').click(function(event) {
                  var form =  $(this).closest("form");
                  event.preventDefault();
                  swal({
                      title: `Are you sure you want to change this record?`,
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      form.submit();
                    }
                  });
              });
        </script>
          
        @yield('script')

    </body>
</html>