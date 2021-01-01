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
                                <h3 class="panel-title text-white" style="text-align: center">Today's Expense</h3>
                                <a href="{{ route('add.expense') }}"
                                    class="btn btn-sm btn-danger panel-title text-white">Add New</a>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Supplier Name</th>
                                                    <th>Details</th>
                                                    <th>Quantity</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($today as $row)
                                                    <tr>
                                                        <td>{{ $row->name }}</td>
                                                        <td>{{ $row->details }}</td>
                                                        <td>{{ $row->quantity }}</td>
                                                        <td>{{ $row->amount }}</td>

                                                        <td>
                                                            <a href="{{ URL::to('edit-today-expense/' . $row->id) }}"
                                                                class="btn btn-sm btn-info">Edit</a>
                                                            <a href="{{ URL::to('delete-today-expense/' . $row->id) }}"
                                                                class="btn btn-sm btn-danger" id="delete">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @php
                                        $date=date("d-m-y");
                                        $expense=DB::table('expenses')->where('date',$date)->sum('amount');
                                        @endphp
                                        <h4 style="color:darkslateblue; font-size: 22px; text-align: center;">Total Expense
                                            : {{ $expense }} BDT </h4>
                                    </div>
                                    <div class="hidden-print">
                                        <div class="pull-right">
                                            <a href="{{ URL::to('/today_expense_pdf') }}" class="btn btn-success">Create
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
