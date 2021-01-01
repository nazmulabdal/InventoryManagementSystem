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
                                <h3 class="panel-title text-white" style="text-align: center">All Pending Orders</h3>
                                <a href="{{ route('successful.orders') }}"
                                    class="btn btn-sm btn-danger panel-title text-white">Go to Successful Orders</a>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Date</th>
                                                    <th>Quantity</th>
                                                    <th>Total Amount</th>
                                                    <th>Payment Method</th>
                                                    <th>Invoice Creator</th>
                                                    <th>Order Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($pending as $row)
                                                    <tr>
                                                        <td>{{ $row->name }}</td>
                                                        <td>{{ $row->order_date }}</td>
                                                        <td>{{ $row->total_products }}</td>
                                                        <td>{{ $row->total }}</td>
                                                        <td>{{ $row->payment_status }}</td>
                                                        <td>{{ $row->invoice_creator }}</td>
                                                        <td><span class="badge badge-danger">{{ $row->order_status }}</span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ URL::to('view-order-status/' . $row->id) }}"
                                                                class="btn btn-sm btn-success">View</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

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
