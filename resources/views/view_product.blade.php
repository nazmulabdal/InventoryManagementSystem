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
                                <h3 class="panel-title text-white">View Product
                                    <a href="{{ route('all.product') }}"
                                        class="btn btn-sm btn-danger panel-title text-white pull-right">All Products</a>
                                </h3>
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
                                <img style="height: 150px; width: 150px;" src="{{ URL::to($product->product_image) }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Product Name </label>
                                    <p>{{ $product->product_name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product in Stock</label>
                                    <p>{{ $product->product_quantity }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category</label>
                                    <p>{{ $product->cat_name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Supplier</label>
                                    <p>{{ $product->name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Godown Number</label>
                                    <p>{{ $product->product_garage }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Buying Date</label>
                                    <p>{{ $product->buy_date }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Expire Date</label>
                                    <p>{{ $product->expire_date }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Buying Price</label>
                                    <p>{{ $product->buying_price }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Previous Price</label>
                                    <p>{{ $product->previous_price }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Selling Price</label>
                                    <p>{{ $product->selling_price }}</p>
                                </div>

                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
@endsection
