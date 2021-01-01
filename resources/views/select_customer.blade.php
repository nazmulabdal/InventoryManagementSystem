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
                        <div class="panel">
                            <div class="panel-heading">
                                <p class="panel-title text-white label label-success" style="font-size:25px;">Please Select
                                    a Customer

                                    <a href="#" class="btn btn-lg btn-danger waves-effect waves-light pull-right"
                                        data-toggle="modal" data-target="#con-close-modal">Add New Customer</a>

                                </p>

                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($customer as $row)
                                                    <tr>
                                                        <td>{{ $row->name }}</td>
                                                        <td>{{ $row->email }}</td>
                                                        <td>{{ $row->phone }}</td>
                                                        <td>{{ $row->address }}</td>
                                                        <td><img src="{{ $row->photo }}" style="height: 70px; width: 70px;">
                                                        </td>
                                                        <td>
                                                            <a href="{{ URL::to('create-invoice/' . $row->id) }}"
                                                                class="btn btn-success">Select</a>
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

    <!--customer add modal-->
    <form action="{{ url('/save-customer') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content bg-success">
                    <div class="modal-header ">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title text-white">Add a New Customer</h4>
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
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Name</label>
                                    <input type="text" class="form-control" id="field-4" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Email</label>
                                    <input type="email" class="form-control" id="field-5" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Phone</label>
                                    <input type="text" class="form-control" id="field-6" name="phone" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Address</label>
                                    <input type="text" class="form-control" id="field-4" name="address" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Shop Name</label>
                                    <input type="text" class="form-control" id="field-5" name="shopname" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">City</label>
                                    <input type="text" class="form-control" id="field-6" name="city" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Account Holder</label>
                                    <input type="text" class="form-control" id="field-4" name="account_holder" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Account Number</label>
                                    <input type="text" class="form-control" id="field-5" name="account_number" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Bank Name</label>
                                    <input type="text" class="form-control" id="field-6" name="bank_name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Bank Branch Name</label>
                                    <input type="text" class="form-control" id="field-4" name="bank_branch" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <img id="image" src="#" />
                                    <label for="exampleInputPassword1">Photo</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Photo</label>
                                    <input type="file" name="photo" accept="image/*" class="upload" required
                                        onchange="readURL(this);">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->
    </form>

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

{{--<div class="panel"><br><br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h4>
        <a href="#" class="btn btn-primary waves-effect waves-light pull-right" data-toggle="modal"
            data-target="#con-close-modal">Add New Customer</a>
    </h4>
    @php
    $customer=DB::table('customers')->get();
    @endphp
    <br><br>
    <select class="form-control" name="cus_id">
        <option disabled selected>Select Customer</option>
        @foreach ($customer as $cus)
            <option value="{{ $cus->id }}">{{ $cus->name }}</option>
        @endforeach
    </select>
</div>--}}
