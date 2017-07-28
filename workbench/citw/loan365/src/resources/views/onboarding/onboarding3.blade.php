@include('header')
<body class="style-simple layout-full-width mobile-tb-left button-stroke no-content-padding header-creative header-open header-rtl minimalist-header sticky-white ab-show subheader-both-center menu-line-below-80-1 menuo-right footer-copy-center">
    @include('sidebar')
    <!-- Main Theme Wrapper -->
    <div id="Wrapper">
        <!-- Header Wrapper -->
        <div id="Header_wrapper" style="background-image:url(images/home_investment_subheader1.jpg);" class="bg-parallax" data-stellar-background-ratio="0.5">
            <!-- Header -->
            <header id="Header"></header>
            <!--Subheader area - only for certain pages -->
            <div id="Subheader">
                <div class="container">
                    <div class="column one">
                        <h1 class="title">Let’s do a quick health check on your current mortgage.</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="entry-content">
                        <div class="section mcb-section column-margin-10px sections_style_2">
                            <div class="section_wrapper mcb-section-inner">
                                <form id="contactform" method="post" action="{{url('onboarding')}}/{{$key}}" class="poperty_form">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$fetchvalues->id}}">
                                <input type="hidden" name="type" value="{{$fetchvalues->mortgage_type}}">
                                    <!-- One Second (1/2) Column -->
                                        <div class="column one">
                                            <div class="column">
                                                <span style="font-weight: bold;">What's the value of your home?</span>
                                                <input type="text" name="value_of_home" placeholder="Value of your home" value="${{$fetchvalues->value_of_home}}" size="40" aria-required="true" aria-invalid="false" required="required" class="data-number" maxlength="7" />
                                            </div>
                                        </div>
                                        <div class="column one">
                                            <div class="column">
                                                <span style="font-weight: bold;">What are your current monthly mortgage repayments?</span>
                                                <input type="text" name="monthly_mortages_repay" value="${{$fetchvalues->monthly_mortages_repay}}" size="40" aria-required="true" placeholder="Monthly repayments" aria-invalid="false" class="data-number" required="required" maxlength="7"/>
                                            </div>
                                            <!-- One Second (1/2) Column -->
                                        </div>
                                        <div class="column one">
                                            <div class="column">
                                                <span style="font-weight: bold;">How long in total do you have left on your mortgage? (in years)</span>
                                                <input type="text" name="total_years_mortages" id="newmortgage" value="${{$fetchvalues->total_years_mortages}}" placeholder="Left on your mortgage" class="data-number" aria-required="true" aria-invalid="false" required="required" maxlength="7"/>
                                            </div>
                                            <!-- One Second (1/2) Column -->
                                        </div>
                                        <div class="column one">
                                            <div class="column">
                                                <span style="font-weight: bold;">What is the balance of your current mortgage?</span>
                                                <input type="text" name="balance_current_mortages" id="newmortgage" value="${{$fetchvalues->balance_current_mortages}}" placeholder="Current mortgage" aria-required="true" class="data-number" aria-invalid="false" required="required" maxlength="7"/>
                                            </div>
                                            <!-- One Second (1/2) Column -->
                                        </div>
                                        <div class="column">
                                          <label>What is the end date of your current mortgage introductory deal?</label>
                                        </div>
                                        <div class="column one">
                                            <div class="column">
                                                <input checked type="text" maxlength="2" name="day" id="newmortgage" value="{{$fetchvalues->day}}" aria-required="true" aria-invalid="false" placeholder="dd" class="data-number" required="required"/>
                                            </div>
                                            <!-- One Second (1/2) Column -->
                                            <div class="column">
                                                <input type="text" value="{{$fetchvalues->month}}" maxlength="2" name="month" id="remortgage" aria-required="true" aria-invalid="false" placeholder="mm" class="data-number" required="required"/>
                                            </div>
                                            <div class="column">
                                                <input type="text" maxlength="4" value="{{$fetchvalues->year}}" name="year" id="remortgage" aria-required="true" aria-invalid="false" required="required" placeholder="yyyy" class="data-number"/>
                                            </div>
                                        </div>
                                    <div class="column one">
                                        <button type="submit" name="onboarding_upt" value="1">Continue</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="section the_content no_content">
                            <div class="section_wrapper">
                                <div class="the_content_wrapper"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
</body>

</html>