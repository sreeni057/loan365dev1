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
                        <h1 class="title">Lastly, we need some personal details..</h1>
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
                                <form id="contactform" method="post" class="onboarding8Form" action="{{url('onboarding')}}/{{$key}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$fetchvalues['id']}}">
                                <input type="hidden" name="type" value="{{$fetchvalues['mortgage_type']}}">
                                    <!-- One Second (1/2) Column -->
                                        <div class="column one">
                                            <div class="column">
                                                <span style="font-weight: bold;">What's your name?</span>
                                                <input type="text" name="user_name" id="newmortgage" value="{{$fetchvalues['user_name']}}" aria-required="true" aria-invalid="false" class="data-name" maxlength="50" required="required" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                            </div>
                                            <!-- One Second (1/2) Column -->
                                        </div>
                                        <div class="column one">
                                            <div class="column">
                                                <span style="font-weight: bold;">What's your email address?</span>
                                                <input type="text" name="user_email" id="newmortgage" value="{{$fetchvalues['user_email']}}" aria-required="true" aria-invalid="false" required="required" data-rule="email" data-msg="Please enter a valid email"/>
                                            </div>
                                            <!-- One Second (1/2) Column -->
                                        </div>
                                        <div class="column">
                                          <label>What is your date of birth?</label>
                                        </div>
                                        <div class="column one">
                                            <div class="column">
                                                <span style="font-weight: bold;">dd</span>
                                                <input type="text" maxlength="2" name="day" id="newmortgage" value="{{$fetchvalues['day']}}" aria-required="true" aria-invalid="false" class="data-number" required="required"/>
                                            </div>
                                            <!-- One Second (1/2) Column -->
                                            <div class="column">
                                                <span style="font-weight: bold;">mm</span>
                                                <input type="text" value="{{$fetchvalues['month']}}" maxlength="2" name="month" id="remortgage" aria-required="true" aria-invalid="false" class="data-number" required="required"/>
                                            </div>
                                            <div class="column">
                                                <span style="font-weight: bold;">yyyy</span>
                                                <input type="text" maxlength="4" value="{{$fetchvalues['year']}}" name="year" id="remortgage" aria-required="true" aria-invalid="false" class="data-number" required="required"/>
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
        $(document).ready(function(){
            if($(".fixed_val").is(":checked")) {
                $('.lifetime').hide();
            }
            else
            {   
                $('.7years').hide();
            }
            $('.fixed_val').click(function(){
                $('.lifetime').hide();
                $('.7years').show();
            });
            $('.variables_val').click(function(){
                $('.7years').hide();
                $('.lifetime').show();
            });
        });
    </script>
    <script type="text/javascript">
        $('.onboarding8Form').validate({
            rules:{
                user_name: {
                    required:true,
                },  
                user_email: {
                    required: true,
                    email: true
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
                },
            },
            messages:{
                user_name: {
                    required: "Please enter your name", 
                },
                user_email: {
                    required: "Please enter your email",
                    email: "Invaild email"
                },
                capital_type:{
                    required: "Please choose an option",
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