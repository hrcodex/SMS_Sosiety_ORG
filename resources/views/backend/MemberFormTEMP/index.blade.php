@extends('backend.admin_master')

@section('title')
Create Members SMS Sosiety | SMS Sosiety Charity Foundation in Sonargaon Rangunia Chittagong Bangladesh|সমাজসেবী SMS Sosiety যুব সংগঠন সোনারগাঁও রাঙ্গুনিয়া চট্রগ্রাম বাংলাদেশ | non-profit organization
@endsection



@section('body')



 <!-- Body: Body -->
 <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
      <div class="row align-items-center">
        <div class="border-0 mb-4 bg-secondary">
          <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap ">

        

            <h3 class="fw-bold mb-0 text-primary">আপনার সঠিক তথ্য দিয়ে রেজিস্ট্রেশন করুন</h3>
            <h6 class="fw-bold mb-0 ">অনুরোধক্রমে এসএমএস সোসাইটি কর্তৃপক্ষ</h6>

          </div>
          
        </div>
        {{-- //__Loading When Delet Members__// --}}
        <div class="btn-outline-secondary mb-1" id="deletLoading" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Loading...
      </div>
      </div>

      <div class="deadline-form m-auto">
        <form class="row g-3 needs-validation" novalidate action="{{ route('create_member.store') }}" method="post" enctype="multipart/form-data">
          @csrf
         <div class="mb-3">
          <label class="form-label">Full Name</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
           <input type="text" id="validationCustom01" class="form-control" name="name" placeholder="সম্পূর্ণ নাম ..." required>
           
            </div>
         <div class="mb-3">
          <label class="form-label">Image</label><span>[ পাসপোর্ট সাইজ ]</span>
           <input type="file" id="validationCustom01" class="form-control" name="image" required>
           
            </div>
         
        
          <div class="row g-3 mb-3">
            <div class="col-sm-6">
              <label class="form-label">Father's Name</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
              <input type="text" name="fathers_name" placeholder="বাবার নাম ..." class="form-control" id="validationCustom05" required>
            </div>
            <div class="col-sm-6">
              <label class="form-label">Mother's Name</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
              <input type="text" name="mothers_name" placeholder="মায়ের নাম ..." class="form-control" id="validationCustom06" required>
            </div>
          </div>
          <div class="row g-3 mb-3">
            <div class="col-sm-6">
              <label class="form-label">Phone</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
              <input type="number" name="phone" placeholder="মোবাইল নাম্বার ..." class="form-control" id="validationCustom05" required>
            </div>
            <div class="col-sm-6">
              <label class="form-label">Email</label>
              <input type="email" name="email" placeholder="ইমেইল ..." class="form-control">
            </div>
          </div>
          <div class="row g-3 mb-3">
            <div class="col-sm-6">
              <label class="form-label">National Identity</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
              <input type="number" name="national_identity" placeholder="NID অথবা জন্ম নিবন্ধনের নাম্বার ..." class="form-control" id="validationCustom05" required>
            </div>
            <div class="col-sm-6">
              <label class="form-label">Profession</label>
              <input type="text" name="profession" placeholder="আপনার পেশা ..." required class="form-control">
            </div>
           
          </div>
         
      
          <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea class="form-control" name="address" rows="3" maxlength="300" id="validationCustom07s" placeholder="বর্তমান ঠিকানা ..." id="validationCustom03" required></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Social Account Links</label>
            <div class="input-group mb-3">
                <span class="input-group-text "><i class="icofont-facebook fs-5 text-primary"></i></span>
                <input type="text" class="form-control" id="validationCustom08"  name="facebook_id" placeholder="যদি থাকে তাহলে দিন ...">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="icofont-instagram fs-5 color-light-orange" ></i></span>
                <input type="text"  class="form-control" id="validationCustom08"  name="instagram_id" placeholder="যদি থাকে তাহলে দিন">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="icofont-twitter fs-5 color-lightblue" ></i></span>
                <input type="text"  class="form-control" id="validationCustom08"  name="twitter_id" placeholder="যদি থাকে তাহলে দিন">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="icofont-linkedin fs-5 color-defult-white text-bg-light" ></i></span>
                <input type="text"  class="form-control" id="validationCustom08"  name="linkedin_id" placeholder="যদি থাকে তাহলে দিন">
            </div>
             
              </div>

          <div class="modal-footer ">
            <button type="button" class="btn btn-secondary m-auto" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary submitBTN m-auto">Submit</button>
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


