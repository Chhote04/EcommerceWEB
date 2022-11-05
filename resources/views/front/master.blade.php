
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>InfinityShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="{{url('https://fonts.gstatic.com')}}">
    <link href="{{url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap')}}" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css')}}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{url('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row py-1 px-xl-5" style="background-color:#f7f8fa">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        @if (Auth::check())
                        <span class="btn " style="background-color: #2a96ff; color:#ffffff;">{{ Auth::user()->name }}</span>
                    </div>
                    <div class="btn-group mx-2">
                        <li><a href="{{ url('logout') }}" class="btn" style="background-color: #2a96ff; color:#ffffff;">Logout</a>
                            @else
                            <li><a href="{{ url('/login') }}" class="btn" style="background-color:#2a96ff; color: #f7f8fa;">Signup/Login</a></li>
                            @endif
                    </div>
                    <div class="btn-group">

                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-blue rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-blue rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5 d-none d-lg-flex" style="background-color:#f7f8fa;">
            <div class="col-lg-4">
                <a href="{{url('/')}}" class="text-decoration-none">
                    <span class="h1 text-uppercase px-2" style="background-color:#f7f8fa; color:#2a96ff;">AsGardian</span>









                    
                    <span class="h1 text-uppercase px-2 ml-n1" style="background-color:#2a96ff; color: #f7f8fa;">Shop</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+917222979886</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-30" style="background-color: #ffffff;">
        <div class="row px-xl-5">

            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg py-3 py-lg-0 px-0" style="background-color: #ffffff;">
                    <a href="{{url('/')}}" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{url('/')}}" class="nav-item nav-link active">Home</a>
                            <a href="{{url('/add_to_cart')}}" class="nav-item nav-link">Shopping Cart</a>
                            <a href="{{url('/checkout')}}" class="nav-item nav-link">Checkout</a>
                            <a href="#contact" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="{{url('/add_to_cart')}}" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


@yield('content')
     <!-- Vendor Start -->
     <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="img/vendor-1.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-2.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-3.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-4.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-5.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-6.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-7.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
    <!-- Footer Start -->
    <div class="container-fluid mt-5 pt-5" style="background-color:#f7f8fa; color:#2a96ff;">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-uppercase mb-4" style="color:#2a96ff;">Get In Touch</h5>
                <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor. Rebum tempor no vero est magna amet no</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt  mr-3" style="color:#2a96ff;"></i>Gwalior , MP ,India</p>
                <p class="mb-2"><i class="fa fa-envelope  mr-3" style="color:#2a96ff;"></i>chhotelaljatav143@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt  mr-3" style="color:#2a96ff;"></i>+917222979886</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-uppercase mb-4" style="color:#2a96ff;">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="mb-2" href="#"><i class="fa fa-angle-right mr-2" style="color:#2a96ff;"></i>Home</a>
                            <a class="mb-2" href="#"><i class="fa fa-angle-right mr-2" style="color:#2a96ff;"></i>Our Shop</a>
                            <a class="mb-2" href="#"><i class="fa fa-angle-right mr-2" style="color:#2a96ff;"></i>Shop Detail</a>
                            <a class="mb-2" href="#"><i class="fa fa-angle-right mr-2" style="color:#2a96ff;"></i>Shopping Cart</a>
                            <a class="mb-2" href="#"><i class="fa fa-angle-right mr-2" style="color:#2a96ff;"></i>Checkout</a>
                            <a class="" href="#"><i class="fa fa-angle-right mr-2" style="color:#2a96ff;"></i>Contact Us</a>
                        </div>
                    </div>

                    <div class="col-md-4 mb-5">
                        <h5 class=" text-uppercase mb-4" style="color:#2a96ff;">Newsletter</h5>
                        <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                        <h6 class=" text-uppercase mt-4 mb-3" id="contact" style="color:#2a96ff;">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-square mr-2" style="color:#2a96ff;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mr-2" style="color:#2a96ff;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mr-2" style="color:#2a96ff;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-square" style="color:#2a96ff;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a style="color:#2a96ff;" href="#">Domain</a>. All Rights Reserved. Designed
                    by
                    <a style="color:#2a96ff;" href="https://servicerec.epizy.com">Other website</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="{{url('https://code.jquery.com/jquery-3.4.1.min.js')}}"></script>
    <script src="{{url('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('lib/easing/easing.min.js')}}"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="{{url('mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{url('mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{url('js/main.js')}}"></script>
    <script>
        function confirmation(){
            if($('.stripe').is(':checked') || $('.cod').is(':checked') || $('.paytm').is(':checked') || $('.Instamojo').is(':checked') || $('.razorpay').is(':checked') )
			{
				// alert('checked');
			}
        else
        {
        	alert('Please select payment method');
            return false;
        }
        }
    </script>
</body>

</html>