@extends('frontend.master')
@section('title')
Notice SMS Sosiety | SMS Sosiety Charity Foundation in Sonargaon Rangunia Chittagong Bangladesh|সমাজসেবী SMS Sosiety যুব সংগঠন সোনারগাঁও রাঙ্গুনিয়া চট্রগ্রাম বাংলাদেশ | non-profit organization
@endsection
@section('body')
    <!-- breadcrumbs end -->
    <div class="breadcrumbs">
        <div class="container">
            <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Notice</a></li>
            
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
						<div class="block-title"><h1>Short Notice</h1></div>
                       
						@foreach ($notice as $key=>$data)

						<!-- blog item 1 -->
							<!-- post excerpt -->
							<div class="blog-item-wrapper bg-warning" >
								<div class="blog-item-left" style="border-left: 5px solid rgb(159, 98, 234);">
									<h4>
										<a class="title" >{{ ++$key }} <span> . </span> {{ $data->title }}</a>
										
										
                                        <div class="blog-item-right">
                                            <div class="blog-item-date">
												<span class="blog-item-number">{{ date('d', strtotime($data->date)); }}</span>
												<span class="blog-item-month"><p>{{ date('M', strtotime($data->month)); }}</p></span>
											</div>
                                            <a class="arrow-right">{{ $data->year }}</a>
                                        </div>	
                                    </h4>
									<div class="blog-item-excerpt">{!! $data->description !!}</div>
								</div>						
							</div><!-- post excerpt end -->
						<!-- blog item 1 -->

						@endforeach
						  

							
					

				</div><!-- main row blog-sidebar end -->

			</div><!-- container end -->
		</div><!-- section end -->	
	</div><!-- general container end -->
 
  



@endsection

