@extends('backend.admin_master')

@section('title')
    Slider
@endsection


@section('body')

<div class="body d-flex py-3">
    <div class="container-xxl">

        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Slider List</h3>
                    <div class="col-auto d-flex w-sm-100">
                        <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#addNewSlider">
                          <i class="icofont-plus-circle me-2 fs-6"></i>Add New Slider</button>
                      </div>
                </div>
            </div>
        </div> 

        <div class="row g-3 mb-2">
            <div class="col-md-12">
    
                @foreach ($slider as $key=>$data)
    
                      <div class="card mb-3 bg-secondary"> <!-- Card end  -->  
                            <div class="card-body">
                                <div class="row clearfix g-3">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="feedback-info sticky-top">
                                            <div class="card">
                                                    <div class="product-image">
                                                        <div class="product-item active">
                                                            <a href="#">
                                                            <img src="{{asset('/')}}{{ $data->image }}" alt="product" class="img-fluid w-100">
                                                             </a>
                                                        </div>
                                                       
                                                    </div>
                                                    
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <ul class="list-unstyled ">
                                            <li class="card">
                                                <div class="card-body p-lg-4 p-3">
                                                    <div class="d-flex mb-2 pb-3 border-bottom flex-wrap">
                                                       
                                                        <div class="flex-fill ms-3 text-truncate">
                                                            <h6 class="mb-0"><span>Home Slider</span></h6>
                                                            <span class="text-muted"><span>SL NO : </span>{{ ++$key }}</span>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <span class="mb-2 me-3">
                                                                <button value="{{ $data->id }}" id="editbtn" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editSlider"> <i class="icofont-edit text-success"></i></button>
                                                                <a href="{{ route('slider.destroy',$data->id) }}" onclick="confirmation(event)" class="btn btn-outline-secondary deleterow deletetBTN">
                                                                    <i class="icofont-ui-delete text-danger"></i>
                                                                  </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-item-post">
                                                    
                                                        <p>{{ $data->description }}</p>
                                                    </div>
                                                </div>
                                            </li> 
                                          
                                        </ul>
                                       
                                    </div>
                                </div>
                            </div>
                       </div><!-- Card end  -->  
               
                       @endforeach

            </div>
        </div>
    </div>
</div>

 {{-- ===========================Model====================================================== --}}
  {{-- ===========================Model====================================================== --}}
  {{-- ===========================Model====================================================== --}}

    <!-- Add New Donation-->
    <div class="modal fade" id="addNewSlider" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fw-bold" id="expaddLabel"> Edit Slider Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            
              <div class="deadline-form">
                <form class="row g-3 needs-validation" novalidate action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                  @csrf              
                  <div class="">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="validationCustom04" required>   
                  </div>

                  <div class="">
                    <label class="form-label">Short Status</label>
                    <textarea class="form-control" name="description" rows="3" maxlength="300" id="validationCustom07" placeholder="এখানে লিখুন ..." ></textarea>
                  </div>

                 

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary ">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          
          </div>
        </div>
      </div>
  {{-- ===========================Model eidt slider====================================================== --}}

    <!-- Edit slider-->
    <div class="modal fade" id="editSlider" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fw-bold" id="expaddLabel"> Edit Slider Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            
              <div class="deadline-form">
                <form class="row g-3 needs-validation" novalidate action="{{ route('slider.update') }}" 
                 method="post" enctype="multipart/form-data">
                  @csrf              
                  <div class="">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="validationCustom04" required>   
                    <input type="hidden" class="form-control slide_id" name="slide_id" required>   
                  </div>

                  <div class="">
                    <label class="form-label">Short Status</label>
                    <textarea class="form-control description" name="description" rows="3" maxlength="300" id="validationCustom07" placeholder="এখানে লিখুন ..." ></textarea>
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


@section('script')


<script>


//__Delete Btn confirmation__//

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
      $.ajax({
      type: "GET",
      dataType: "json",
      url: "/website/slider/edit/"+id,
      success: function(responsedata){
        console.log(responsedata);
  
      $('.description').text(responsedata.description);
      $('.slide_id').val(responsedata.id);

    
      }

    });

    });

    });







</script>



@endsection
