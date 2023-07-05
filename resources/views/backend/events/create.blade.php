@extends('backend.admin_master')

@section('title')
Create New Event  SMS Sosiety | SMS Sosiety Charity Foundation in Sonargaon Rangunia Chittagong Bangladesh|সমাজসেবী SMS Sosiety যুব সংগঠন সোনারগাঁও রাঙ্গুনিয়া চট্রগ্রাম বাংলাদেশ | non-profit organization
@endsection


@section('body')

<div class="body d-flex py-3">
    <div class="container-xxl">


        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Add New Event</h3>
               
                </div>
            </div>
        </div> <!-- Row end  -->  
        <form class="row g-3 needs-validation" novalidate action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
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
                              
                               <div class="col-md-12">
                                <label class="form-label">Select New Image</label>
                                <input type="file" class="form-control" id="validationCustom01" required name="image">
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
                                <input class="form-check-input" id="validationCustom09" required type="radio" name="publication_status" value="1" checked>
                                <label class="form-check-label">
                                    Published
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="validationCustom02" value="0" required type="radio" name="publication_status" >
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
                                    <input type="date" name="date" class="form-control w-100" id="validationCustom03" required value="@php
                                      date_default_timezone_set('Asia/Dhaka');
                                        echo date('Y-m-d');
                                    @endphp">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Publish Time</label>
                                    <input type="time" name="time" class="form-control w-100" id="validationCustom03" required value="@php
                                    date_default_timezone_set('Asia/Dhaka');
                                    echo date('h:i');
                                @endphp">
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
                                    <input type="text" class="form-control" id="validationCustom04" required name="donner" value="{{old('donner')}}"  placeholder="Rahim, Anik, Saimul">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Budget Amount</label>
                                    <input type="number" class="form-control" id="validationCustom05" required name="budget" value="{{old('budget')}}" placeholder="500 Taka">
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
                                    <input type="text" class="form-control" id="validationCustom06" required name="title" value="{{old('title')}}" placeholder="title">
                                    <input type="hidden" class="form-control" name="admin_id" value="{{ Auth::user()->id }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Project Name</label>
                                    <input type="text" class="form-control" id="validationCustom07" required name="project_name" value="{{old('project_name')}}" placeholder="project name">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Location</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Event Location</span>
                                        <input type="text" class="form-control" id="validationCustom08" required name="location" value="{{old('location')}}" placeholder="Anowara,chittagon">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Description</label>
                                    <textarea id="editor" name="description" value="{{old('description')}}" id="validationCustom05" required style="display: none;" placeholder="Type Description Here...."></textarea>
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
                        <select class="form-select" size="5" name="category" value="{{old('category')}}" id="validationCustom05" required aria-label="size 3 select example">
                            <option selected value="Events" >Events</option>
                            <option value="Mettings">Mettings</option>
                            <option value="Speacial">Speacial</option>
                           
                        </select>
                    </div>
                </div>
                <div class="card mb-3">
                  
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
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


    
@endsection
