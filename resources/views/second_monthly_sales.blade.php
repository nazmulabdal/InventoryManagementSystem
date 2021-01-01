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

                <div>
                    <a href="{{ route('january.sales') }}" class="btn btn-info">January</a>
                    <a href="{{ route('february.sales') }}" class="btn btn-danger">February</a>
                    <a href="{{ route('march.sales') }}" class="btn btn-success">March</a>
                    <a href="{{ route('april.sales') }}" class="btn btn-primary">April</a>
                    <a href="{{ route('may.sales') }}" class="btn btn-warning">May</a>
                    <a href="{{ route('june.sales') }}" class="btn btn-info">June</a>
                    <a href="{{ route('july.sales') }}" class="btn btn-danger">July</a>
                    <a href="{{ route('august.sales') }}" class="btn btn-success">August</a>
                    <a href="{{ route('september.sales') }}" class="btn btn-primary">September</a>
                    <a href="{{ route('october.sales') }}" class="btn btn-warning">October</a>
                    <a href="{{ route('november.sales') }}" class="btn btn-info">November</a>
                    <a href="{{ route('december.sales') }}" class="btn btn-danger">December</a>
                </div>

                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title text-white " style="text-align: center">Monthly Sales </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Customer Name</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>{{ $order->product_name }}</td>
                                                        <td>{{ $order->customer_name }}</td>
                                                        <td>{{ $order->quantity }}</td>
                                                        <td>{{ number_format($order->total, 2) }}</td>
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
