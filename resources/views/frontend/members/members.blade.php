@extends('frontend.master')
@section('title')

Members
    
@endsection
@section('body')
<!-- breadcrumbs end -->
<div class="breadcrumbs">
    <div class="container">
        <ul>
        <li><a href="{{ route('home.index') }}">Home</a></li>
        <li><a href="{{ route('member.index') }}">Members</a></li>
        </ul>
        
        <!-- button floating at right of breadcrumbs -->
        <div class="breadcrumbs-right"><a class="hide-bread" href="#"><i class="fa fa-chevron-up"></i> Hide</a></div>
    </div>
</div><!-- breadcrumbs end -->

    

<!-- General Container -->
<div class="all-content full-width-page">	
    <div class="section blog" >
        <div class="container">
            <!-- page title -->
            <div class="block-title"><h1>Our Volunteers</h1></div>
            <!-- main row -->
            <div class="row">
                <!-- main content col -->
                <div class="col-md-12">
                    <div class="row row-volunteers">
                    

                        @foreach ($member as $data)
                            
                       

                        <!-- volunteer one Start -->
                        <div class="col-md-6 animated fadeInLeft ">		
                            <div class="volunteer volunteer-centered bg-warning">
                                
                                <div class="volunteer-info row">
                                
                                    <!-- volunteer name/title -->
                                    <div class="col-md-4">
                                        <h4>{{ $data->name }}</h4>
                                        <span class="role">{{ $data->position }}</span>
                                    </div>
                                    
                                    <!-- volunteer photo -->
                                    <div class="col-md-4">
                                        <div class="volunteer-photo" style=" overflow: hidden;
                                        width: 100px;
                                        height: 100px;">
                                        
                                        <img src="{{ asset('/') }}{{ $data->image }}"

                                         style="
                                         border-radius:50% ;
                                         object-fit: cover;
                                          width: 100%;
                                          min-height: 100%;
                                         border: 4px solid rgb(147, 197, 19);
                                         "  alt="" /></div>
                                    </div>
                                    
                                    <!-- volunteer social media -->
                                    <div class="col-md-4">
                                        <span class="gray-text">Join Us.</span>
                                        <ul class="social-icons">
                                            <li><a href="{{ $data->facebook_id }}"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="{{ $data->twitter_id }}"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="{{ $data->instagram_id }}"><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="{{ $data->linkedin_id }}"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                    
                                </div>
                              
                            </div>
                        </div>    
                         <!-- volunteer one End -->
                        
                         @endforeach
  
                    </div>
                    
                    <!-- pagination -->
                    <div class="pagination">
                        <ul class="navigate-page">
                            <li class="disabled"><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                            <li class="active"><a href="#">1</a></li> 
                            <li><a href="#" class="active">2</a></li> 
                            <li><a href="#" class="active">3</a></li> 
                            <li><a href="#" class="active">4</a></li> 
                            <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div><!-- pagination end -->
                    
                </div><!-- /. Main column end -->
            </div><!-- main row end -->
    </div><!-- main container end -->
</div><!-- section end -->	
</div>
@endsection
