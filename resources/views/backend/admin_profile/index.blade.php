@extends('backend.admin_master')

@section('title')
    Admin Profile
@endsection

@section('body')



<div class="body d-flex py-3">
    <div class="container-xxl">
      <div class="row align-items-center">
        <div class="border-0 mb-4">
          <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
            <h3 class="fw-bold mb-0">Profile</h3>
          </div>
        </div>
         {{-- //__Loading When Delet Members__// --}}
         <div class="btn-outline-secondary mb-1" id="deletLoading" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Loading...
      </div>
      </div>
      <!-- Row end  -->
      <div class="row g-3">
        <div class="col-xl-4 col-lg-5 col-md-12">
          <div class="card profile-card flex-column mb-3">
            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
              <h6 class="mb-0 fw-bold ">Profile <span class="text-success icofont-check-circled "></span></h6>
            </div>
            <div class="card-body d-flex profile-fulldeatil flex-column">
              <div class="profile-block text-center w220 mx-auto">
                <a href="#">
                  @if ($user->image != null)
                  <img src="{{ asset('/') }}{{ $user->image }}" alt="" class="avatar xl rounded img-thumbnail shadow-sm">
                  @else
                  <img src="{{ asset('/') }}backend/assets/images/xs/avatar1.svg" alt="" class="avatar xl rounded img-thumbnail shadow-sm">
                  @endif

                 

                </a>
                <button class="btn btn-primary" style="position: absolute;top:15px;right: 15px;" data-bs-toggle="modal" id="editbtn" value="{{ $user->id }}" data-bs-target="#editprofile">
                  <i class="icofont-edit"></i>
                </button>
                <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                  <span class="text-muted small">Admin ID : #10219{{ $user->id }}</span>
                </div>
              </div>
              <div class="profile-info w-100">
                <h6 class="mb-0 mt-2  fw-bold d-block fs-6 text-center">{{ $user->name }}</h6>
              
                  @if ($user->role == 1)
                  <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block">Director</span>
                  @elseif ($user->role == 2)
                  <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block">Member</span>
                  @else
                  <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block">Manager</span>
                  @endif
              
              
                <div class="row g-2 pt-2">
                  <div class="col-xl-12">
                    <div class="d-flex align-items-center">
                      <i class="icofont-ui-touch-phone"></i>
                      <span class="ms-2">{{ $user->phone }} </span>
                    </div>
                  </div>
                  <div class="col-xl-12">
                    <div class="d-flex align-items-center">
                      <i class="icofont-email"></i>
                      <span class="ms-2">{{ $user->email }}</span>
                    </div>
                  </div>
                 
                  <div class="col-xl-12">
                    <div class="d-flex align-items-center">
                      <i class="icofont-address-book"></i>
                      <span class="ms-2">{{ $user->address }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
         
        </div>
        <div class="col-xl-8 col-lg-7 col-md-12">
          <div class="card auth-detailblock">
            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
              <h6 class="mb-0 fw-bold ">Authentication Details</h6>
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#authchange">
                <i class="icofont-edit"></i>
              </button>
            </div>
            <div class="card-body">
              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label col-6 col-sm-5">User Name :</label>
                  <span>
                    <strong>{{ $user->email }}</strong>
                  </span>
                </div>
                <div class="col-12">
                  <label class="form-label col-6 col-sm-5">Login Password :</label>
                  <span>
                    <strong>@if ($user->password != null)
                      ********
                    @endif
                  </strong>
                  </span>
                </div>
                @if (Auth::user()->role == 1)
                <div class="col-12">
                  <label class="form-label col-6 col-sm-5">Role :</label>
                  <span>
                    @if ($user->role == 1)
                    <strong>Master Admin</strong>
                  @elseif ($user->role == 2)
                  <strong>Admin</strong>
                  @else
                  <strong>Associate</strong>
                  @endif
                  </span>
                </div>
                @endif
                
              </div>
            </div>
          </div>

    
            
    
          
            {{-- =============Start===================== --}}
           


       

         
            {{-- ===========End======================= --}}
        
        </div>
      </div>
    </div>
  </div>

  
  {{-- ===========================Model====================================================== --}}
  {{-- ===========================Model====================================================== --}}
  {{-- ===========================Model====================================================== --}}

  <!-- Edit Password-->
  <div class="modal fade" id="authchange" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title  fw-bold" id="expeditLabel">পাসওয়ার্ড পরিবর্তন করুন <span class="spinner-border spinner-border-sm text-primary submitBTNLoading" role="status" aria-hidden="true"></span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="deadline-form">
            <form action="{{ route('admin.change_password') }}" method="post">
              @csrf
              <div class="row g-3 mb-3">
                <div class="col-sm-6">
                  <label for="item1" class="form-label">User Name</label>
                  <input type="text" class="form-control"  value="{{ $user->email }}">
                  <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
                </div>
                <div class="col-sm-6">
                  <label for="taxtno111" class="form-label">New Password</label>
                  <input type="text" class="form-control" name="password" placeholder="নতুন পাসওয়ার্ড দিন ...">
                
                </div>
                @if (Auth::user()->role == 1)
                <div class="row mb-3">
                  <label class="form-label">Position</label>
                  <select class="form-select" name="role"  aria-label="Default select example" id="validationCustom06" required>
                    <option {{ $user->role == 1 ? 'selected':'' }}  value="1">Director</option>
                    <option {{ $user->role == 2 ? 'selected':'' }} value="2">Member</option>
                    <option {{ $user->role == 3 ? 'selected':'' }} value="3">Manager</option>
                    
                  </select>
                </div>
                @endif
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                <button type="submit" class="btn btn-primary submitBTN">Update</button>
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>

  {{-- ================================ --}}

    <!-- Edit Profile Information-->
    <div class="modal fade" id="editprofile" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">

        <form action="{{ route('admin.update') }}" method="post" enctype="multipart/form-data">
          @csrf

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title  fw-bold" id="expeditLabel1111"> তথ্য পরিবর্তন করুন <span class="spinner-border spinner-border-sm text-primary submitBTNLoading" role="status" aria-hidden="true"></span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="deadline-form">
            
                <div class="row g-3 mb-3">
                  <div class="col-sm-12">
                    <label for="item100" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <input type="hidden" class="form-control" id="id" name="id" >
                  </div>
                  <div class="col-sm-12">
                    <label for="taxtno200" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                  </div>
                </div>
               
             
                <div class="row g-3 mb-3">
                  <div class="col-sm-6">
                    <label for="mailid" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" >
                  </div>
                  <div class="col-sm-6">
                    <label for="phoneid" class="form-label">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" >
                  </div>
                </div>
                <div class="row g-3 mb-3">
                  <div class="col-sm-12">
                    <label class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                  </div>
                </div>
               
             
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
            <button type="submit" class="btn btn-primary submitBTN">Update</button>
          </div>
        </div>

      </form>
      </div>
    </div>

@endsection



{{-- --------SCRIPT AND STYLE FOR THIS PAGE------------------- --}}


@section('script')


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

      $('#name').val('');
      $('#email ').val('');
      $('#phone').val('');
      $('#address').text('');
     


}


// __ajax csrf support start__//

    $.ajaxSetup({

    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }

    });



// __Edit Form Data Show ajax start__//

    $(document).ready(function(){

    $(document).on('click', '#editbtn', function (){

    var id = $(this).val();

    clearData();
      $.ajax({
      type: "GET",
      dataType: "json",
      url: "/admin/edit/"+id,
      success: function(responsedata){
  
      $('#name').val(responsedata.name);
      $('#email').val(responsedata.email);
      $('#phone').val(responsedata.phone);
      $('#address').text(responsedata.address);
      $('#id').val(responsedata.id);
     



      }

    });

    });

    });







</script>



@endsection


