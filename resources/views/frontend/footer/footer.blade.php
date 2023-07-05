<div id="footer">

    <!-- Footer widgets Container -->
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
            
            
                <!-- Footer Widget 1 -->
                <div class="col-md-4">
                    <div class="widget widget-footer">
                    <h4>Site Map</h4>
                       {{-- <li><a href="#about">About</a></li>       --}}
                
                    <!-- Menu links -->
                    <ul class="categories">
                        <li><a href="{{route('web_home.index')}}">Home</a></li>
                        <li><a href="{{ asset('/') }}#about-section">About</a></li>
                        <li><a href="{{ route('web_member.index') }}">Members</a></li>
                        <li><a href="{{route('web_gallery.index')}}">Gallery</a></li>
                        <li><a href="{{ route('web_event.index') }}">Events</a></li>
                        <li><a href="{{ route('web_notice.index') }}">Notice</a></li>
                        <li><a href="{{ asset('/') }}#contact">Contact Us</a></li>
                    </ul>
                    </div>
                </div>
                
                
                <!-- Footer Widget 2 -->
                <div class="col-md-4">
                    <div class="widget widget-footer">
                        <div class="tweets-slider">
                            <ul class="slides">
                            
                                <!-- Tweet 01 -->
                                <li>
                                    <div class="tweet-body">
                                        SMS Sosiety Foundation is a non-profit organization that empowers underprivileged individuals and communities in Bangladesh through education, youth development, women's empowerment, climate change, governance and poverty alleviation.
                                    </div>
                                    
                                </li>
                                
                               
                            </ul>
                        </div>
                    </div>
                </div>
                
                
                <!-- Footer Widget 3-->
                <div class="col-md-4">
                    <div class="widget widget-footer">
                        <h4>Making the world a better place together.</h4>
                        <h4>Ending hunger. For good.</h4>
                        <h4>happiness Comes from your Action.</h4>
                        
                    </div>
                </div>
                
            </div><!-- row end -->
        </div><!-- container end -->
    </div><!-- Footer widgets Container End-->



    <!-- Sub - footer bar -->
    <div class="sub-footer">
        <div class="container">
            <div class="row">
            
               <!-- Copyright at left side -->
               <div class="copyright col-md-7">
                &copy; Created by <a href="https://hrcodex.com/" target="_blank">HR Codex LTD</a> &nbsp;&nbsp;&nbsp;<span>/</span>&nbsp;&nbsp;&nbsp; As a Company, we strive to create innovative and effective solutions
                </div>
                
                <!-- Social Icons at Right side -->
                <div class="social-footer col-md-5 text-right">
                    <span class="span-join">Contact With Us:</span>
                    <ul class="social-icons">
                        <li><a href="tel:01790370183"><i class="fa fa-phone"></i></a></li>
                        {{-- <li><a href="{{ $contact->twitter_id }}"><i class="fa fa-twitter"></i></a></li> --}}
                        <li><a href="https://www.facebook.com/hrcodex"><i class="fa fa-facebook"></i></a></li>
                        {{-- <li><a href=""><i class="fa fa-instagram"></i></a></li> --}}
                        <li><a href="mailto:mailto:hrcodexbd@gmail.com"><i class="fa fa-envelope"></i></a></li>
                        
                    </ul>
                </div>
                
            </div><!-- row end -->
        </div><!-- container end -->
    </div><!-- Sub - footer bar end -->
</div>