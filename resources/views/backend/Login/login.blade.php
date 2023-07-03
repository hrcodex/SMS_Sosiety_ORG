@extends('backend.admin_master')

@section('title')
    Login
@endsection



@section('body')



 <!-- Body: Body -->
 <div class="body d-flex p-0 p-xl-5">
  <div class="container-xxl ">
    <div class="row g-0 ">
      {{-- <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
        <div style="max-width: 25rem;">
          <div class="text-center mb-5">
            <i class="bi bi-bag-check-fill  text-primary" style="font-size: 90px;"></i>
          </div>
          <div class="mb-5">
            <h2 class="color-900 text-center">A few clicks is all it takes.</h2>
          </div>
          <!-- Image block -->
          <div class="">
            <img src="{{ asset('/') }}backend/assets/images/login-img.svg" alt="login-img">
          </div>
        </div>
      </div> --}}
      {{-- <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100"> --}}

        
        <div class="w-100  p-3  p-md-5 card border-0 shadow-sm m-auto" style="max-width: 32rem;">
          <!-- Form -->
       
            <div class="col-12 text-center mb-5">

              <h1>Sign in</h1>

              {{-- alert Error Message --}}
              
              @if ($errors->any())
                @foreach ($errors->all() as $error)
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>  {{ $error?"Please Provide Valid Information":'' }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                @endforeach
            @endif
             
            </div>

            <form class="row g-1 p-3 p-md-4" method="POST" action="{{ route('login') }}">
              @csrf
          
            <div class="col-12">
              <div class="mb-2">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" placeholder="name@example.com" required>
              </div>
            </div>
            <div class="col-12">
              <div class="mb-2">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control form-control-lg" placeholder="***************" required>
              </div>
            </div>
          
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="flexCheckDefault">
                <label  class="form-check-label" for="flexCheckDefault" > Remember me </label>
              </div>
            </div>
            <div class="col-12 text-center mt-4">
              <button type="submit" class="btn btn-lg btn-success lift text-uppercase" >SIGN IN</button>
            </div>
          
          </form>
          <!-- End Form -->
        </div>
      </div>
    </div>
    <!-- End Row -->
  </div>
</div>

@endsection


{{-- --------SCRIPT AND STYLE FOR THIS PAGE------------------- --}}


    



