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
                                <h3 class="panel-title text-white">Edit Product
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
                                <form role="form" action="{{ url('/update-product/' . $product->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Product Name </label>
                                        <input type="text" class="form-control" name="product_name"
                                            value="{{ $product->product_name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Category</label>
                                        @php
                                        $cat=DB::table('categories')->get();
                                        @endphp
                                        <select name="cat_id" class="form-control">
                                            @foreach ($cat as $row)
                                                <option value="{{ $row->id }}" <?php if ($product->cat_id ==
                                                    $row->id) {
                                                    echo 'selected';
                                                    } ?>>{{ $row->cat_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Supplier</label>
                                        @php
                                        $sup=DB::table('suppliers')->get();
                                        @endphp
                                        <select name="sup_id" class="form-control">
                                            @foreach ($sup as $row)
                                                <option value="{{ $row->id }}" <?php if ($product->sup_id ==
                                                    $row->id) {
                                                    echo 'selected';
                                                    } ?> >{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Godown Number</label>
                                        <input type="text" class="form-control" name="product_garage"
                                            value="{{ $product->product_garage }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Buying Date</label>
                                        <input type="date" class="form-control" name="buy_date"
                                            value="{{ $product->buy_date }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Expire Date</label>
                                        <input type="date" class="form-control" name="expire_date"
                                            value="{{ $product->expire_date }}" required>
                                    </div>
                                    <div class="form-group">
                                        <img id="image" src="#" />
                                        <label for="exampleInputPassword1">Product Image</label>
                                        <input type="file" name="product_image" accept="image/*" onchange="readURL(this);">
                                    </div>
                                    <input type="hidden" name="old_photo" value="{{ $product->product_image }}">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Old Photo</label><br>
                                        <img src="{{ URL::to($product->product_image) }}"
                                            style="height: 80px; width: 80px;">
                                    </div>

                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection
