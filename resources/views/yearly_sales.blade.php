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
                    <div class="col-md-12">

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title text-white" style="text-align: center"> Sales of {{ date('Y') }}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Customer Name</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>{{ $order->order_date }}</td>
                                                        <td>{{ $order->product_name }}</td>
                                                        <td>{{ $order->quantity }}</td>
                                                        <td>{{ number_format($order->total, 2) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @php
                                        $year=date("Y");
                                        $total=DB::table('orderdetails')->where('year',$year)->sum('total');
                                        @endphp
                                        <h4 style="color:darkslateblue; font-size: 22px; text-align: center;">Total Sale :
                                            {{ $total }} BDT </h4>
                                    </div>
                                    <div class="hidden-print">
                                        <div class="pull-right">
                                            <a href="{{ URL::to('/yearly_sales_pdf') }}" class="btn btn-success">Create
                                                PDF</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
@endsection
