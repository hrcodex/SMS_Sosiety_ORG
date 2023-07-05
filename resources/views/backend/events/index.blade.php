@extends('backend.admin_master')

@section('title')
Events SMS Sosiety | SMS Sosiety Charity Foundation in Sonargaon Rangunia Chittagong Bangladesh|সমাজসেবী SMS Sosiety যুব সংগঠন সোনারগাঁও রাঙ্গুনিয়া চট্রগ্রাম বাংলাদেশ | non-profit organization
@endsection


@section('body')

 <!-- Body: Body -->
 <div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Events List</h3>
                    <div class="btn-group group-link btn-set-task w-sm-100">
                      <a href="{{ route('event.create') }}" class="btn active d-inline-flex align-items-center"><i class="icofont-plus-square px-2 fs-5"></i>New Event</a>
                    </div>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row g-3 mb-3">
           
            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-9">
                <div class="row g-3 mb-3 row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-4">

                    @foreach ($event as $data)
                        
                  
                    <div class="col">
                        <div class="card">
                            <div class="product">
                                <div class="product-image">
                                    <div class="product-item active">
                                        <a href="{{ route('event.edit',$data->id) }}">
                                        <img src="{{asset('/')}}{{ $data->image }}" alt="product" class="img-fluid w-100">
                                         </a>
                                    </div>
                                    <span class="add-wishlist" href="#">
                                         @if ($data->publication_status == 1)
                                          <i class="icofont-check-circled bg-white text-success"></i>
                                          @elseif ($data->publication_status == 0)
                                          <i class="icofont-exclamation-tringle bg-white text-warning"></i>
                                          @endif
                                        </span>
                                </div>
                                <div class="product-content p-3">
                                    <a href="{{ route('event.edit',$data->id) }}" class="fw-bold">{{ $data->title }}</a>
                                    <p class="text-muted" @php
                                        echo substr('your text',0,5);
                                    @endphp>@php
                                   echo substr($data->description, 0,  100);
                                    @endphp<span class="text-primary">....</span> </p>   
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  
                    

                </div>
              
            </div>
        </div> <!-- Row end  -->
    </div>
</div>

 
  
     

@endsection




