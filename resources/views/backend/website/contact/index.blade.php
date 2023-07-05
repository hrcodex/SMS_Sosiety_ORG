@extends('backend.admin_master')

@section('title')
Contact SMS Sosiety | SMS Sosiety Charity Foundation in Sonargaon Rangunia Chittagong Bangladesh|সমাজসেবী SMS Sosiety যুব সংগঠন সোনারগাঁও রাঙ্গুনিয়া চট্রগ্রাম বাংলাদেশ | non-profit organization
@endsection



@section('body')



 <!-- Body: Body -->
 <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
      <div class="row align-items-center">
        <div class="border-0 mb-4">
          <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap ">

        
            <h3 class="fw-bold mb-0">Contact Information</h3>


           
          </div>
          
        </div>
        {{-- //__Loading When Delet Members__// --}}
        <div class="btn-outline-secondary mb-1" id="deletLoading" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Loading...
      </div>
      </div>

      <div class="deadline-form m-auto">
        <form class="row g-3 needs-validation" novalidate action="{{ route('contact.update') }}" method="post" enctype="multipart/form-data">
          @csrf
       
         <div class="mb-3">
            <div class="row g-3 mb-3">
                <div class="col-sm-6">
                    <label class="form-label">Website Name</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                    <input type="text" id="validationCustom01" value="{{ $contact->website_name }}" class="form-control" name="website_name" placeholder="ওয়েবসাইটের নাম ..." >
                </div>
                <div class="col-sm-6">
                    <label class="form-label">Author Name</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                    <input type="text" id="validationCustom01" value="{{ $contact->author_name }}" class="form-control" name="author_name" placeholder="author name ..." >
                </div>
              </div>
             
              <div class="row g-3 mb-3">
                <div class="col-sm-6">
                  <label class="form-label">Phone</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                  <input type="number" name="phone" value="{{ $contact->phone }}" placeholder="মোবাইল নাম্বার ..." class="form-control" id="validationCustom05" >
                </div>
                <div class="col-sm-6">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" value="{{ $contact->email }}" placeholder="ইমেইল ..." class="form-control">
                </div>
              </div>
            </div>
            <div class="mb-3">
                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                      <label class="form-label">Website Logo</label>  <span class="text-primary text-bold form-label">[ W- 275 / H- 58 ]</span>
                      <input type="file"  class="form-control" name="image" >
                    </div>
                    <div class="col-sm-6">
                       
                        <img class="w120 rounded img-fluid image bg-dark" src="{{ asset('/') }}{{ $contact->image }}" alt="" width="100" height="50" >
                       
                    </div>
                  </div>
                </div>
         <div class="mb-3">
            <div class="row g-3 mb-3">
                <div class="col-sm-6">
                    <label class="form-label">Website Base Url</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                    <input type="text" id="validationCustom01" value="{{ $contact->base_url }}" class="form-control" name="base_url" placeholder="Base Url ..." >
                </div>
                <div class="col-sm-6">
                    <label class="form-label">Office Address</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                    <input type="text" id="validationCustom01" value="{{ $contact->main_url }}" class="form-control" name="main_url" placeholder="Main Url ..." >
                </div>
              </div>
            </div>

          <div class="mb-3">
            <label class="form-label">Keywords</label>
            <textarea class="form-control" name="keywords"  rows="3" maxlength="300" id="validationCustom07s" placeholder="keywords ..." id="validationCustom03" >{!! $contact->keywords !!}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Website Description</label>
            <textarea class="form-control" name="description" rows="6" maxlength="300" id="validationCustom07s" placeholder="Description ..." id="validationCustom03" >{!! $contact->website_name !!}</textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Social Page Links</label>
            <div class="input-group mb-3">
                <span class="input-group-text "><i class="icofont-facebook fs-5 text-primary"></i></span>
                <input type="text" class="form-control" value="{{ $contact->facebook_id }}" id="validationCustom08"  name="facebook_id" placeholder="পেজের লিংক যদি থাকে তাহলে দিন ...">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="icofont-instagram fs-5 color-light-orange" ></i></span>
                <input type="text"  class="form-control" value="{{ $contact->instagram_id }}" id="validationCustom08"  name="instagram_id" placeholder="পেজের লিংক যদি থাকে তাহলে দিন ...">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="icofont-twitter fs-5 color-lightblue" ></i></span>
                <input type="text"  class="form-control" value="{{ $contact->twitter_id }}" id="validationCustom08"  name="twitter_id" placeholder="পেজের লিংক যদি থাকে তাহলে দিন ...">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="icofont-youtube fs-5 color-defult-red text-danger text-bg-light" ></i></span>
                <input type="text"  class="form-control" value="{{ $contact->linkedin_id }}" id="validationCustom08"  name="linkedin_id" placeholder="পেজের লিংক যদি থাকে তাহলে দিন ...">
            </div>
             
              </div>

              <div class="col-auto d-flex w-sm-100">
                <button type="submit" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#expadd">
                  <i class="icofont-checked me-2 fs-6"></i>Update </button>
              </div>
        </form>
      </div>
    
      <!-- Row End -->
    </div>
  </div>
 

  
  
   

@endsection


{{-- --------SCRIPT AND STYLE FOR THIS PAGE------------------- --}}



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


</script>

{{-- //__Delete Btn confirmation__// --}}
  <script>
    //delet btn click korle ai funtion ta active hove
    function confirmation(ev){
      //btn click korle ai tar karone kono kicu hove nah
      ev.preventDefault();
      //A tag er modde href er modde jei route ta ase ,href er value ta ai variable er sstore korve
      var urlToRedirect = ev.currentTarget.getAttribute('href');
      //pop up model asve delet korvo ki korvonah ask korve btn takve yes/no
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {//delet btn e click korle href e taka route ta kaj kove and success message asve delete hoye jave
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


