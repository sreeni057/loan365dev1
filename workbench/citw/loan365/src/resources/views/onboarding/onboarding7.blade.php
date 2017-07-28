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
                        <h1 class="title">There are two primary products to choose between: fixed rate and variable rate.</h1>
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
                                <form id="contactform" method="post" class="onboarding7Form" action="{{url('onboarding')}}/{{$key}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$fetchvalues['id']}}">
                                <input type="hidden" name="type" value="{{$fetchvalues['mortgage_type']}}">
                                    <!-- One Second (1/2) Column -->
                                        <div class="column">
                                          <label>Which product do you think appeals to you more?</label>
                                        </div>
                                        <div class="column one">
                                            <div class="column one-second">
                                                <span>Fixed</span>
                                                <input type="radio" class="fixed_val" name="appeals_type" checked="" id="fixed" value="1" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['appeals_type'] == '1' ? 'checked' : '' }} required="required"/>
                                            </div>
                                            <!-- One Second (1/2) Column -->
                                            <div class="column one-second">
                                                <span>Variable</span>
                                                <input type="radio" class="variables_val" name="appeals_type" id="variables" value="2" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['appeals_type'] == '2' ? 'checked' : '' }}/>
                                            </div>
                                        </div>
                                        <div class="column">
                                          <label>How long would you like to protect your introductory rate for?</label>
                                        </div>
                                        <div class="column one">
                                            <div class="column">
                                                <span>2 Years</span>
                                                <input type="radio" name="introductory_rate" checked="" id="newmortgage" value="1" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['introductory_rate'] == '1' ? 'checked' : '' }} required="required"/>
                                            </div>
                                            <!-- One Second (1/2) Column -->
                                            <div class="column">
                                                <span>3 Years</span>
                                                <input type="radio" name="introductory_rate" id="remortgage" value="2" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['introductory_rate'] == '2' ? 'checked' : '' }}/>
                                            </div>
                                            <div class="column">
                                                <span>5 Years</span>
                                                <input type="radio" name="introductory_rate" id="remortgage" value="3" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['introductory_rate'] == '3' ? 'checked' : '' }}/>
                                            </div>
                                            <div class="column 7years">
                                                <span>+7 Years</span>
                                                <input type="radio" name="introductory_rate" id="remortgage" value="4" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['introductory_rate'] == '4' ? 'checked' : '' }}/>
                                            </div>
                                            <div class="column lifetime">
                                                <span>Lifetime</span>
                                                <input type="radio" name="introductory_rate" id="remortgage" value="5" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['introductory_rate'] == '5' ? 'checked' : '' }}/>
                                            </div>
                                        </div>                                        
                                    <div class="column">
                                      <label>Are you looking for a capital and interest or interest only mortgage?</label>
                                    </div>
                                    <div class="column one">
                                        <div class="column one-second">
                                            <span>Capital & Interest</span>
                                            <input type="radio" name="capital_type" checked="" id="newmortgage" value="1" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['capital_type'] == '1' ? 'checked' : '' }} required="required"/>
                                        </div>
                                        <!-- One Second (1/2) Column -->
                                        <div class="column one-second">
                                            <span>Interest Only</span>
                                            <input type="radio" name="capital_type" id="remortgage" value="2" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['capital_type'] == '2' ? 'checked' : '' }}/>
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
        $('.onboarding7Form').validate({
            rules:{
                appeals_type: {
                    required:true,
                },  
                introductory_rate:{
                    required:true,
                }, 
                capital_type:{
                    required:true,
                },
            },
            messages:{
                appeals_type: {
                    required: "Please choose an option", 
                },
                introductory_rate: {

                    required: "Please choose an option", 
                },
                capital_type:{
                    required: "Please choose an option",
                },
            },
        });
    </script>
</body>

</html>