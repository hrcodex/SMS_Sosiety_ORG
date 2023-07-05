@extends('backend.admin_master')

@section('title')
Edit Events SMS Sosiety | SMS Sosiety Charity Foundation in Sonargaon Rangunia Chittagong Bangladesh|সমাজসেবী SMS Sosiety যুব সংগঠন সোনারগাঁও রাঙ্গুনিয়া চট্রগ্রাম বাংলাদেশ | non-profit organization
@endsection


@section('body')

<div class="body d-flex py-3">
    <div class="container-xxl">


        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Edit Event Information</h3>
               
                </div>
            </div>
        </div> <!-- Row end  -->  
        <form class="row g-3 needs-validation" novalidate action="{{ route('event.update') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row g-3 mb-3">

         
            <div class="col-xl-4 col-lg-4">
                <div class="sticky-lg-top">
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Event Image</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                              <img src="{{asset('/')}}{{ $data->image }}" alt="image">
                               <div class="col-md-12">
                                <label class="form-label">Replace Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Visibility Status</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" id="validationCustom09" required type="radio" name="publication_status" value="1" {{ $data->publication_status==1?"checked":"" }}>
                                <label class="form-check-label">
                                    Published
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="validationCustom02" required type="radio" name="publication_status" value="0" {{ $data->publication_status==0?"checked":"" }}>
                                <label class="form-check-label">
                                    Unpublished
                                </label>
                            </div>
                        </div>
                    </div>
                   
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Publish Schedule</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <label class="form-label">Publish Date</label>
                                    <input type="date" class="form-control w-100" id="validationCustom03" required name="date" value="{{ date('Y-m-d', strtotime($data->date)); }}">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Publish Time</label>
                                    <input type="time" class="form-control w-100" id="validationCustom03" required name="time" value="{{ $data->time }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Project Info</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <label class="form-label">Donners Name</label>
                                    <input type="text" class="form-control" id="validationCustom04" required name="donner" value="{{ $data->donner }}"  placeholder="Rahim, Anik, Saimul">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Budget Ampunt</label>
                                    <input type="number" class="form-control" id="validationCustom05" required name="budget" value="{{ $data->budget }}" placeholder="32123 Taka">
                                </div>
                            </div>
                        </div>
                    </div>
                 
                  
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
             
               
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Basic information</h6>
                    </div>
                    <div class="card-body">
                        
                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" id="validationCustom06" required name="title" value="{{ $data->title }}" placeholder="title">
                                    <input type="hidden" class="form-control" name="admin_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" class="form-control" name="event_id" value="{{ $data->id }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Project Name</label>
                                    <input type="text" value="{{ $data->project_name }}" class="form-control" id="validationCustom07" required name="project_name" placeholder="project name">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Location</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Event Location</span>
                                        <input type="text" value="{{ $data->location }}" class="form-control" id="validationCustom08" required name="location" placeholder="Anowara,chittagon">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Description</label>
                                    <textarea id="editor" name="description" id="validationCustom05" required style="display: none;" placeholder="Type Description Here....">{!! $data->description !!}</textarea>
                                </div>
                            </div>
                       
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                        <h6 class="m-0 fw-bold">Categories</h6>
                    </div>
                    <div class="card-body">
                        <label class="form-label">Categories Select</label>
                        <select class="form-select" size="5" name="category" id="validationCustom05" required aria-label="size 3 select example">
                           
                            <option selected value="Events" {{ $data->category == 'Events' ? 'selected':''; }}>Events</option>
                            <option value="Mettings" {{ $data->category == 'Mettings' ? 'selected':''; }}>Mettings</option>
                            <option value="Speacial" {{ $data->category == 'Speacial' ? 'selected':''; }}>Speacial</option>
                           
                        </select>
                    </div>
                </div>
                <div class="card mb-3">
                  
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Update</button>
                        <a href="{{ route('event.destroy',$data->id) }}" onclick="confirmation(event)" class="btn btn-danger text-white btn-set-task w-sm-100 py-2 px-5 text-uppercase"><i class="icofont-trash fs-5 color-danger"></i> </a>
                    </div>
                </div>
           </div>
        


        </div>
    </form>
    </div>
</div>

     

@endsection


@section('script')

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()




</script>


{{-- //__Delete Btn confirmation__// --}}

{{-- aita <a> tag e add kortte hove =/ onclick="confirmation(event)" / --}}
    <script>
   
        function confirmation(ev){
        
          ev.preventDefault();
         
          var urlToRedirect = ev.currentTarget.getAttribute('href');
       
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = urlToRedirect;
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                         )
              }
            })
    
          
    
          
        }
    
      </script>
    
@endsection
