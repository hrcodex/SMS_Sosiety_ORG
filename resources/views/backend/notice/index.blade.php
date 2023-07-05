@extends('backend.admin_master')

@section('title')
Short Notice SMS Sosiety | SMS Sosiety Charity Foundation in Sonargaon Rangunia Chittagong Bangladesh|সমাজসেবী SMS Sosiety যুব সংগঠন সোনারগাঁও রাঙ্গুনিয়া চট্রগ্রাম বাংলাদেশ | non-profit organization
@endsection



@section('body')



  <!-- Body: Body -->
  <div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">short Notice : {{ count($data) }}</h3>
                    <div class="btn-group group-link btn-set-task w-sm-100">
                        {{-- <a href="{{ route('product.index') }}" class="btn active d-inline-flex align-items-center" aria-current="page"><i class="icofont-listing-box px-2 fs-5"></i>List</a> --}}
                        <button data-bs-toggle="modal" data-bs-target="#addFaq" class="btn active d-inline-flex align-items-center"><i class="icofont-plus-square px-2 fs-5"></i>Add New Notice</button>
                    </div>
                </div>
                
            </div>
              {{-- //__Loading When Delet Members__// --}}
        <div class="btn-outline-secondary mb-1" id="deletLoading" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Loading...
      </div>
            
        </div> <!-- Row end  -->
        <div class="row g-3 mb-3">
            <!-- Start  -->


              @foreach ($data as $key=>$item )
                
            
       

            <div class="card card-callout mb-3 {{ $item->publication_status == 'Published' ?'border-success':'border-warning' }}">
                <div class="card-body">
                    <h4 id="asynchronous-methods-and-transitions"><span>{{ ++$key }} .</span>{{ $item->title }}</h4>
                    <p>{!! $item->description !!}</p>
                    
                    <button type="button" value="{{ $item->id }}" class="btn btn-outline-secondary border-dark" data-bs-toggle="modal" data-bs-target="#editFaq" id="editbtn">
                        <i class="icofont-edit text-success"></i>
                      </button>
                    <a href="{{ route('notice.destroy',$item->id) }}" onclick="confirmation(event)" class="btn btn-danger deletetBTN">
                        <i class="icofont-trash text-danger text-white"></i>
                      </a>
                      <button type="button" value="" class="btn btn-outline-secondary border-dark"  >
                        {{ $item->date }}
                      </button>
                  
                </div>
            </div>
           
            @endforeach
           
<!-- end  -->
        </div> 
    </div>
</div>

 {{-- ===========================Model====================================================== --}}
  {{-- ===========================Model====================================================== --}}
  {{-- ===========================Model====================================================== --}}

    <!-- Add New FAQ-->
    <div class="modal fade" id="addFaq" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fw-bold" id="expaddLabel">Add New Notice <span class="spinner-border spinner-border-sm text-primary submitBTNLoading" role="status" aria-hidden="true"></span></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            
              <div class="deadline-form">
                <form class="row g-3 needs-validation" novalidate action="{{ route('notice.store') }}" method="post">
                  @csrf
               
                  <div class="mb-3">
                      <label class="form-label">Title</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                      <input type="text" name="title" placeholder="title ....?" class="form-control" id="validationCustom03" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Answer</label>
                      <textarea class="form-control" name="description" placeholder="description ..." rows="5" cols="30" required=""></textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Publication Status</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                      <select class="form-select" name="publication_status" aria-label="Default select example" id="validationCustom06" required>
                        <option selected="Published">Published</option>
                        <option value="Unpublished">Unpublish</option>
                      </select>
                    </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary submitBTN">Submit</button>
                </div>
              </form>
              </div>
            </div>
          
          </div>
        </div>
      </div>
      <!-- Edit  FAQ-->
      <div class="modal fade" id="editFaq" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fw-bold" id="expaddLabel">তথ্য পরিবর্তন করুন <span class="spinner-border spinner-border-sm text-primary submitBTNLoading" role="status" aria-hidden="true"></span></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            
              <div class="deadline-form">
                <form class="row g-3 needs-validation" novalidate action="{{ route('notice.update') }}" method="post">
                  @csrf
               
                    <div class="mb-3">
                        <label class="form-label">Title</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                        <input type="text" name="title" placeholder="title ...." class="form-control title" id="validationCustom03" required>
                        <input type="hidden" name="id" class="form-control id">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control description" name="description" placeholder="description ..." rows="5" cols="30" required=""></textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Publication Status</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                        <select class="form-select publication_status" name="publication_status" aria-label="Default select example" id="validationCustom06" required>
                          <option selected="Published">Published</option>
                          <option value="Unpublished">Unpublished</option>
                        </select>
                      </div>
                  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary submitBTN">Update</button>
                  </div>
                </form>
              </div>
            </div>
          
          </div>
        </div>
      </div>
       

@endsection


{{-- --------SCRIPT AND STYLE FOR THIS PAGE------------------- --}}

@section('style')

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




<script>
  //__show loading btn when data inserted start__//
  
  $(".submitBTNLoading").hide();
     
  
  
     $(".submitBTN").click(function(){
       $(".submitBTNLoading").show();
      
     });
  //__show loading btn when data inserted start__//
     $("#deletLoading").hide();
  
     $("#deletetBTN").click(function(){
       $("#deletLoading").show();
     });
  
  
  
     // __clear input fild data__//
  
  function clearData(){
  
  $('.title').val('');
  $('.description').text('');
  $('.publication_status').val('');

  
  }
  
  // __ajax csrf support start__//
  
  $.ajaxSetup({
  
  headers: {
  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  }
  
  });
  
          // __Edit Product Model__//
  
        $(document).ready(function(){
  
          $(document).on('click', '#editbtn', function (){
          var id = $(this).val();
          clearData();
          $.ajax({
          type: "GET",
          dataType: "json",
          url: "/notice/edit/"+id,
          success: function(response){
  
            console.log(response);

            $(".title").val(response.title);
            $(".description").text(response.description);
            $(".publication_status").val(response.publication_status);
            $(".id").val(response.id);
           
  
          }
  
          });
  
          });
  
          });
  
  
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


