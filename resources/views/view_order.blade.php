@extends('layouts.app')
@section('content')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        {{--<h4 class="pull-left page-title">Invoice</h4>
                        --}}
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Inventory Manager</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">Invoice</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="clearfix">
                                    <div style="text-align: center">
                                        <h4>Order Date : <strong>{{ $order->order_date }}</strong>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-left m-t-30">
                                            <address>
                                                <strong>Customer Name : {{ $order->name }} </strong><br>
                                                <strong> Shop Name : {{ $order->shopname }}</strong> <br>
                                                Address : {{ $order->address }} <br>
                                                City : {{ $order->city }} <br>
                                                Phone : {{ $order->phone }}
                                            </address>
                                        </div>
                                        <div class="pull-right m-t-30">
                                            <p class="m-t-10"><strong>Order Status: </strong> <span
                                                    class="label label-danger">Pending</span></p>
                                            <p class="m-t-10"><strong>Order ID: </strong>{{ $ord->id }}</p>
                                            <p class="m-t-10"><strong>Invoice Creator :
                                                </strong>{{ $order->invoice_creator }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-h-50"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table m-t-30">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Cost</th>
                                                        <th>Total Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $sl=1
                                                    @endphp
                                                    @foreach ($order_details as $od)
                                                        <tr>
                                                            <td>{{ $sl++ }}</td>
                                                            <td>{{ $od->product_name }}</td>
                                                            <td>{{ $od->quantity }}</td>
                                                            <td>{{ $od->unitcost }}</td>
                                                            <td>{{ $od->unitcost * $od->quantity }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="border-radius: 0px;"><br>
                                    <div class="col-md-9">


                                    </div>
                                    <div class="col-md-3">
                                        <p class="text-right"><b>Sub-total : {{ $order->sub_total }}</b></p>
                                        <p class="text-right">VAT : {{ $order->vat }}</p>
                                        <hr>
                                        <h4 class="text-right">Total : {{ $order->total }}</h4>
                                        <h4 class="text-right">Method : {{ $order->payment_status }}</h4>
                                        <h4 class="text-right">Paid : {{ $order->pay }}</h3>
                                            <h4 class="text-right">Due : {{ $order->due }}</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="hidden-print">
                                    <div class="pull-right">
                                        <a href="{{ URL::to('/confirm-order/' . $ord->id) }}"
                                            class="btn btn-lg btn-success waves-effect waves-light">Confirm Order</a>
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
