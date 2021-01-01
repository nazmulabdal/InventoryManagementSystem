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
                        $admin=DB::table('users')->where('role','admin')->orWhere('role','manager')->orWhere('role','cashier')->first()
                        @endphp
                        @if($admin->shopname == NULL)
                        <a href="{{route('home')}}" class="logo"><i class="md md-terrain"></i> <span>Dummy Shop </span></a>
                        @else
                        <a href="{{route('home')}}" class="logo"><i class="md md-terrain"></i> <span>{{$admin->shopname}} </span></a>
                        @endif
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            {{--<div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>--}}

                            <ul class="nav navbar-nav navbar-right pull-right">

                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><p class="btn btn-success"><i class="fas fa-user"><b>  {{Auth::user()->name}}  <i class="fas fa-caret-down"> </i></b></i></p> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();"></i><i class="fas fa-sign-out-alt"></i> Logout</a>
                                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{route('home')}}" class="waves-effect active"><i class="md md-home"></i><span> Home </span></a>
                            </li>
                            <li>
                                <a href="{{route('pos')}}" class="waves-effect"><i class="fas fa-shopping-cart"></i><span > Point of Sale </span></a>
                            </li>
                            @if(Auth::user()->role == 'admin' or Auth::user()->role == 'manager')
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-indent"></i> <span> Category </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('add.category')}}">Add New Category</a></li>
                                    <li><a href="{{route('all.category')}}">All Categories</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fab fa-product-hunt"></i> <span> Products </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('add.product')}}">Add New Product</a></li>
                                    <li><a href="{{route('all.product')}}">All Products</a></li>
                                    <li><a href="{{route('import.product')}}">Import Products</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-person-dolly"></i> <span> Suppliers </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('add.supplier')}}">Add New Supplier</a></li>
                                    <li><a href="{{route('all.supplier')}}">All Suppliers</a></li>

                                </ul>
                            </li>
                           
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-users"></i> <span> Customers </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('add.customer')}}">Add New Customer</a></li>
                                    <li><a href="{{route('all.customer')}}">All Customers</a></li>

                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-file-invoice"></i> <span> Orders </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('pending.orders')}}">Pending Orders</a></li>
                                    <li><a href="{{route('successful.orders')}}">Seccessful Orders</a></li>
                                </ul>
                            </li>
                            @endif

                            @if(Auth::user()->role == 'admin')
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-money-check-alt"></i> <span> Expense </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('add.expense')}}">Add New Expense</a></li>
                                    <li><a href="{{route('today.expense')}}">Today's Expense</a></li>
                                    <li><a href="{{route('monthly.expense')}}">Monthly Expense</a></li>
                                    <li><a href="{{route('yearly.expense')}}">Yearly Expense</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fab fa-sellcast"></i> <span> Sales </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('today.sales')}}">Today's Sales</a></li>
                                    <li><a href="{{route('monthly.sales')}}">Monthly Sales</a></li>
                                    <li><a href="{{route('yearly.sales')}}">Yearly Sales</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-sack-dollar"></i> <span> VAT </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    @php
                                    $vats=DB::table('vats')->first();
                                    @endphp
                                    @if($vats == NULL)
                                    <li><a href="{{URL::to('add-vat')}}">Add VAT</a></li>
                                    @else
                                    <li><a href="{{URL::to('view-vat')}}">Update VAT</a></li>
                                    @endif
                                </ul>
                            </li>

                            <li>
                                <a href="{{URL::to('/all-employee')}}" class="waves-effect"><i class="fas fa-user-friends"></i><span> Employees</span></a>
                            </li>

                            {{--<li>
                                <a href="{{URL::to('/all-contact')}}" class="waves-effect"><i class="fas fa-address-book"></i><span> Contacts</span></a>
                            </li>--}}
                            @endif
                            <li class="has_sub">
                                @php
                                $user=Auth::user()->id;
                                $employee=DB::table('users')->where('id',$user)->first();
                                @endphp
                                <a href="#" class="waves-effect"><i class="fas fa-user"></i> <span> Profile </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{URL::to('view-profile/'.$employee->id)}}">View Profile </a></li>
                                    <li><a href="{{URL::to('update-profile/'.$employee->id)}}">Update Profile</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->
                        @endguest
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

  {{--  <footer class="footer text-right">
        2020 © SHOUROV.
    </footer>--}}

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

{{--    <!-- flot Chart -->
    <script src="{{asset('public/admin/assets/flot-chart/jquery.flot.js')}}"></script>
    <script src="{{asset('public/admin/assets/flot-chart/jquery.flot.time.js')}}"></script>
    <script src="{{asset('public/admin/assets/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/flot-chart/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('public/admin/assets/flot-chart/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('public/admin/assets/flot-chart/jquery.flot.selection.js')}}"></script>
    <script src="{{asset('public/admin/assets/flot-chart/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('public/admin/assets/flot-chart/jquery.flot.crosshair.js')}}"></script>  --}}

    <!-- Counter-up -->
    <script src="{{asset('public/admin/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/admin/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>

    <!-- CUSTOM JS -->
    <script src="{{asset('public/admin/js/jquery.app.js')}}"></script>

    <!-- Dashboard -->
    <script src="{{asset('public/admin/js/jquery.dashboard.js')}}"></script>

   {{-- <!-- Chat -->
    <script src="{{asset('public/admin/js/jquery.chat.js')}}"></script>

    <!-- Todo -->
    <script src="{{asset('public/admin/js/jquery.todo.js')}}"></script>--}}

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
