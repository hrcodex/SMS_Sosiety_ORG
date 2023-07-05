@extends('backend.admin_master')

@section('title')
Create New Porition SMS Sosiety | SMS Sosiety Charity Foundation in Sonargaon Rangunia Chittagong Bangladesh|সমাজসেবী SMS Sosiety যুব সংগঠন সোনারগাঁও রাঙ্গুনিয়া চট্রগ্রাম বাংলাদেশ | non-profit organization
@endsection



@section('body')


<!-- Body: Body -->
 <!-- Body: Body -->
 <div class="body d-flex py-lg-3 py-md-2">
  <div class="container-xxl">
    <div class="row align-items-center">
      <div class="border-0 mb-4">
        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
          <h3 class="fw-bold mb-0">অফিশিয়াল পেইজ</h3>
        </div>
      </div>
    </div>
    <!-- Row end  -->
    <div class="row clearfix g-3">
      <div class="col-lg-4">
        <div class="card mb-3">
          <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
            <h6 class="m-0 fw-bold">নতুন যোগ করুন</h6>
          </div>
          <div class="card-body">
            <form class="needs-validation" novalidate action="{{ route('position.store') }}" method="post">
                @csrf
              <div class="row g-3 align-items-center">
                
                <div class="col-md-12">
                  <label class="form-label">Page Name</label>
                  <input type="text" name="name" class="form-control" id="validationCustom06" required="" placeholder="পেজের নাম...." required>
                </div>
               
              </div>
              <button type="submit" class="btn btn-primary mt-4 text-uppercase px-5">ADD <i class="icofont-plus-circle me-2 fs-6"></i> </button>
            </form>
          </div>
        </div>
       
      </div>
      <div class="col-lg-8">
        <div class="card mb-3">
          <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
            <h6 class="m-0 fw-bold">তালিকা</h6>
          </div>
          <div class="card-body">
            <div id="myProjectTable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            
              <div class="row">
                  
                <div class="col-sm-12">
                  <table id="myProjectTable" class="table table-hover align-middle mb-0 nowrap dataTable no-footer dtr-inline collapsed" style="width: 100%;" role="grid" aria-describedby="myProjectTable_info">
                    <thead>
                      <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 57.2px;" aria-sort="ascending" aria-label="Id: activate to sort column descending">SL</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 57.2px;" aria-sort="ascending" aria-label="Id: activate to sort column descending">পেজের নাম</th>
                        <th class="dt-body-right sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Actions: activate to sort column ascending">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    


                        @foreach ($position as $key=>$data )
                            
                      

                      <tr role="row" class="even">
                        <td tabindex="0" class="sorting_1">
                          <strong> {{ ++$key }}</strong>
                          
                        </td>
                        <td tabindex="0" class="sorting_1">
                          <strong>{{ $data->name }}</strong>
                         
                        </td>
                        
                        <td class=" dt-body-right" style="display: none;">
                          <div class="btn-group" role="group" aria-label="Basic outlined example">
                            {{-- <a href="#" class="btn btn-outline-secondary">
                              <i class="icofont-tools-alt-2 text-success"></i>
                            </a> --}}
                            <a href="{{ route('position.destroy',$data->id) }}" onclick="confirmation(event)" class="btn btn-outline-secondary deleterow">
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

{{-- //__Delete Btn confirmation__// --}}

{{-- aita <a> tag e add kortte hove =/ onclick="confirmation(event)" / --}}
  <script>
   
    function confirmation(ev){
    
      ev.preventDefault();
     
      var urlToRedirect = ev.currentTarget.getAttribute('href');
   
        Swal.fire({
          title: 'আপনি নিশ্চিত?',
          text: "আপনি এটি পুনরুদ্ধার করতে পারবেন না!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'হ্যাঁ, ডিলিট করুন!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = urlToRedirect;
            Swal.fire(
                'ডিলিটেড!',
                'সম্পন্ন হয়েছে.',
                'success'
                     )
          }
        })

      

      
    }

  </script>



    
@endsection


