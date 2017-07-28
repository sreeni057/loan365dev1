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
                        <h1 class="title">Select Mortgage Type</h1>
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
                                <form id="mortgage_typeForm" method="post" action="{{url('onboarding')}}/{{$key}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$fetchvalues['id']}}">
                                <input type="hidden" name="type" value="{{$fetchvalues['mortgage_type']}}">
                                    <!-- One Second (1/2) Column -->
                                    <div class="column">
                                      <label style="font-size: 30px; text-align: center;">Are you looking for a new mortgage or a remortgage?</label>
                                    </div>
                                    <div class="column one">
                                        <div class="column one-second">
                                            <span>New mortgage</span>
                                            <input type="radio" name="mortgage_type" checked="" id="newmortgage" value="1" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['mortgage_type'] == '1' ? 'checked' : '' }} required="required"/>
                                        </div>
                                        <!-- One Second (1/2) Column -->
                                        <div class="column one-second">
                                            <span>Remortgage</span>
                                            <input type="radio" name="mortgage_type" id="remortgage" value="2" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['mortgage_type'] == '2' ? 'checked' : '' }}/>
                                        </div>
                                    </div>
                                    <div class="newremortgage_btn">
                                        <div class="column">
                                          <label style="font-size: 30px; text-align: center;">What kind of buyer are you?</label>
                                        </div>
                                        <div class="column one">
                                            <div class="column">
                                                <span>First Time</span>
                                                <input checked type="radio" name="buyer_type" id="newmortgage" value="1" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['buyer_type']=="1" ? 'checked' : '' }} required="required"/>
                                            </div>
                                            <!-- One Second (1/2) Column -->
                                            <div class="column">
                                                <span>Home Mover</span>
                                                <input type="radio" value="2" name="buyer_type" id="remortgage" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['buyer_type']=="2" ? 'checked' : '' }}/>
                                            </div>
                                            <div class="column">
                                                <span>Buy To Let</span>
                                                <input type="radio" value="3" name="buyer_type" id="remortgage" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['buyer_type']=="3" ? 'checked' : '' }}/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="remortgage_btn">
                                        <div class="column">
                                          <label style="font-size: 30px; text-align: center;">What kind of remortgage are you looking for?</label>
                                        </div>
                                        <div class="column one">
                                            <div class="column one-second">
                                                <span>Residential</span>
                                                <input checked type="radio" name="remortgage_type" id="newmortgage" value="1" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['buyer_type']=="1" ? 'checked' : '' }} />
                                            </div>
                                            <!-- One Second (1/2) Column -->
                                            <div class="column one-second">
                                                <span>Buy To Let</span>
                                                <input type="radio" name="remortgage_type" id="remortgage_type" value="2" size="40" aria-required="true" aria-invalid="false" {{ $fetchvalues['buyer_type']=="2" ? 'checked' : '' }}/>
                                            </div>
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
        $(document).ready(function(){
            var id = "{{$fetchvalues['mortgage_type']}}";
            if(id == 1)
            {
                $('.remortgage_btn').hide();
            }
            else if(id == 2)
            {
                $('.newremortgage_btn').hide();
            }
            else
            {
                $('.remortgage_btn').hide();
            }
            $('#newmortgage').click(function(){
                $('.remortgage_btn').hide();
                $('.newremortgage_btn').show();
            });
            $('#remortgage').click(function(){
                $('.newremortgage_btn').hide();
                $('.remortgage_btn').show();
            });
        });
    </script>
    <script type="text/javascript">
        $('#mortgage_typeForm').validate({
            rules:{
                mortgage_type: {
                    required:true,
                },            
            },
            messages:{
                mortgage_type: {

                    required: "Please choose an option", 
                }
            },
        });

       
    </script>
</body>

</html>