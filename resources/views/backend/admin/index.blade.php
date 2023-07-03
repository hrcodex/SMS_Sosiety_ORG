@extends('backend.admin_master')

@section('title')
    Dashboard
@endsection



@section('body')



 <!-- Body: Body -->
 <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
      <div class="row align-items-center">
        <div class="border-0 mb-4">
          <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">

        

            <h3 class="fw-bold mb-0">All Admins</h3>


            <div class="col-auto d-flex w-sm-100">
              <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#expadd">
                <i class="icofont-plus-circle me-2 fs-6"></i>Add new User </button>
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
                          
                          <th class="sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 147.2px;" aria-label="Order By: activate to sort column ascending">Email</th>
                         
                          <th class="sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 115.2px;" aria-label="Purchase Status: activate to sort column ascending">Publication Status</th>
                          <th class="dt-body-right sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Actions: activate to sort column ascending">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      


                        @foreach ($user as $data )
                          
                      

                        <tr role="row" class="even">
                          <td tabindex="0" class="sorting_1">
                            <strong>{{  $data->name }}</strong>
                          </td>
                          <td> 
                            @if ($data->image == null)
                            <img class="avatar rounded" src="{{ asset('/') }}backend/assets/images/xs/avatar3.svg" alt="">
                            @else
                            <img class="avatar rounded" src="{{ asset('/') }}{{ $data->image }}" alt="">
                            @endif
                          </td>

                          <td>{{ $data->email }}</td>
                        
                          
              
                          <td>
                            <span class="badge bg-success">Active</span>
                          </td>
                          <td class=" dt-body-right" style="display: none;">
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                              <a href="{{ route('admin.profile',$data->id) }}" class="btn btn-outline-secondary" >
                                <i class="icofont-edit text-success"></i>
                              </a>
                              <a href="{{route('admin.destroy', $data->id)}}" onclick="confirmation(event)" class="btn btn-outline-secondary deleterow deletetBTN">
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
              <h5 class="modal-title fw-bold" id="expaddLabel"> Add New User  <span class="spinner-border spinner-border-sm text-primary submitBTNLoading" role="status" aria-hidden="true"></span></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            
              <div class="deadline-form">
                <form class="row g-3 needs-validation" novalidate action="{{ route('admin.store') }}" method="post">
                  @csrf
                 <div class="mb-3">
                  <label class="form-label">Full Name</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                   <input type="text" list="nameSuggestions" id="nameSuggestions"  class="form-control" name="name" placeholder="সম্পূর্ণ নাম ..." required>
                    </div>
                
                 
                
                  <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                      <label class="form-label">Email</label>
                      <input type="email" name="email" list="emialSuggestions" id="emialSuggestions" placeholder="ইমেইল ..." class="form-control">
                    </div>
                    <div class="col-sm-6">
                      <label class="form-label">Password</label><span> </span><i class="icofont-exclamation-circle fs-7"></i>
                      <input type="text" name="password" placeholder="সর্বনিম্ন ৮ সংখ্যা বিশিষ্ট ..." class="form-control" id="validationCustom05" required>
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
    {{-- name Suggestion --}}
 
    <datalist id="nameSuggestions">
  @foreach ($members as $dataName )                   
      <option value="{{ $dataName->name }}">
   @endforeach 
  </datalist>
    {{-- email Suggestion --}}
 
    <datalist id="emialSuggestions">
  @foreach ($members as $dataEmail )                   
      <option value="{{ $dataEmail->email }}">
   @endforeach 
  </datalist>

@endsection


{{-- --------SCRIPT AND STYLE FOR THIS PAGE------------------- --}}



@section('script')

<script>

//__Hide DataList__//
$(document).ready(function(){

    $("datalist").hide();
 
});



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


