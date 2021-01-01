<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inventory Manager</title>

    <!-- Scripts -->
    <link href="{{asset('public/admin/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Font Icons -->
    <link href="{{asset('public/admin/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/admin/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/admin/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

    <!-- animate css -->
    <link href="{{asset('public/admin/css/animate.css')}}" rel="stylesheet" />

    <!-- Waves-effect -->
    <link href="{{asset('public/admin/css/waves-effect.css')}}" rel="stylesheet">

    <!-- Custom Files -->
    <link href="{{asset('public/admin/css/helper.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin/css/style.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{asset('public/admin/js/modernizr.min.js')}}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet">
    <!-- DataTables -->
    <link href="{{asset('public/admin/assets/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
</head>
<body>
    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">
                        <!-- Authentication Links -->
                        @guest

                        @else
                            <!-- Top Bar Start -->
            <!-- Top Bar Start -->
            
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        @php
                        $admin=DB::table('users')->where('role','admin')->first()
                        @endphp
                        <a href="#" class="logo"><i class="md md-terrain"></i> <span>{{$admin->shopname}} </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li>
                                    <a href="{{route('home')}}" class="badge badge-success">Back to Home</a>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

                        @endguest
        </div>

       <br><br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                        Customer Name : {{ $order->name }}<br>
                                                        Shop Name : {{ $order->shopname }}<br>
                                                        Address : {{ $order->address }} <br>
                                                        City : {{ $order->city }} <br>
                                                        Phone : {{ $order->phone }}
                                                    </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p class="m-t-10">Order Date : {{ $order->order_date }}</p>
                                                    <p class="m-t-10">Invoice Creator : {{ $order->invoice_creator }}</p>
                                                    <p class="m-t-10">Invoice # {{ $ord->invoice_number }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Product Name</th>
                                                                <th>Quantity</th>
                                                                <th>Unit Cost</th>
                                                                <th>Total Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $sl=1
                                                            @endphp
                                                            @foreach ($order_details as $od)
                                                                <tr>
                                                                    <td>{{ $sl++ }}</td>
                                                                    <td>{{ $od->product_name }}</td>
                                                                    <td>{{ $od->quantity }}</td>
                                                                    <td>{{ $od->unitcost }}</td>
                                                                    <td>{{ $od->unitcost * $od->quantity }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;"><br>
                                            <div class="col-md-9"></div>
                                            <div class="col-md-3">
                                                <p class="text-right">Sub-total : {{ $order->sub_total }}</p>
                                                <p class="text-right">VAT : {{ $order->vat }}</p>
                                                <hr>
                                                <p class="text-right">Total : {{ $order->total }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#" onclick="window.print()"
                                                    class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i>
                                                    Print PDF</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{asset('public/admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/admin/js/waves.js')}}"></script>
    <script src="{{asset('public/admin/js/wow.min.js')}}"></script>
    <script src="{{asset('public/admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/admin/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/chat/moment-2.2.1.js')}}"></script>
    <script src="{{asset('public/admin/assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/jquery-detectmobile/detect.js')}}"></script>
    <script src="{{asset('public/admin/assets/fastclick/fastclick.js')}}"></script>
    <script src="{{asset('public/admin/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('public/admin/assets/jquery-blockui/jquery.blockUI.js')}}"></script>

    <!-- sweet alerts -->
    <script src="{{asset('public/admin/assets/sweet-alert/sweet-alert.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/sweet-alert/sweet-alert.init.js')}}"></script>

    <!-- Counter-up -->
    <script src="{{asset('public/admin/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/admin/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>

    <!-- CUSTOM JS -->
    <script src="{{asset('public/admin/js/jquery.app.js')}}"></script>

    <!-- Dashboard -->
    <script src="{{asset('public/admin/js/jquery.dashboard.js')}}"></script>

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <script src="{{asset('public/admin/assets/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/datatables/dataTables.bootstrap.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>

    <script type="text/javascript">
        /* ==============================================
        Counter Up
        =============================================== */
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="{{asset('http://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

    <script>
        @if (Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                toastr.info("{{Session::get('message')}}");
                break;
            case 'success':
                toastr.success("{{Session::get('message')}}");
                break;
            case 'warning':
                toastr.warning("{{Session::get('message')}}");
                break;
            case 'error':
                toastr.error("{{Session::get('message')}}");
                break;
        }
        @endif
    </script>

    <script>
        $(document).on("click","#delete",function(e){
            e.preventDefault();
            var link=$(this).attr("href");
            swal({
                title: "Do You Want to Delete?",
                text: "Once You Delete,This Will be Permanently Deleted!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete)=>{
                if(willDelete){
                    window.location.href=link;
                }
                else{
                    swal("Safe Data!");
                }
            });
        });
    </script>
</body>
</html>




{{--@extends('layouts.app')
@section('content')

    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-left m-t-30">
                                            <address>
                                                Customer Name : {{ $order->name }}<br>
                                                Shop Name : {{ $order->shopname }}<br>
                                                Address : {{ $order->address }} <br>
                                                City : {{ $order->city }} <br>
                                                Phone : {{ $order->phone }}
                                            </address>
                                        </div>
                                        <div class="pull-right m-t-30">
                                            <p class="m-t-10">Order Date : {{ $order->order_date }}</p>
                                            <p class="m-t-10">Invoice Creator : {{ $order->invoice_creator }}</p>
                                            <p class="m-t-10">Invoice # {{ $ord->invoice_number }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-h-50"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table m-t-30">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Cost</th>
                                                        <th>Total Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $sl=1
                                                    @endphp
                                                    @foreach ($order_details as $od)
                                                        <tr>
                                                            <td>{{ $sl++ }}</td>
                                                            <td>{{ $od->product_name }}</td>
                                                            <td>{{ $od->quantity }}</td>
                                                            <td>{{ $od->unitcost }}</td>
                                                            <td>{{ $od->unitcost * $od->quantity }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="border-radius: 0px;"><br>
                                    <div class="col-md-9"></div>
                                    <div class="col-md-3">
                                        <p class="text-right"><b>Sub-total : {{ $order->sub_total }}</b></p>
                                        <p class="text-right">VAT : {{ $order->vat }}</p>
                                        <hr>
                                        <h3 class="text-right">Total : {{ $order->total }}</h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="hidden-print">
                                    <div class="pull-right">
                                        <a href="#" onclick="window.print()"
                                            class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i>
                                            Print PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
@endsection--}}
