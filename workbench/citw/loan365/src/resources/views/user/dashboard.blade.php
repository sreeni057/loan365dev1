@include('header')
    <body class="header" style="background-color: white">
    <!-- Tittle bar start -->
        <nav class="navbar navbar-info">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-primary">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('/')}}">Loan 365</a>
                </div>

                <div class="collapse navbar-collapse" id="example-navbar-primary">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 {{$compact_array['user_email']}}
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <!-- <li class="dropdown-header">Dropdown header</li> -->
                                <li><a href="{{url('dashboard')}}">Dashboard</a></li>
                                <li><a href="#">Calculator</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li class="divider"></li>
                                <li><a href="{{url('logout')}}">Sign out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Tittle bar end -->
        <!-- box start -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-4">
                        <div class="brand">
                            <h2>Welcome to Loan365</h2>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <h5 class="col-md-offset-4">You can track each stage of your mortgage application here</h5>
                    </div>
                    <div class="col-md-10 col-md-offset-1">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="content">
                            <div class="col-md-10">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile">
                                        <p style="color: #ccc5c5">STEP 1(5-10 minutes, no credit checks)</p>
                                        <h3>Your Mortgage Illustration</h3>
                                        <p style="color: #ccc5c5;">We scan over 15,000 mortgage products to let you know how much we think you can borrow and how much it will cost.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-simple btn-danger">Start again</button>
                                <button class="btn btn-danger">Resume<div class="ripple-container"></div></button>
                            </div>
                            </div>
                        </div>
                        <div class="card card-nav-tabs">
                            <div class="content">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile">
                                        <p>STEP 1(5-10 minutes, no credit checks)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-nav-tabs">
                            <div class="content">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile">
                                        <p>STEP 1(5-10 minutes, no credit checks)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs with icons on Card -->

                    </div>
                </div>
            </div>
        </div>
        <!-- box end -->
        <!-- Footer-->
        @include('footer')
    </div>
    
    <!-- JS -->
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}"></script>

    <script src="{{URL::asset('js/mfn.menu.js')}}"></script>
    <script src="{{URL::asset('js/jquery.plugins.js')}}"></script>
    <script src="{{URL::asset('js/jquery.jplayer.min.js')}}"></script>
    <script src="{{URL::asset('js/animations/animations.js')}}"></script>
    <script src="{{URL::asset('js/scripts.js')}}"></script>
    <script src="{{URL::asset('js/jquery.validate.js')}}"></script>
    <script src="{{URL::asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{URL::asset('js/loan365.js')}}"></script>
    <script>
        jQuery(window).load(function() {
            var retina = window.devicePixelRatio > 1 ? true : false;
            if (retina) {
                var retinaEl = jQuery("#logo img.logo-main");
                var retinaLogoW = retinaEl.width();
                var retinaLogoH = retinaEl.height();
                retinaEl.attr("src", "images/retina-investment.png").width(retinaLogoW).height(retinaLogoH);
                var stickyEl = jQuery("#logo img.logo-sticky");
                var stickyLogoW = stickyEl.width();
                var stickyLogoH = stickyEl.height();
                stickyEl.attr("src", "images/retina-investment.png").width(stickyLogoW).height(stickyLogoH);
                var mobileEl = jQuery("#logo img.logo-mobile");
                var mobileLogoW = mobileEl.width();
                var mobileLogoH = mobileEl.height();
                mobileEl.attr("src", "images/retina-investment.png").width(mobileLogoW).height(mobileLogoH);
            }
        });
    </script>
    <script type="text/javascript">
        $('.poperty_form').validate({
            rules:{
                value_of_home: {
                    required:true,
                    number:true,
                    maxlength: 7,
                },  
                monthly_mortages_repay:{
                    required:true,
                    number:true,
                    maxlength: 7,
                },         
                total_years_mortages:{
                    required:true,
                    number:true,
                    maxlength: 2,
                }, 
                balance_current_mortages:{
                    required:true, 
                    number:true,
                    maxlength: 7,
                },
                day:{
                    required:true,
                    number:true,
                    maxlength: 2,
                },
                month:{
                    required:true,
                    number:true,
                    maxlength: 2,
                },
                year:{
                    required:true,
                    number:true,
                    maxlength: 4,
                }
            },
            messages:{
                value_of_home: {

                    required: "Please enter the value of home", 
                },
                monthly_mortages_repay: {

                    required: "Please enter the monthly mortgages repay", 
                },
                total_years_mortages: {

                    required: "Please enter the tota year mortgage", 
                },
                balance_current_mortages: {

                    required: "Please enter the current mortgage", 
                },
                day:{
                    required: "Please enter the day",
                },
                month:{
                    required: "Please enter the month",
                },
                year:{
                    required: "Please enter the year",
                }
            },
        });
    </script>
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/material.min.js"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="assets/js/nouislider.min.js" type="text/javascript"></script>

    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="assets/js/material-kit.js" type="text/javascript"></script>

    <script type="text/javascript">

        $().ready(function(){
            // the body of this function is in assets/material-kit.js
            materialKit.initSliders();
            window_width = $(window).width();

            if (window_width >= 992){
                big_image = $('.wrapper > .header');

                $(window).on('scroll', materialKitDemo.checkScrollForParallax);
            }

        });
        $('#alerts').delay(2000).fadeOut(2000);
    </script>
</body>

</html>