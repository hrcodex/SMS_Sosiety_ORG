@extends('frontend.master')
@section('title')

Gallery
    
@endsection
@section('body')
<!-- breadcrumbs end -->
<div class="breadcrumbs">
    <div class="container">
        <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Bread</a></li>
        <li><a href="#">Crumbs</a></li>
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
                <h1>Our Gallery</h1>
                
                <!-- back button -->
                <a href="#" class="button-back"><i class="fa-chevron-left fa"></i> Back</a>
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
                                    <li><i class="fa fa-"></i>Project Name : <span>{{ $data->project_name }}</span></li>
                                    <li><i class="fa fa-calendar"></i> Date : <span>{{ $data->date }}</span></li>
                                    <li><i class="fa fa-money"></i> Budget: <span>{{ $data->budget }} <span> টাকা</span></span></li>
                                    <li><i class="fa fa-group"></i> Donners: <span>{{ $data->donner }}</span></li>
                                    <li> <div class="share-excerpt">
                                        <!-- social icons -->
                                        <ul class="social-icons">
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                     
                                    </div></li>
                                </ul>									
                            </div>
                            
                        </div><!-- row into post end -->
                        
                        <!-- separator -->
                        <hr class="double" />
                        
                      
                    </div><!-- The post body end -->
    
                </div><!-- Main column end -->
            </div><!-- main row end -->
        </div><!-- main container end -->		
    </div><!-- section end -->	
</div><!-- general end -->
@endsection
