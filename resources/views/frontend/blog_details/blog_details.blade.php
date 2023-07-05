@extends('frontend.master')
@section('title')
Explorer Event SMS Sosiety | SMS Sosiety Charity Foundation in Sonargaon Rangunia Chittagong Bangladesh|সমাজসেবী SMS Sosiety যুব সংগঠন সোনারগাঁও রাঙ্গুনিয়া চট্রগ্রাম বাংলাদেশ | non-profit organization
@endsection
@section('body')
<!-- breadcrumbs end -->
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{ route('web_home.index') }}">Home</a></li>
        </ul>
        
        <!-- button floating at right of breadcrumbs -->
        <div class="breadcrumbs-right"><a class="hide-bread" href="#"><i class="fa fa-chevron-up"></i> Hide</a></div>
    </div>
</div><!-- breadcrumbs end -->

    

<!-- General Container -->
<div class="all-content full-width-page">	
    <div class="section blog" >
        <div class="container">
        
            <!-- page Title -->
            <div class="block-title">
                <h1>Explorer Events</h1>
            
            </div>
            
            <!-- main row -->
            <div class="row">
            
                <!-- main content col -->
                <div class="col-md-12">
                
                    <!-- featured image -->
                    <div class="featured-wrap">
                        <img src="{{ asset('/') }}{{ $data->image }}" alt="" />
                    </div>
                    
                    <!-- The post body -->
                    <div class="body-post">
                    
                        <!-- row into post -->
                        <div class="row">
                            <!-- text column -->
                            <div class="col-md-8">
                            
                                <!-- post title -->
                                <div class="block-title"><h1>{{ $data->title }}</h1></div>
                                
                                <!-- the text -->
                                <p>{!! $data->description !!}</p>
                                  
                               
        
                            </div>
                            
                            <!-- details column -->
                            <div class="col-md-4">
                                <div class="block-title"><h4>Project Information</h4></div>
                                <ul class="details-dashed">
                                    <li><i class="fa fa-heart"></i>Project Name : <span>{{ $data->project_name }}</span></li>
                                    <li><i class="fa fa-calendar"></i> Date : <span>{{ $data->date }}</span></li>
                                    <li><i class="fa fa-money"></i> Budget: <span>{{ $data->budget }} <span> টাকা</span></span></li>
                                    <li><i class="fa fa-group"></i> Donners: <span>{{ $data->donner }}</span></li>
                                    <li> Shere: <span id="share"></span></li>
                                   
                                   

                                    
                                </ul>									
                            </div>
                            
                        </div><!-- row into post end -->
                        
                        <!-- separator -->
                        
                        
                      
                    </div><!-- The post body end -->
    
                </div><!-- Main column end -->
            </div><!-- main row end -->
        </div><!-- main container end -->		
    </div><!-- section end -->	
</div><!-- general end -->
@endsection
@section('script')
<script src="https://kit.fontawesome.com/7368c40b21.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<script>
    $("#share").jsSocials({
        url: '{{ asset('/') }}web/details/{{  $data->id  }}',
        text: '{{ $data->title }}',
        showLabel: true,
        shares: ["email", "twitter", "facebook", "pinterest", "whatsapp"]
    });
</script>
@endsection