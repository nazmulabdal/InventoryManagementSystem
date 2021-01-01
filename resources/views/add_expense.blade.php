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
                                <h3 class="panel-title text-white">Add Expense</h3><br>
                                <a href="{{ route('monthly.expense') }}" class="btn btn-success pull-right">This Month</a>
                                <a href="{{ route('today.expense') }}" class="btn btn-danger pull-right">Today</a>
                                <h3 class="panel-title text-white">{{ date('d-m-y') }}</h3>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="panel-body">
                                <form role="form" action="{{ url('/insert-expense') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Supplier</label>
                                        @php
                                        $sup=DB::table('suppliers')->get();
                                        @endphp
                                        <select name="sup_id" class="form-control">
                                            @foreach ($sup as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Expense Details </label>
                                        <textarea class="form-control" name="details" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="quantity" value="Not Applicable">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Amount</label>
                                        <input type="text" class="form-control" name="amount" placeholder="Amount" required>
                                    </div>

                                    <div class="form-group">

                                        <input type="hidden" class="form-control" name="date" value="{{ date('d-m-y') }}">
                                    </div>

                                    <div class="form-group">

                                        <input type="hidden" class="form-control" name="month" value="{{ date('F') }}">
                                    </div>

                                    <div class="form-group">

                                        <input type="hidden" class="form-control" name="year" value="{{ date('Y') }}">
                                    </div>

                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->



                </div>

            </div> <!-- container -->

        </div> <!-- content -->
    </div>

@endsection
