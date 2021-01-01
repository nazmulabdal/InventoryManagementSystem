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
                                <h3 class="panel-title text-white">Update Your Profile</h3>
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

                            @php
                            $user=Auth::user()->id;
                            $employee=DB::table('users')->where('id',$user)->first();
                            $admin=DB::table('users')->where('role','admin')->first();
                            @endphp

                            <div class="panel-body">
                                <form role="form" action="{{ url('save-profile/' . $employee->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $employee->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $employee->email }}">
                                    </div>
                                    @if (Auth::user()->role == 'admin')
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Shop Name</label>
                                            <input type="text" class="form-control" name="shopname"
                                                value="{{ $employee->shopname }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="role"
                                                value="{{ $employee->role }}">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="shopname"
                                                value="{{ $admin->shopname }}">
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $employee->address }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Photo</label><br>
                                        <img src="{{ URL::to($employee->photo) }}" style="height: 80px; width: 80px;">
                                        <input type="hidden" name="old_photo" value="{{ $employee->photo }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Upload New Photo Here</label><br>
                                        <input type="file" name="photo" accept="image/*" class="upload"
                                            onchange="readURL(this);">
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
