@extends('frontEnd.seller.pages.master')
@section('title','Profile')
@section('content')
<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{route('seller.profile_edit')}}" class="btn btn-primary rounded-pill">Update</a>
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
                            <td>{{$seller->name}}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{$seller->phone}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$seller->email}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$seller->address}}</td>
                        </tr>
                        <tr>
                            <td>Disctrict</td>
                            <td>{{$seller->district}}</td>
                        </tr>
                        <tr>
                            <td>Area</td>
                            <td>{{$seller->cust_area?$seller->cust_area->area_name:''}}</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><img src="{{asset($seller->image)}}" alt="" height="80" class="circle-5"></td>
                        </tr>
                    </tbody>
                </table>
 
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
   </div>
</div>
@endsection
