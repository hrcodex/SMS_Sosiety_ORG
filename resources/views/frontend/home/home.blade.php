@extends('frontend.master')

@section('title')
Home SMS Sosiety | SMS Sosiety Charity Foundation in Sonargaon Rangunia Chittagong Bangladesh|সমাজসেবী SMS Sosiety যুব সংগঠন সোনারগাঁও রাঙ্গুনিয়া চট্রগ্রাম বাংলাদেশ | non-profit organization
@endsection

@section('body')
    
<!--  Main Background Section -->
<div id="background">
		
    <!-- Main Image Slider Container-->
    <div id="slider-pri">
        <div class="image-slider">
            <div class="slider-main">
            
                <!-- Slider Images -->
                <ul class="slides">
					@foreach ($slider as $data)
						
                    <li>
                      <img alt="" src="{{ asset('/') }}{{ $data->image }}" />
                    </li>

					@endforeach
                   
                </ul>
            </div>
        </div>
        
        <!-- Slider Text Container-->
        <div class="banner-shadow">
            <div class="container">
                <div class="text-slider-w">
                
                    <!-- Slider Text -->
                    <ul class="text-slider">

						@foreach ($slider as $data)
						
						@if ($loop->first)
						<li class="active animated fadeIn"><p>{{ $data->description }}</p></li>
						@else
						<li class="animated fadeIn"><p>{{ $data->description }}</p></li>
						@endif

						 @endforeach
                     
                      
                    </ul>
                    
                    <!-- Slider Text Controls-->
                    <div class="controls controls-main">
                        <div class="arrows-main">								
                        </div>							
                    </div>						
                </div>
            </div>
        </div>
    </div><!--  Main Image Slider End -->
</div>

    <!-- Main Background section end -->

	
	
	<!-- About Section -->
	<div class="section" id="about-section">
		<div class="container">
			<div class="row">
			
				<!-- Col 1 -->
				<div class="col-md-8 animate fadeInLeft">
					<h1 class="block-title">About <span>US</span></h1>
					<p>{!! $about->desctiption !!}</p>
					<hr />
				</div>
				
				<!-- Col 2 - video -->
				<div class="col-md-4 animate fadeIn">
					<div class="video-container">
						{!! $about->video_link !!}
						
					</div>
				</div>
				
				
				<!-- Col 3 Accordion -->
				<div class="col-md-9  animate fadeInRight">
				
					<!-- Accordion container-->
					<div class="accordion-box">
					
						@foreach ($faq as $data)
				
						@if ($loop->first)
						<div class="accordion animated out">
							<div class="accord-btn active"><strong><i class="fa fa-users"></i>{{ $data->question }}</strong></div>
							<div class="accord-content clearfix collapsed">
							<p>{!! $data->answer !!}</p>
							</div>
						</div>
						@else
						<div class="accordion animated out">
							<div class="accord-btn"><strong><i class="fa fa-users"></i>{{ $data->question }}</strong></div>
							<div class="accord-content clearfix">
							<p>{!! $data->answer !!}</p>
							</div>
						</div>
						@endif
							
							@endforeach
					</div>						
					</div>
				</div>
			</div><!-- row end -->
		</div><!-- container end -->
	</div>



	<!-- Blog Section -->
    <div class="section " id="blog-section">
		<div class="container">
		
		   <!-- page title -->
		   <div class="block-title">
			<h1>Recent Events</h1>
			{{-- <a href="#" class="view-all"><i class="fa fa-plus-circle"></i>View All</a> --}}
		</div>
	
			<div class="clearfix">       
				<div class="blogs-wrapper animate fadeIn" id="our-blogs">   
	
					<!-- Blog Container -->
					<div class="blogs-container">
	
						  
							
						    @foreach ($event as $data)
								
						                      
					   
							
						   <!-- blog 01 -->
							<div class="col-md-4">
								
								<div class="blog-item-wrapper">
									
									<!-- Featured image side -->
									<div class="blog-item-photo">
										<div class="blog-item-photo-w">
											<img class="" src="{{ asset('/') }}{{ $data->image }}" alt="" />
										</div>
										<div class="blog-item-t">
											<span class="fa fa-file-text-o"></span>									
											<span class="link-read-more-w">
												<a href="{{ route('web_event.index') }}"  class="link-read-more"><span>Read More</span> <i class="fa fa-arrow-right"></i></a>
											</span>
										</div>
									</div>
									
									<!-- post excerpt -->
									<div class="blog-item">
										<div class="blog-item-left">
											<h4><a href="{{ route('web_event.index') }}" >{{ Str::limit($data->title, 24) }}</a></h4>
											<div class="blog-item-excerpt">{!! Str::limit($data->description, 70) !!}</div>
											<!-- social icons -->
									<div class="share-excerpt">
										<ul class="social-icons">
											<li><a><i class="fa fa-calendar"></i> {{ $data->date }}<span> & </span> <i class="fa fa-clock-o"></i> {{ $data->time }} </a> </li>
											
										</ul>
									</div>
											
											
										</div>
										
										<!-- post meta -->
										<div class="blog-item-right">
											<div class="blog-item-date">
												<span class="blog-item-number">{{ date('d', strtotime($data->date)); }}</span>
												<span class="blog-item-month"><p>{{ date('M', strtotime($data->month)); }}</p></span>
											</div>
											<a href="{{ route('web_event.index') }}" class="arrow-right"><i class="fa fa-arrow-right"></i></a>
										</div>
									   
									
									</div><!-- post excerpt end-->
								</div><!-- blog-item-wrapper end-->
								
							</div><!-- blog-item end-->
						
							 
							 
							@endforeach 
						
							
						 
						
					</div><!-- /.gallery-container --> 
					
					<!-- Two Buttons -->
					<div class="two-buttons">
					   <a href="{{ route('web_event.index') }}" class="btn btn-line btn-white">View All Events &nbsp;&nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></a>
					</div>
					
				</div><!-- /.gallery-wrapper -->
				
				<span class="separator-section"></span>
				
			</div><!-- /.container -->    
		</div><!-- /.container -->
	</div>
	<!-- section end -->	

	
	
	{{-- <!-- Volunteers Section -->
    <div class="section">
		<div class="container">
	
			<!-- Title Section -->
			<div class="block-title-c">
				<h1># আমরা # <span style="font-size: 17px" class="text-center"><a href="{{ route('web_member.index') }}" class="view-all"><i class="fa fa-plus-circle"></i>View All</a></span>
				</h1>
			</div>	
			
			<!-- volunteers row -->
			<div class="row">
				<!-- volunteer one -->
				<div class="col-md-6 animate fadeInLeft">		
					<div class="volunteer">
						<div class="volunteer-photo"><img src="{{ asset('/') }}frontend/assets/images/face1.png" alt="" /></div>
						<div class="volunteer-info">
							<h4>হানিফুর রহমান</h4>
							<span class="role">jOINING : 4 JUN 2023</span>
							<p>ইনি একজন বিশিষ্ট ব্যবসায়ী যিনি আমাদের সাথে থেকে সাহায্য করেন</p>
							
							<!-- social icons -->
							<ul class="social-icons">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div><!-- volunteer end -->
	
				
				<!-- volunteer two -->
				<div class="col-md-6 animate fadeInRight">	
					<div class="volunteer">
						<div class="volunteer-photo"><img src="{{ asset('/') }}frontend/assets/images/face2.png" alt="" /></div>
						<div class="volunteer-info">
							<h4>হানিফুর রহমান</h4>
							<span class="role">jOINING : 4 JUN 2023</span>
							<p>ইনি একজন বিশিষ্ট ব্যবসায়ী যিনি আমাদের সাথে থেকে সাহায্য করেন</p>
							<!-- social icons -->
							<ul class="social-icons">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>		
				</div><!-- volunteer end -->
				
				<!-- volunteer two -->
				<div class="col-md-6 animate fadeInRight">	
					<div class="volunteer">
						<div class="volunteer-photo"><img src="{{ asset('/') }}frontend/assets/images/face2.png" alt="" /></div>
						<div class="volunteer-info">
							<h4>হানিফুর রহমান</h4>
							<span class="role">jOINING : 4 JUN 2023</span>
							<p>ইনি একজন বিশিষ্ট ব্যবসায়ী যিনি আমাদের সাথে থেকে সাহায্য করেন</p>
							<!-- social icons -->
							<ul class="social-icons">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>		
				</div><!-- volunteer end -->
				
				<!-- volunteer two -->
				<div class="col-md-6 animate fadeInRight">	
					<div class="volunteer">
						<div class="volunteer-photo"><img src="{{ asset('/') }}frontend/assets/images/face2.png" alt="" /></div>
						<div class="volunteer-info">
							<h4>হানিফুর রহমান</h4>
							<span class="role">jOINING : 4 JUN 2023</span>
							<p>ইনি একজন বিশিষ্ট ব্যবসায়ী যিনি আমাদের সাথে থেকে সাহায্য করেন</p>
							
							<!-- social icons -->
							<ul class="social-icons">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>		
				</div><!-- volunteer end -->
				
			  
			</div><!-- volunteer row end -->
	
	
			
		</div><!-- container end -->
	</div><div class="section"> --}}
   
	<!-- Become Volunteer Section -->
   
<div class="section section-background" style="background-image: url(http://localhost:8000/images/JOIN_NOW.jpg)">
    <div class="section_i">
        <div class="container">
        
            <!-- Title section -->
            <div class="block-title-c color-green"><h1>Our Motives</h1></div>

            <div class="row">
                <!-- video container -->
                <div class="col-md-6 animate fadeInLeft">
                    <div class="video-container">
                       
                        {!! $motive->video_link !!}
                        
                    </div>
                </div>
                <!-- Testimonial Slider Container-->
                <div class="col-md-6 animate fadeInRight">
                    <h4 class="subheader">{{ $motive->title }}</h4>
                    <p>{!! $motive->description !!}</p>
{{--                     
                    <!-- Subtitle -->
                    <h4 class="subheader">Reviews</h4>
                    
                    <!-- Testimonial Slider -->
                    <div class="slider-wrap">
                        <div class="flexslider-testimonial">
                        
                            <!-- Testimonial Slider -->
                            <ul class="slides">
                                <li>
                                    <div class="quote"><p>তাদের কাজগুলো খুবই ভালো মানবসেবা এভাবে কাজ করে যান তাদের কাজগুলো খুবই ভালো মানবসেবা এভাবে কাজ করে যান তাদের কাজগুলো খুবই ভালো মানবসেবা এভাবে কাজ করে যান</p></div>
                                    <div class="testimonial-photo"><img src="{{ asset('/') }}frontend/assets/images/face2.png" alt="" /></div>
                                </li>	
                                <li>
                                    <div class="quote"><p>তাদের কাজগুলো খুবই ভালো মানবসেবা এভাবে কাজ করে যান তাদের কাজগুলো খুবই ভালো মানবসেবা এভাবে কাজ করে যান তাদের কাজগুলো খুবই ভালো মানবসেবা এভাবে কাজ করে যান</p></div>
                                    <div class="testimonial-photo"><img src="{{ asset('/') }}frontend/assets/images/face1.png" alt="" /></div>
                                </li>									
                            </ul><!-- Testimonial Slider end -->
                        </div>
                    </div><!-- Testimonial Slider Container end --> --}}
                    
                    <h5 class="color-green">{{ $motive->slogan }}</h5>
                </div>
            </div><!-- row end -->
        </div><!-- container end -->
    </div><!-- section_i -->
</div>
	<!-- section end -->

	
	

	
	

	<!-- Contact Section -->
	<div class="section" id="contact">
		<div class="container container-full">
		
			<!-- Title Section -->
			<div class="block-title-c"><h1>Contact Us</h1></div>
	
			<!-- Map container -->
			<div class="map-section">
				<div class="container">
					
					<!-- Contact Info Floating -->
					<div class="contact-info-box animate fadeInLeft">
					
						<!-- Contact Address Photo -->
						<div class="contact-info-photo">
							<img src="{{ asset('/') }}images/contact.jpg" width="300" height="350" alt="" />
						</div>
						
						<!-- The Address -->
						<div class="contact-info-info">
							<a href="tel:{{ $contact->phone }}"><div class="info-row">
							<strong>{{ $contact->phone }}</strong> <i class="fa fa-phone"></i>
							</div></a>
							<a href="mailto:{{ $contact->email }}"><div class="info-row">{{ $contact->email }} <i class="fa fa-envelope"></i>
							</div></a>
							<div class="info-row">{{  $contact->main_url  }} <i class="fa fa-map-marker"></i>
							</div>
							<div class="info-row">
							<a href="tel:{{ $contact->phone }}" class="btn color-green">Call Now </a>
							</div>
						</div>
					</div>
				</div>
				
				<!-- The Map -->
				<div class="iframe-w">
					<img src="" alt="">
				   
				</div>
				
				<!-- The circle Below map -->
				<span class="show-more-contact"><a href="#"><i class="fa fa-sort"></i></a></span>
				
			</div><!-- map container end -->
	
			
		</div><!-- container section end -->
	</div>
	<!-- section end -->	

	

@endsection

