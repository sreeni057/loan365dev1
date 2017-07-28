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
                        <h1 class="title">Lenders also consider your other loans and credit arrangements when deciding how much you can borrow.</h1>
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
                                <form id="contactform" class="oboarding6Form" method="post" action="{{url('onboarding')}}/{{$key}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$fetchvalues['id']}}">
                                <input type="hidden" name="type" value="{{$fetchvalues['mortgage_type']}}">
                                    <!-- One Second (1/2) Column -->
                                        <div class="column one">
                                            <div class="column">
                                                <span style="font-weight: bold;">What's the combined value of all your outstanding credit card balances?</span>
                                                <input type="text" name="outstanding_cc_balances" value="{{$fetchvalues['outstanding_cc_balances']}}"  aria-required="true" aria-invalid="false" class="data-number" maxlength="7" required="required"/>
                                            </div>
                                        </div>
                                        <div class="column one">
                                            <div class="column">
                                                <span style="font-weight: bold;">What are your monthly repayments on any loans you have?</span>
                                                <input type="text" name="monthly_repay_loan" value="{{$fetchvalues['monthly_repay_loan']}}" aria-required="true" aria-invalid="false" maxlength="7" class="data-number" required="required"/>
                                            </div>
                                            <!-- One Second (1/2) Column -->
                                        </div>
                                         <div class="column">
                                      <label>Have you had any CCJs (County Court Judgements) or defaults on any of your accounts in the last 6 years?</label>
                                    </div>
                                    <div class="column one">
                                        <div class="column one-second">
                                            <span>Yes</span>
                                            <input type="radio" name="country_court_judegment" checked="" id="newmortgage" value="1" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['country_court_judegment'] == '1' ? 'checked' : '' }} required="required"/>
                                        </div>
                                        <!-- One Second (1/2) Column -->
                                        <div class="column one-second">
                                            <span>No</span>
                                            <input type="radio" name="country_court_judegment" id="remortgage" value="2" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['country_court_judegment'] == '2' ? 'checked' : '' }} />
                                        </div>
                                    </div>
                                     <div class="column">
                                      <label>Do you have an ongoing IVA (Individual Voluntary Arrangement) or have you experienced a bankruptcy in the last 12 months?</label>
                                    </div>
                                    <div class="column one">
                                        <div class="column one-second">
                                            <span>Yes</span>
                                            <input type="radio" name="iva" checked="" id="newmortgage" value="1" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['iva'] == '1' ? 'checked' : '' }} required="required"/>
                                        </div>
                                        <!-- One Second (1/2) Column -->
                                        <div class="column one-second">
                                            <span>No</span>
                                            <input type="radio" name="iva" id="remortgage" value="2" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['iva'] == '2' ? 'checked' : '' }}/>
                                        </div>
                                    </div>
                                    <div class="column one">
                                        <button type="submit" name="onboarding_upd" value="1">Continue</button>
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
        $('.oboarding6Form').validate({
            rules:{
                outstanding_cc_balances: {
                    required:true,
                    number:true,
                    maxlength: 7,
                },  
                monthly_repay_loan:{
                    required:true,
                    number:true,
                    maxlength: 7,
                }, 
                country_court_judegment:{
                    required:true,
                },
                iva:{
                    required: "Please choose an option",
                },        
            },
            messages:{
                outstanding_cc_balances: {
                    required: "Please enter the outstanding credit card balances", 
                },
                monthly_repay_loan: {

                    required: "Please enter the monthly repay loan", 
                },
                country_court_judegment:{
                    required: "Please choose an option",
                },
                iva:{
                    required: "Please choose an option",
                },
            },
        });
    </script>
</body>

</html>