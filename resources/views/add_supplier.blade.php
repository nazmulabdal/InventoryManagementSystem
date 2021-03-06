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
                                <h3 class="panel-title text-white">Add supplier
                                    <a href="{{ route('all.supplier') }}"
                                        class="btn btn-sm btn-danger panel-title text-white pull-right">All Suppliers</a>
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
                                <form role="form" action="{{ url('/insert-supplier') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Supplier Name </label>
                                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Address"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Shop Name</label>
                                        <input type="text" class="form-control" name="shop" placeholder="Shop Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Account Holder</label>
                                        <input type="text" class="form-control" name="accountholder"
                                            placeholder="Account Holder" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Account Number</label>
                                        <input type="text" class="form-control" name="accountnumber"
                                            placeholder="Account Number" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Name</label>
                                        <input type="text" class="form-control" name="bankname" placeholder="Bank Name"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Branch Name</label>
                                        <input type="text" class="form-control" name="branchname" placeholder="Bank Branch"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">City</label>
                                        <input type="text" class="form-control" name="city" placeholder="city" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Supplier Type</label>
                                        <select name="type" class="form-control">
                                            <option disabled selected="">Select Supplier Type</option>
                                            <option value="Distributor">Retailer</option>
                                            <option value="Whole-Seller">Whole-Seller</option>
                                            <option value="Broker">Broker</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <img id="image" src="#" />
                                        <label for="exampleInputPassword1">Photo</label>
                                        <input type="file" name="photo" accept="image/*" class="upload" required
                                            onchange="readURL(this);">
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
