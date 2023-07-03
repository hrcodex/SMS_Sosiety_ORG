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
<div class="all-content gallery-page">	
    <div class="section blog" >
        <div class="container">
            <!-- page title -->
            <div class="block-title"><h1>Our Gallery</h1></div>
            
            <!-- main row -->
            <div class="row">
            
                <!-- main content col -->
                <div class="col-md-12">
                
                    <div class="clearfix">
                        <div id="our-gallery">             
                            <div class="gallery-wrapper">
                                
                                <!-- Filter Links -->
                                <div class="gallery-filter">						 
                                    <a href="#" data-filter=".africa">Africa</a> 
                                    <a href="#" data-filter=".indonesia">Indonesia</a>
                                    <a href="#" data-filter=".syria">Syria</a>
                                    <a href="#" data-filter="*" class="current"><i class="fa fa-picture-o"></i></a>	  
                                </div>
                             
                                <!-- The Items -->
                                <div class="gallery-container">



                                   						
                                    @foreach ($image as $item)
                                        
                                   
                                    <!-- 01 Start-->
                                    <div class="item africa m-auto">											
                                        <div class="item-wrapper">
                                        
                                            <!-- gallery item image -->
                                            <img alt="" class="magnific-popup" src="{{ asset('/') }}{{ $item->image }}"/>
                                            
                                            <div class="item-overlay">
                                                <a href=""><h4>{{ $item->title }}</h4></a>
                                                <span class="info">{!! Str::limit($item->description, 20) !!}</span>
                                                
                                                <!-- gallery item icons -->
                                                <div class="social-icons">
                                                 
                                                    <a href="{{ asset('/') }}{{ $item->image }}" class="magnific-popup"><i class="fa fa-arrows-alt text-white" style="font-size: 300%"></i></a>
                                                  
                                                </div>
                                            </div>

                                        </div><!-- /.item-wrapper -->											
                                    </div>
                                     <!-- 01 End-->
                                    
                                @endforeach
                                    
                                    
                                    
                                    
                                  
                                
                                </div><!-- /.gallery-container --> 
                            </div><!-- /.gallery-wrapper --> 
                            
                        </div><!-- /.col-lg-12 --> 
                    </div><!-- /.row -->  

                </div><!-- /. Main column end -->
            </div><!-- main row end -->
        </div><!-- main container end -->
    </div><!-- section end -->	
</div><!-- general end -->
@endsection
