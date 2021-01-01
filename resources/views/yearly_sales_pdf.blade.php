<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inventory Manager</title>

    <!-- Scripts -->
    <link href="{{ asset('public/admin/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Font Icons -->
    <link href="{{ asset('public/admin/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/admin/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/admin/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

    <!-- animate css -->
    <link href="{{ asset('public/admin/css/animate.css') }}" rel="stylesheet" />

    <!-- Waves-effect -->
    <link href="{{ asset('public/admin/css/waves-effect.css') }}" rel="stylesheet">

    <!-- Custom Files -->
    <link href="{{ asset('public/admin/css/helper.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/admin/css/style.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('public/admin/js/modernizr.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet">
    <!-- DataTables -->
    <link href="{{ asset('public/admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>
</head>

<body>
    <br> <br> <br>
    <div class="hidden-print">
        <div class="pull-right">
            <a href="{{ route('home') }}" class="btn btn-danger">Back to Home</a>
        </div>
    </div>
    @php
    $date=date("Y");
    @endphp
    <h1 style="text-align: center;">Yearly Sales of {{ $date }}</h1>
    <table>
        <tr>
            <th>Customer Name</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        @foreach ($yearly_sales_data as $row)
            <tr>
                <td>{{ $row->order_date }}</td>
                <td>{{ $row->product_name }}</td>
                <td>{{ $row->quantity }}</td>
                <td>{{ number_format($row->total, 2) }}</td>
            </tr>
        @endforeach
    </table>
    @php
    $year=date("Y");
    $total=DB::table('orderdetails')->where('year',$year)->sum('total');
    @endphp
    <br>
    <h4 style="color:darkslateblue; font-size: 22px;" class="pull-right">Total Expense : {{ $total }} BDT </h4>
    <br> <br> <br>
    <div class="hidden-print">
        <div class="pull-right">
            <button onclick="window.print()" class="btn btn-success">Print PDF</button>
        </div>
    </div>
</body>

</html>
