<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Inventory Manager</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('public/welcome/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('public/welcome/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('public/welcome/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ URL::to('public/welcome/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/welcome/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{ asset('public/welcome/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/welcome/css/owl.theme.default.min.css') }}">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="header_white_section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header_information">
                                <ul>
                                    <li><img src="{{ URL::to('public/welcome/images/1.png') }}" alt="#" />Dhanmondi 32,
                                        Dhaka</li>
                                    <li><img src="{{ URL::to('public/welcome/images/2.png') }}" alt="#" />
                                        +8801752813855</li>
                                    <li><img src="{{ URL::to('public/welcome/images/3.png') }}" alt="#" />
                                        abdal1825@cseku.ac.bd</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo"> <a href="index.html"><img src="{{ URL::to('public/logo4.jpg') }}"
                                            alt="#"></a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li class="active"> <a href="{{ URL::to('/') }}">Home</a> </li>
                                        {{--<li> <a
                                                href="{{ URL::to('/all-login') }}">Sign In</a> </li>
                                        <li> <a href="{{ URL::to('/all-register') }}">Sign Up</a> </li>
                                        --}}
                                        @if (Route::has('login'))
                                            @auth
                                                <li> <a href="{{ url('/home') }}">Dashboard</a> </li>
                                            @else
                                                <li> <a href="{{ route('login') }}">Sign In</a> </li>
                                                @if (Route::has('register'))
                                                    <li> <a href="{{ route('register') }}">Sign Up</a> </li>
                                                @endif
                                            @endauth
                                        @endif

                                        <li> <a href="#about">About</a> </li>
                                        <li><a href="#contact">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="banner-main">
            <img src="{{ URL::to('public/inventory3.jpg') }}" style="height: 650px; width: 1600px;" alt="#" />
            <div class="container">
                <div class="text-bg">
                    <h1>Inventory<br><strong class="white">Management System</strong></h1>
                </div>
            </div>
        </div>
    </section>

    <div id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage">
                        <h2>About Our System</h2>
                        <span> Your Trusted Application for Growing Businesses. Increase Your Sales & Keep Track of
                            Every Unit With Our Powerful Stock Management, Order Fulfillment & Inventory Control
                            Application</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <div class="traveling-box">
                    <i><img src="{{ URL::to('public/stock.png') }}" alt="icon" /></i>
                    <h3>Stock Management</h3>
                    <p> Your Can Keep track of Your Stock and edit Anything You Want</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <div class="traveling-box">
                    <i><img src="{{ URL::to('public/order.png') }}" alt="icon" /></i>
                    <h3>Order Fulfilment</h3>
                    <p> All the Orders Will be Processed and Invoice Can be Generated </p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <div class="traveling-box">
                    <i><img src="{{ URL::to('public/inventory2.jpg') }}" alt="icon" /></i>
                    <h3>Inventory Control</h3>
                    <p> The Whole Inventory Will be in Control and You Can Enjoy the Ease of Handling </p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <div class="traveling-box">
                    <i><img src="{{ URL::to('public/report.png') }}" alt="icon" /></i>
                    <h3>Report Facility</h3>
                    <p> Your Sales and Expense Can be Seen as Reports Daily Weekly Monthly & Yearly </p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div id="contact" class="footer">
            <div class="container">
                <div class="row pdn-top-30">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="Follow">
                            <h3>CONTACT US</h3>
                            <span>House-15, Road-32<br>Sixth Avenue,<br>
                                Dhanmondi, Dhaka<br>
                                +8801752813855</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="Follow">
                            <h3>ADDITIONAL LINKS</h3>
                            <ul class="link">
                                <li> <a href="#">About us</a></li>
                                <li> <a href="#">Terms and conditions</a></li>
                                <li> <a href="#"> Privacy policy</a></li>
                                <li> <a href="#">News</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="Follow">
                            <form action="{{ URL::to('/contact-information') }}" method="post">
                                @csrf
                                <h3> Contact</h3>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <input class="Newsletter" name="customer_name" placeholder="Name" type="text"
                                            required>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <input class="Newsletter" name="customer_email" placeholder="Email" type="email"
                                            required>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <textarea class="textarea" name="customer_message" placeholder="Comment"
                                            type="text" required></textarea>
                                    </div>
                                </div>
                                <button class="Subscribe">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="{{ asset('public/welcome/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/welcome/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/welcome/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/welcome/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('public/welcome/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('public/welcome/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('public/welcome/js/custom.js') }}"></script>
    <!-- javascript -->
    <script src="{{ asset('public/welcome/js/owl.carousel.js') }}"></script>

    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                margin: 10,
                nav: true,
                loop: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        })

    </script>

</body>

</html>
