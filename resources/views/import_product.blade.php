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
                                <h3 class="panel-title text-white">Import Products
                                    <a href="{{ route('export') }}" class="pull-right btn btn-danger btn-sm">Download
                                        XLSX</a>
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
                                <form role="form" action="{{ route('import') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">XLSX File Import</label>
                                            <input type="file" name="import_file" required>
                                        </div>

                                        <button type="submit"
                                            class="btn btn-purple waves-effect waves-light">Upload</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                        <div class="container">
                            <strong class="text-danger">First Download the XLSX FIle & Clear it | Write All of Your
                                Product's Information with Proper Listing | Now Import it </strong>
                        </div>
                    </div> <!-- col-->
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
@endsection
