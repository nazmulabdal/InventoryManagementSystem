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
                    <a href="{{ route('january.expense') }}" class="btn btn-info">January</a>
                    <a href="{{ route('february.expense') }}" class="btn btn-danger">February</a>
                    <a href="{{ route('march.expense') }}" class="btn btn-success">March</a>
                    <a href="{{ route('april.expense') }}" class="btn btn-primary">April</a>
                    <a href="{{ route('may.expense') }}" class="btn btn-warning">May</a>
                    <a href="{{ route('june.expense') }}" class="btn btn-info">June</a>
                    <a href="{{ route('july.expense') }}" class="btn btn-danger">July</a>
                    <a href="{{ route('august.expense') }}" class="btn btn-success">August</a>
                    <a href="{{ route('september.expense') }}" class="btn btn-primary">September</a>
                    <a href="{{ route('october.expense') }}" class="btn btn-warning">October</a>
                    <a href="{{ route('november.expense') }}" class="btn btn-info">November</a>
                    <a href="{{ route('december.expense') }}" class="btn btn-danger">December</a>
                </div>

                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title text-white " style="text-align: center">Monthly Expense </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Details</th>
                                                    <th>Date</th>
                                                    <th>Quantity</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($expense as $row)
                                                    <tr>
                                                        <td>{{ $row->details }}</td>
                                                        <td>{{ $row->date }}</td>
                                                        <td>{{ $row->quantity }}</td>
                                                        <td>{{ $row->amount }}</td>
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
