<!-- Header -->
<div class="header" id="header">
    <div class="container">
        <!-- Logo -->
        <div id="logo" class="float-left"><a href="{{route('web_home.index')}}"><img src="{{ asset('/') }}images/SMS-LOGO.png" alt="" /></a></div>
        
        <!-- Menu navigation -->

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
        </div>
            
        <div class="nav nav-top float-right navbar-collapse collapse" id="nav-top-1">
        
            

            <!-- Menu Level 1 -->
            <ul>
                {{-- <li><a href="#about">About</a></li>       --}}
                <li><a href="{{route('web_home.index')}}">Home</a></li>      
                <li><a href="{{ asset('/') }}#about-section">About</a></li>  
             
                {{-- <li><a href="#gallery-section">Gallery</a></li> --}}
            
                <li><a href="{{ route('web_member.index') }}">Members</a></li>
                <li><a href="{{route('web_gallery.index')}}">Gallery</a></li>
                <li><a href="{{ route('web_event.index') }}">Events</a></li>
                <li><a href="{{ route('web_notice.index') }}"><u>Notice</u></a></li>
                
                <li><a href="{{ asset('/') }}#contact">Contact</a></li>
            </ul>
            
            <!-- Orange Button -->
            <div class="link-orange-top"><a href="tel:{{ $contact->phone }}">Donate Now</a></div>
        </div><!-- Menu navigation end -->			
    </div>
</div><!-- Header end -->