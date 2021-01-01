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
                                <h3 class="panel-title text-white">Contact Information
                                    <a href="{{ URL::to('/all-contact') }}"
                                        class="btn btn-sm btn-danger panel-title text-white pull-right">All Contacts</a>
                                </h3>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer Name </label>
                                    <p>{{ $view_contact->customer_name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <p>{{ $view_contact->customer_email }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Message</label>
                                    <p>{{ $view_contact->customer_message }}</p>
                                </div>

                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->

                </div>

            </div> <!-- container -->

        </div> <!-- content -->
    </div>
@endsection
