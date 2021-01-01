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
                                <h3 class="panel-title text-white" style="text-align: center">All Products</h3>
                                <a href="{{ route('add.product') }}"
                                    class="btn btn-sm btn-danger panel-title text-white">Add New</a>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Product in Stock</th>
                                                    <th>Add New Stock</th>
                                                    <th>Buying Price</th>
                                                    <th>Previous Price</th>
                                                    <th>Selling Price</th>
                                                    <th>Godown</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($product as $row)
                                                    <tr>
                                                        <td style="width: 100px;">{{ $row->product_name }}</td>
                                                        <td><input type="text" name="product_quantity"
                                                                value="{{ $row->product_quantity }}" style="width: 50px;"
                                                                disabled></td>
                                                        <td>
                                                            <form action="{{ url('update-stock/' . $row->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="product_quantity"
                                                                    value="{{ $row->product_quantity }}">
                                                                <input type="number" name="product_quantity_update"
                                                                    value="0" style="width: 60px;">
                                                                <button type="submit" name="submit"
                                                                    class="btn btn-sm btn-success"
                                                                    style="margin-top: -2px;"><i
                                                                        class="fas fa-check"></i></button>
                                                            </form>
                                                        </td>
                                                        <td style="width: 10px;">{{ $row->buying_price }}</td>

                                                        <td style="width: 10px;">{{ $row->previous_price }}</td>
                                                        <td>
                                                            <form action="{{ url('update-price/' . $row->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="previous_price"
                                                                    value="{{ $row->previous_price }}">
                                                                <input type="hidden" name="previous_selling_price"
                                                                    value="{{ $row->previous_selling_price }}">
                                                                <input type="number" name="selling_price"
                                                                    value="{{ $row->selling_price }}" style="width: 60px;">
                                                                <button type="submit" name="submit"
                                                                    class="btn btn-sm btn-success"
                                                                    style="margin-top: -2px;"><i
                                                                        class="fas fa-check"></i></button>
                                                            </form>
                                                        </td>
                                                        <td>{{ $row->product_garage }}</td>
                                                        <td><img src="{{ $row->product_image }}"
                                                                style="height: 70px; width: 70px;"></td>
                                                        <td>
                                                            <a href="{{ URL::to('edit-product/' . $row->id) }}"
                                                                class="btn btn-sm btn-info">Edit</a>
                                                            <a href="{{ URL::to('delete-product/' . $row->id) }}"
                                                                class="btn btn-sm btn-danger" id="delete">Delete</a>
                                                            <a href="{{ URL::to('view-product/' . $row->id) }}"
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
