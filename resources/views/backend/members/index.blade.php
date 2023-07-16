@extends('backend.admin_master')

@section('title')
Members SMS Sosiety | SMS Sosiety Charity Foundation in Sonargaon Rangunia Chittagong Bangladesh|সমাজসেবী SMS Sosiety যুব সংগঠন সোনারগাঁও রাঙ্গুনিয়া চট্রগ্রাম বাংলাদেশ | non-profit organization
@endsection



@section('body')



 <!-- Body: Body -->
 <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
      <div class="row align-items-center">
        <div class="border-0 mb-4">
          <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">

        

            <h3 class="fw-bold mb-0">Total Members : {{ count($member) }}</h3>


            <div class="col-auto d-flex w-sm-100">
              <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#expadd">

              
                <i class="icofont-plus-circle me-2 fs-6"></i>Add New</button>
             
               
                
            </div>
          </div>
          
        </div>
        {{-- //__Loading When Delet Members__// --}}
        <div class="btn-outline-secondary mb-1" id="deletLoading" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Loading...
      </div>
      </div>
      <!-- Row end  -->
      <div class="row clearfix g-3">
        <div class="col-sm-12">
          <div class="card mb-3">
            <div class="card-body">
              <div id="myProjectTable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
              
                <div class="row">
                    
                  <div class="col-sm-12">
                    <table id="myProjectTable" class="table table-hover align-middle mb-0 nowrap dataTable no-footer dtr-inline collapsed" style="width: 100%;" role="grid" aria-describedby="myProjectTable_info">
                      <thead>
                        <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 57.2px;" aria-sort="ascending" aria-label="Id: activate to sort column descending">Name</th>
                          <th class="sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 57.2px;" aria-label="Items: activate to sort column ascending">Image</th>
                          <th class="sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 57.2px;" aria-label="Items: activate to sort column ascending">Father's Name</th>
                          <th class="sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 57.2px;" aria-label="Items: activate to sort column ascending">Position</th>
                          <th class="sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 57.2px;" aria-label="Items: activate to sort column ascending">National Identity</th>
                     
                         
                          <th class="sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 115.2px;" aria-label="Purchase Status: activate to sort column ascending">Phone</th>
                          <th class="sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 115.2px;" aria-label="Purchase Status: activate to sort column ascending">Publication Status</th>
                          <th class="sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 115.2px;" aria-label="Purchase Status: activate to sort column ascending">Address</th>
                          <th class="dt-body-right sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Actions: activate to sort column ascending">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      


                        @foreach ($member as $data )
                          
                      

                        <tr role="row" class="even {{ $data->publication_status == 0 ? "bg-warning" : "" }} ">
                          <td tabindex="0" class="sorting_1">
                            <strong>{{ $data->name }}</strong>
                          </td>
                          <td> 
                            @if ($data->image == null)
                            <img class="avatar rounded" src="{{ asset('/') }}backend/assets/images/xs/avatar3.svg" alt="">
                            @else
                            <img class="avatar rounded" src="{{ asset('/') }}{{ $data->image }}" alt="image">
                            @endif
                          </td>

                          <td>
                            <span>{{ $data->fathers_name }}</span>
                          </td>
                          <td>
                            <span>{{ $data->position }}</span>
                          </td>

                          <td>{{ $data->national_identity }}</td>
                          <td>{{ $data->phone }}</td>
                        
                          <td>{{ $data->publication_status == 1 ? "Published" : "Unpublished"}}</td>
                          <td>{{ $data->address }}</td>
                        
                          {{-- <td>
                            <span class="badge bg-success">Active</span>
                          </td> --}}

                          <td class=" dt-body-right" style="display: none;">
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                              <button type="button" value="{{ $data->id }}" class="btn btn-success text-white" id="monthlyPay" data-bs-toggle="modal" data-bs-target="#monthlyPayModel">Pay Now</button>
                              <button type="button" class="btn btn-outline-secondary" value="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#editMemberInfo" id="editButton">
                                <i class="icofont-edit text-success"></i>
                              </button>
                              <a href="{{route('member.destroy',$data->id)}}" onclick="confirmation(event)" class="btn btn-outline-secondary deleterow deletetBTN">
                                <i class="icofont-ui-delete text-danger"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                       

                        @endforeach
                       
                       
                       



                      </tbody>
                    </table>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Row End -->
    </div>
  </div>
 

  
  {{-- ===========================Model====================================================== --}}
  {{-- ===========================Model====================================================== --}}
  {{-- ===========================Model====================================================== --}}

    <!-- Add New User-->
    <div class="modal fade" id="expadd" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fw-bold" id="expaddLabel"> Add New Member  <span class="spinner-border spinner-border-sm text-primary submitBTNLoading" role="status" aria-hidden="true"></span></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            
              <div class="deadline-form">
                <form class="row g-3 needs-validation" novalidate action="{{ route('member.store') }}" method="post" enctype="multipart/form-data">
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
                      <input type="text" name="mothers_name" placeholder="মায়ের নাম ..." class="form-control">
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
                      <input type="number" name="national_identity" placeholder="এনআইডি অথবা জন্ম নিবন্ধনের নাম্বার ..." class="form-control" id="validationCustom05" required>
                    </div>
                    <div class="col-sm-6">
                      <label class="form-label">Profession</label>
                      <input type="text" name="profession" placeholder="আপনার পেশা ..." required class="form-control">
                    </div>
                  </div>
                  <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label">Publication Status</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                        <select class="form-select publication_status" name="publication_status" aria-label="Default select example" id="validationCustom06" required>
                          <option selected value="1">Published</option>
                          <option value="0">Unpublished</option>
                         
                          
                        </select>
                      </div>
                    <div class="col-sm-6">
                        <label class="form-label">Position</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                        <select class="form-select " name="position" aria-label="Default select example" id="validationCustom06" required>
                          
                          @foreach ($position as $data)
                             <option value="{{ $data->name }}">{{ $data->name }}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
              
                  <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea class="form-control" name="address" rows="3" maxlength="300" id="validationCustom07s" placeholder="বর্তমান ঠিকানা ..." ></textarea>
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
  {{-- ===========================Edit Model====================================================== --}}

    <!-- Edit Members Information User-->
    <div class="modal fade" id="editMemberInfo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fw-bold" id="expaddLabel">Edit Member Information  <span class="spinner-border spinner-border-sm text-primary submitBTNLoading" role="status" aria-hidden="true"></span></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            
              <div class="deadline-form">
                <form class="row g-3 needs-validation" novalidate action="{{ route('member.update') }}" method="post" enctype="multipart/form-data">
                  @csrf
                 <div class="mb-3">
                  <label class="form-label">Full Name</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                   <input type="text" id="validationCustom01" class="form-control name" name="name" placeholder="সম্পূর্ণ নাম ..." required>
                   
                    </div>
                    <div class="row g-3 mb-3">
                      <div class="col-sm-6">
                        <label class="form-label">Image</label>><span>[ পাসপোর্ট সাইজ ]</span>
                        <input type="file" class="form-control" name="image" >
                        <input type="hidden" class="form-control memberId" name="member_id" >
                      </div>
                      <div class="col-sm-6">
                          <img class="w120 rounded img-fluid image" src="{{ asset('/') }}images/no_image.jpg" alt="" width="50" height="50" >
                      </div>
                    </div>
                 
                
                  <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                      <label class="form-label">Father's Name</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                      <input type="text" name="fathers_name" placeholder="বাবার নাম ..." class="form-control fathers_name" id="validationCustom05" required>
                    </div>
                    <div class="col-sm-6">
                      <label class="form-label">Mother's Name</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                      <input type="text" name="mothers_name" placeholder="মায়ের নাম ..." class="form-control mothers_name">
                    </div>
                  </div>
                  <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                      <label class="form-label">Phone</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                      <input type="number" name="phone" placeholder="মোবাইল নাম্বার ..." class="form-control phone" id="validationCustom05" required>
                    </div>
                    <div class="col-sm-6">
                      <label class="form-label">Email</label>
                      <input type="email" name="email" placeholder="ইমেইল ..." class="form-control email">
                    </div>
                  </div>
                  <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                      <label class="form-label">National Identity</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                      <input type="number" name="national_identity" placeholder="এনআইডি অথবা জন্ম নিবন্ধনের নাম্বার ..." class="form-control national_identity" id="validationCustom05" required>
                    </div>
                    <div class="col-sm-6">
                      <label class="form-label">Profession</label>
                      <input type="text" name="profession" placeholder="আপনার পেশা ..." required class="form-control profession">
                    </div>
                  </div>
                  <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label">Publication Status</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                        <select class="form-select publication_status" name="publication_status" aria-label="Default select example" id="validationCustom06" required>
                          <option selected value="1">Published</option>
                          <option value="0">Unpublished</option>
                         
                          
                        </select>
                      </div>
                    <div class="col-sm-6">
                        <label class="form-label">Position</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                        <select class="form-select position" name="position" aria-label="Default select example" id="validationCustom06" required>
                         
                          @foreach ($position as $data)
                             <option value="{{ $data->name }}">{{ $data->name }}</option>
                           @endforeach
                           
                        </select>
                    </div>
                  </div>
              
                  <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea class="form-control address" name="address" rows="3" maxlength="300" id="validationCustom07s" placeholder="বর্তমান ঠিকানা ..." ></textarea>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Social Account Links</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text "><i class="icofont-facebook fs-5 text-primary"></i></span>
                        <input type="text" class="form-control facebook_id" id="validationCustom08"  name="facebook_id" placeholder="যদি থাকে তাহলে দিন ...">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="icofont-instagram fs-5 color-light-orange" ></i></span>
                        <input type="text"  class="form-control instagram_id" id="validationCustom08"  name="instagram_id" placeholder="যদি থাকে তাহলে দিন">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="icofont-twitter fs-5 color-lightblue" ></i></span>
                        <input type="text"  class="form-control twitter_id" id="validationCustom08"  name="twitter_id" placeholder="যদি থাকে তাহলে দিন">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="icofont-linkedin fs-5 color-defult-white text-bg-light" ></i></span>
                        <input type="text"  class="form-control linkedin_id" id="validationCustom08"  name="linkedin_id" placeholder="যদি থাকে তাহলে দিন">
                    </div>
                     
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
  {{-- ===========================Monthly Payment Model====================================================== --}}

    <!-- Monthly Payment by user-->
    <div class="modal fade" id="monthlyPayModel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fw-bold" id="expaddLabel">Monthly Pay<span class="spinner-border spinner-border-sm text-primary submitBTNLoading" role="status" aria-hidden="true"></span></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            
              <div class="deadline-form">
                <form class="row g-3 " action="{{ route('monthlyFees.store') }}" method="post">
                  @csrf
              
                 <div class="mb-3">
                  <label class="form-label">Select Month</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                  <input type="month" name="payment_month" class="form-control" id="validationCustom05" required  value="@php
                     date_default_timezone_set('Asia/Dhaka');
                    echo date('Y-m');

                  @endphp">
                   <input type="hidden"  class="form-control member_uniq_id" name="member_uniq_id" >
                    </div> 
                
                  <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                      <label class="form-label">Amount</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                      <input type="number" name="amount" class="form-control" placeholder="টাকার পরিমাণ..." id="validationCustom04" required>
                    </div>
                    <div class="col-sm-6">
                      <label class="form-label">Payment Method</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                      <select class="form-select" name="payment_method" aria-label="Default select example" id="validationCustom06" required>
                        <option selected value="Cash">Cash</option>
                        <option value="Rocket">Rocket</option>
                        <option value="Bkash">Bkash</option>
                        <option value="Nogod">Nogod</option>
                        <option value="Bank">Bank</option>
                      </select>
                    </div>
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
<script>

$.ajaxSetup({

headers: {
'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
}

});

  // __clear input fild data__//

//   function clearData(){

//   $('.image').val('');
//   $('.fathers_name').val('');
//   $('.mothers_name').val('');
//   $('.profession').val('');
//   $('.address').text('');
//   $('.national_identity').val('');
//   $('.phone').val('');
//   $('.email').val('');
//   $('.publication_status').val('');
//   $('.position').val('');
//   $('.facebook_id').val('');
//   $('.instagram_id').val('');
//   $('.twitter_id').val('');
//   $('.national_identity').val('').



// }
  
    // __Edit Form Data Show ajax start__//

    $(document).ready(function(){

$(document).on('click', '#editButton', function (){

var id = $(this).val();

$.ajax({
type: "GET",
dataType: "json",
url: "/member/edit/"+id,
success: function(response){


  console.log(response);

    $('.name').val(response.name);
    $('.image').attr("src","{{ asset('/') }}"+response.image);
    $('.fathers_name').val(response.fathers_name);
    $('.mothers_name').val(response.mothers_name);
    $('.profession').val(response.profession);
    $('.address').text(response.address);
    $('.national_identity').val(response.national_identity);
    $('.phone').val(response.phone);
    $('.email').val(response.email);
    $('.publication_status').val(response.publication_status);
    $('.position').val(response.position);
    $('.facebook_id').val(response.facebook_id);
    $('.instagram_id').val(response.instagram_id);
    $('.twitter_id').val(response.twitter_id);
    $('.linkedin_id').val(response.linkedin_id);

    $('.memberId').val(response.id);

}

});

});

//__when click pay now btn , member id assin in {member_uniq_id} input fild
$(document).on('click', '#monthlyPay', function (){

var id = $(this).val();
$('.member_uniq_id').val(id);
});





});



</script>



@endsection


