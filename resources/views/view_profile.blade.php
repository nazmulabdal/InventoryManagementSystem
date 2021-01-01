@extends('layouts.app')
@section('content')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome !</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Inventory Manager</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>

                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-2"></div>
                    <!-- Basic example -->
                    <div class="col-md-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title text-white">My Profile</h3>
                            </div>
                            <div class="panel-body">
                                @php
                                $user=Auth::user()->id;
                                $employee=DB::table('users')->where('id',$user)->first();
                                @endphp
                                @php
                                $admin=DB::table('users')->where('role','admin')->first();
                                @endphp

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Photo</label><br>
                                    <img style="height: 150px; width: 150px;" src="{{ URL::to($employee->photo) }}" />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name </label>
                                    <p>{{ $employee->name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <p>{{ $employee->email }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Role</label>
                                    <p>{{ $employee->role }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Shop Name</label>
                                    <p>{{ $admin->shopname }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phone</label>
                                    <p>{{ $employee->phone }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address</label>
                                    <p>{{ $employee->address }}</p>
                                </div>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->



                </div>

            </div> <!-- container -->

        </div> <!-- content -->
    </div>
@endsection
