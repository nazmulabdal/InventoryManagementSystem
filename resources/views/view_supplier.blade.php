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
                                <h3 class="panel-title text-white">Supplier Information
                                    <a href="{{ route('all.supplier') }}"
                                        class="btn btn-sm btn-danger panel-title text-white pull-right">All Suppliers</a>
                                </h3>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name </label>
                                    <p>{{ $supplier->name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <p>{{ $supplier->email }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phone</label>
                                    <p>{{ $supplier->phone }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address</label>
                                    <p>{{ $supplier->address }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Supplier Type</label>
                                    <p>{{ $supplier->type }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Shop Name</label>
                                    <p>{{ $supplier->shop }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Account Holder</label>
                                    <p>{{ $supplier->accountholder }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Account Number</label>
                                    <p>{{ $supplier->accountnumber }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Bank Name</label>
                                    <p>{{ $supplier->bankname }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Bank Branch Name</label>
                                    <p>{{ $supplier->branchname }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">City</label>
                                    <p>{{ $supplier->city }}</p>
                                </div>
                                <div class="form-group">
                                    <img style="height: 80px; width: 80px;" src="{{ URL::to($supplier->photo) }}" />
                                    <label for="exampleInputPassword1">Photo</label>
                                </div>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->

                </div>

            </div> <!-- container -->

        </div> <!-- content -->
    </div>
@endsection
