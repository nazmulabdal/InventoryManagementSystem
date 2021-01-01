@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12 bg-primary">
                        <h4 class="pull-left page-title text-white">POINT OF SALE</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#" class="text-white">Inventory Manager</a></li>
                            <li class="text-white">{{ date('d-m-y') }}</li>
                        </ol>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="portfolioFilter">
                            @foreach ($categories as $row)
                                <b> <a href="#" data-filter="*" class="bg-success" style="color: white;">
                                        {{ $row->cat_name }}</a></b>
                            @endforeach
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="price_card text-center" style="border: 1px solid grey">

                            <ul class="price-features">
                                <table class="table">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th class="text-white">Name</th>
                                            <th class="text-white ">Quantity</th>
                                            <th class="text-white">Unit Price</th>
                                            <th class="text-white">Sub-Total</th>
                                            <th class="text-white">Remove</th>
                                        </tr>
                                    </thead>
                                    @php
                                    $cart_product=Cart::content();
                                    @endphp
                                    <tbody>
                                        @foreach ($cart_product as $prod)
                                            <tr>
                                                <th style="width: 150px;">{{ $prod->name }}</th>
                                                <th>
                                                    <form action="{{ url('/update-cart/' . $prod->rowId) }}" method="post">
                                                        @csrf
                                                        <input type="number" name="qty" value="{{ $prod->qty }}"
                                                            style="width: 50px;">
                                                        <button type="submit" name="submit" class="btn btn-sm btn-success"
                                                            style="margin-top: -2px;"><i class="fas fa-check"></i></button>
                                                    </form>
                                                </th>
                                                <th>{{ $prod->price }}</th>
                                                <th>{{ $prod->price * $prod->qty }}</th>
                                                <th><a href="{{ URL::to('/remove-cart/' . $prod->rowId) }}"><i
                                                            class="fas fa-trash-alt text-danger"></i></a></th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </ul>
                            <div class="pricing-footer"><br>
                                <h4 class="badge badge-info text-white" style="height:30px;width: 400px; font-size:25px;">
                                    Quantity : {{ Cart::count() }}</h4><br>
                                <h4 class="badge badge-success text-white"
                                    style="height:30px;width: 400px; font-size:25px;">Sub-Total : {{ Cart::subtotal() }}
                                </h4><br>
                                <h4 class="badge badge-secondary text-white"
                                    style="height:30px;width: 400px; font-size:25px;">VAT : {{ Cart::tax() }}</h4>
                                <hr>

                                <h4 class="badge badge-danger text-white" style="height:30px;width: 400px; font-size:25px;">
                                    Total : {{ Cart::total() }}</h4>

                            </div><br>

                            @if (Cart::content() == null)
                                @php echo "Please Put Something in the Cart!!!" @endphp
                            @endif

                            <button style="width: 220px;"><a href="{{ url('/select-customer') }}" style="width: 200px;"
                                    class="btn btn-lg btn-success text-white">Create Invoice</a></button>
                        </div> <!-- end Pricing_card -->

                    </div>


                    <div class="col-lg-7">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Product in Stock</th>
                                    <th>Product Price</th>
                                    <th>Add to Cart</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($product as $row)
                                    <tr>
                                        <form action="{{ url('/add-cart') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $row->id }}">
                                            <input type="hidden" name="name" value="{{ $row->product_name }}">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="price" value="{{ $row->selling_price }}">
                                            <td>
                                                <img src="{{ URL::to($row->product_image) }}" width="80px" height="80px">
                                            </td>
                                            <td>{{ $row->product_name }}</td>
                                            <td>{{ $row->cat_name }}</td>
                                            <td>
                                                <input type="text" name="product_quantity"
                                                    value="{{ $row->product_quantity }}" style="width: 50px;" disabled><br>
                                            </td>
                                            <td>{{ $row->selling_price }}</td>
                                            <td><button type="submit" class="btn btn-sm btn-primary "><i
                                                        class="fas fa-plus-square"></i></button></td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
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
