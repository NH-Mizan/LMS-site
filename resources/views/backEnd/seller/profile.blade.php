@extends('backEnd.layouts.master')
@section('title','Seller Profile')
@section('css')
<link href="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{route('sellers.index',['status'=>'active'])}}" class="btn btn-primary rounded-pill">Seller List</a>
                    <form method="post" action="{{route('sellers.adminlog')}}" class="d-inline" target="_blank">
                        @csrf
                    <input type="hidden" value="{{$profile->id}}" name="hidden_id">        
                    <button type="button" class="btn btn-info rounded-pill change-confirm" title="Login as customer"><i class="fe-log-in"></i> Login</button></form>
                </div>
                <h4 class="page-title">Seller Profile</h4>
            </div>
        </div>
    </div>  
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{asset($profile->image)}}" class="rounded-circle avatar-lg img-thumbnail"
                    alt="seller-image">

                    <h4 class="mb-0">{{$profile->name}}</h4>
                    <p class="text-muted">Balance - {{$profile->balance}}</p>

                    <a href="tel:{{$profile->phone}}" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Call</a>
                    <a href="mailto:{{$profile->email}}" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Email</a>

                    <div class="text-start mt-3">
                        <h4 class="font-13 text-uppercase">About Me :</h4>
                        <table class="table">
                            <tbody>
                            <tr class="text-muted mb-2 font-13">
                                <td>Full Name </td>
                                <td class="ms-2">{{$profile->name}}</td>
                            </tr>

                            <tr class="text-muted mb-2 font-13">
                                <td>Mobile </td>
                                <td class="ms-2">{{$profile->phone}}</td>
                            </tr>

                            <tr class="text-muted mb-2 font-13">
                                <td>Email </td> 
                                <td class="ms-2">{{$profile->email}}</td>
                            </tr>

                            <tr class="text-muted mb-1 font-13">
                                <td>Address </td> 
                                <td class="ms-2">{{$profile->address}}</td>
                            </tr>
                            <tr class="text-muted mb-1 font-13">
                                <td>District </td> 
                                <td class="ms-2">{{$profile->district}}</td>
                            </tr>
                            <tr class="text-muted mb-1 font-13">
                                <td>Upzlila </td> 
                                <td class="ms-2">{{$profile->area}}</td>
                            </tr>

                            <tr class="text-muted mb-1 font-13">
                                <td>Balance </td> 
                                <td class="ms-2">{{$profile->balance}} Tk</td>
                            </tr>
                            
                            <tr class="text-muted mb-1 font-13">
                                <td>Withdraw :</td> 
                                <td class="ms-2">{{$profile->withdraw}} Tk</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end card -->

        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-fill navtab-bg">
                        <li class="nav-item">
                            <a href="#order" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                               Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#withdraw" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                               Withdraw
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="order">
                            <h4>Orders</h4>
                            <table class="table table-striped dt-responsive nowrap w-100 datatable2">
                                <thead>
                                    <tr>
                                       <th>SL</th>
                                        <th>Invoice</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($profile->orders as $key=>$value)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value->order?$value->order->invoice_id:''}}</td>
                                        <td>{{$value->product_name}}</td>
                                        <td>{{$value->sale_price}} Tk</td>
                                        <td>{{$value->qty}}</td>
                                        <td><img src="{{asset($value->image?$value->image->image:'')}}" class="backend-image" alt=""></td>
                                        <td>@if($value->order?$value->order->order_status=='pending':'')<span class="badge bg-soft-danger text-danger">{{$value->order?$value->order->order_status:''}}</span> @else <span class="badge bg-soft-success text-success">{{$value->order?$value->order->order_status:''}}</span> @endif</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- end  item-->
                        <div class="tab-pane" id="withdraw">
                            <h4>Withdraw List</h4>
                            <table class="table table-striped dt-responsive nowrap w-100 datatable2">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($profile->withdraws as $key=>$value)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value->created_at->format('d-m-Y H:m a')}}</td>
                                        <td>{{$value->amount}}</td>
                                        <td>@if($value->status=='pending')<span class="badge bg-soft-danger text-danger">{{$value->status}}</span> @else <span class="badge bg-soft-success text-success">{{$value->status}}</span> @endif</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- end  item-->
                    </div> <!-- end tab-content -->
                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end row-->

</div> <!-- container -->

</div> <!-- content -->
@endsection


@section('script')
<!-- third party js -->
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/js/pages/datatables.init.js"></script>
<!-- third party js ends -->
@endsection