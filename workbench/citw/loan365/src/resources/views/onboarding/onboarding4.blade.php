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
                        <h1 class="title">Applying Type</h1>
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
                                <form id="contactform" method="post" action="{{url('onboarding')}}/{{$key}}" class="applying_typeForm">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$fetchvalues['id']}}">
                                <input type="hidden" name="type" value="{{$fetchvalues['mortgage_type']}}">
                                    <!-- One Second (1/2) Column -->
                                    <div class="column">
                                      <label style="font-size: 30px; text-align: center;">Are you applying on your own or with someone else?</label>
                                    </div>
                                    <div class="column one">
                                        <div class="column one-second">
                                            <span>On my own</span>
                                            <input type="radio" checked name="applying_type" checked="" id="newmortgage" value="1" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['applying_type'] == '1' ? 'checked' : '' }} required="required"/>
                                        </div>
                                        <!-- One Second (1/2) Column -->
                                        <div class="column one-second">
                                            <span>With someone</span>
                                            <input type="radio" name="applying_type" id="remortgage" value="2" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['applying_type'] == '2' ? 'checked' : '' }}/>
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
        $('.applying_typeForm').validate({
            rules:{
                applying_type: {
                    required:true,
                },  
            },
            messages:{
                applying_type: {
                    required: "Please choose an option", 
                },
            },
        });

    </script>
</body>

</html>