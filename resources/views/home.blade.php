@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                @php
                $categories=DB::table('categories')->count();
                $products=DB::table('products')->count();
                $suppliers=DB::table('suppliers')->count();
                $customers=DB::table('customers')->count();
                $orders=DB::table('orders')->count();
                $successful_orders=DB::table('orders')->where('order_status','success')->count();
                $employees=DB::table('users')->where('role','manager')->orWhere('role','cashier')->count();
                $vats=DB::table('vats')->first();
                @endphp

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
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{ $categories }}</span>
                                Total Categories
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-purple"><i class="ion-ios7-cart"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{ $products }}</span>
                                Total Products
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-success"><i class="ion-eye"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{ $orders }}</span>
                                Total Orders
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{ $successful_orders }}</span>
                                Successful Orders
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row-->


                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{ $customers }}</span>
                                Total Customers
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-purple"><i class="ion-ios7-cart"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{ $suppliers }}</span>
                                Total Suppliers
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-success"><i class="ion-eye"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{ $employees }}</span>
                                Total Employees
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                @if ($vats != null)
                                    <span class="counter">{{ $vats->vat_percentage }}</span>
                                    Current Vat ( % )
                                @else
                                    <span class="counter">5.00</span>
                                    Current Vat ( % )
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row-->

            </div> <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection
