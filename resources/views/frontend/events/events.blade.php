@extends('frontend.master')
@section('title')
Events SMS Sosiety | SMS Sosiety Charity Foundation in Sonargaon Rangunia Chittagong Bangladesh|সমাজসেবী SMS Sosiety যুব সংগঠন সোনারগাঁও রাঙ্গুনিয়া চট্রগ্রাম বাংলাদেশ | non-profit organization
@endsection
@section('body')
    <!-- breadcrumbs end -->
    <div class="breadcrumbs">
        <div class="container">
            <ul>
				<li><a href="{{ route('web_home.index') }}">Home</a></li>
				<li><a href="{{ route('web_event.index') }}">Events</a></li>
            </ul>
            
            <!-- button floating at right of breadcrumbs -->
            <div class="breadcrumbs-right"><a class="hide-bread" href="#"><i class="fa fa-chevron-up"></i> Hide</a></div>
        </div>
    </div><!-- breadcrumbs end -->

    <!-- General Container -->
	<div class="all-content  blog-simple">	
		<div class="section blog" >
			<div class="container">
				<!-- Row of blog-sidebar -->
				<div class="row">
					<!-- Blog Row -->
					<div class="col-md-12 main-block" >
						<!-- Blog Title -->
						<div class="block-title"><h1>All Events</h1></div>
                       
						

						@foreach ($events as $data)
							
					


						<!-- blog item 1 -->
						<div class="blog-item-wrapper myDIV" >  							
							<div class="blog-item-photo">
							
								<!-- featured image -->
								<div class="blog-item-photo-w">
									<img class="" src="{{ asset('/') }}{{ $data->image }}" alt="" style="max-width: 100%;" />
								</div>
								<div class="blog-item-t">
									<span class="fa fa-file-text-o"></span>									
									<span class="link-read-more-w">
										<a href="{{ route('web_details.index',$data->id) }}" class="link-read-more"><span>Read More</span> <i class="fa fa-arrow-right"></i></a>
									</span>
								</div>
							</div>
							
							<!-- post excerpt -->
							<div class="blog-item">
								<div class="blog-item-left">
									<h4><a href="{{ route('web_details.index',$data->id) }}" class="title">{{ $data->title }}</a></h4>
									<div class="blog-item-excerpt">								
										{!! Str::limit($data->description, 70) !!}
									</div>
									
									<!-- social icons -->
									<div class="share-excerpt">
										Posted
										<ul class="social-icons">
											<li><a><i class="fa fa-calendar"></i> {{ $data->date }}<span> & </span> <i class="fa fa-clock-o"></i> {{ $data->time }} </a> </li>
											
										</ul>
									</div>
								</div>
								
								<!-- post date -->
								<div class="blog-item-right">
									<div class="blog-item-date">
										<span class="blog-item-number">{{ date('d', strtotime($data->date)); }}</span>
										<span class="blog-item-month"><p>{{ date('M', strtotime($data->month)); }}</p></span>
									</div>
									<a href="{{ route('web_details.index',$data->id) }}" class="arrow-right"><i class="fa fa-arrow-right"></i></a>
								</div>						
							</div><!-- post excerpt end -->
						</div><!-- Blog item end -->
						
						@endforeach
						
					
					
					
					

				</div><!-- main row blog-sidebar end -->

			</div><!-- container end -->
		</div><!-- section end -->	
	</div><!-- general container end -->
 
  



@endsection

