@extends('backend.admin_master')

@section('title')
About Us SMS Sosiety | SMS Sosiety Charity Foundation in Sonargaon Rangunia Chittagong Bangladesh|সমাজসেবী SMS Sosiety যুব সংগঠন সোনারগাঁও রাঙ্গুনিয়া চট্রগ্রাম বাংলাদেশ | non-profit organization
@endsection



@section('body')



  <!-- Body: Body -->
  <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
      <div class="row align-items-center">
        <div class="border-0 mb-4">
          <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
            <h3 class="fw-bold mb-0">About Us</h3>
            <span>সর্বশেষ পরিবর্তন : {{ $data->members->name }}<strong></strong></span>
          </div>
        </div>
      </div>

    
      <form action="{{ route('about.update') }}" method="POST" >
        @csrf

      <!-- Row end  -->
      <div class="row clearfix g-3">
        <div class="col-lg-4">
            <div class="card mb-3">
             
              <div class="card-body overflow-hidden">
                
                        {!!  $data->video_link  !!}
                     
                        
              </div>
            </div>
            
          </div>
        <div class="col-lg-8">
            <div class="card mb-3">
              <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                <h6 class="m-0 fw-bold"><div class="btn-outline-secondary mb-1" id="loader" type="button" disabled>
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Loading...
              </div></h6>
              </div>
              <div class="card-body">
               
                  <div class="row g-3 align-items-center">
                    <div class="col-md-12 mb-4">
                      <label class="form-label">Description :</label>
                        <textarea id="editor" placeholder="desctiption" name="desctiption">{!! $data->desctiption !!}</textarea>
                        </div>
                        <hr>
                    <div class="col-md-12">
                      <label class="form-label">Video Link :</label>
                        <textarea class="bg-primary-gradient border-gray-400" id="editor" rows="5" cols="90" name="video_link">{!! $data->video_link !!}</textarea>
                    </div>
                    
                   
                    
                   
                  </div>
                  <button type="submit" class="btn btn-primary mt-4 text-uppercase px-5" id="loaderBTN">Update</button>
             
              </div>
            </div>
          </div>
      <!-- Row End -->

      </div>
      <!-- Row End -->
    </form>

  


  </div>
 

  
 
     

@endsection


{{-- --------SCRIPT AND STYLE FOR THIS PAGE------------------- --}}



@section('script')


<script>

   $("#loader").hide();

   $("#loaderBTN").click(function(){
     $("#loader").show();
   });

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
