@extends('backend.admin_master')

@section('title')
    Dashboard
@endsection

@section('body')



<div class="body d-flex py-3">
    <div class="container-xxl">
      <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">

        <div class="col">
          <div class="alert-success alert mb-0">
            <div class="d-flex align-items-center">
              <div class="avatar rounded no-thumbnail bg-dark text-light">
                <i class="icofont-users-social fs-4"></i>
              </div>
              <div class="flex-fill ms-3 text-truncate">
                <div class="h6 mb-0">Total Members</div>
                <span class="small">{{ count($total_member) }} জন</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="alert-warning alert mb-0">
            <div class="d-flex align-items-center">
              <div class="avatar rounded no-thumbnail bg-gray-500 text-primary">
                <i class="icofont-user-suited fs-4"></i>
              </div>
              <div class="flex-fill ms-3 text-truncate">
                <div class="h6 mb-0">Total Donor</div>
                <span class="small">{{ count($total_donner) }} জন</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="alert-info alert mb-0">
            <div class="d-flex align-items-center">
              <div class="avatar rounded no-thumbnail bg-gradient text-black">
                <i class="icofont-user fs-4"></i>
              </div>
              <div class="flex-fill ms-3 text-truncate">
                <div class="h6 mb-0">Total Admin</div>
                <span class="small">{{ count($total_admin) }} জন</span>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="col">
          <div class="alert-dark alert mb-0">
            <div class="d-flex align-items-center">
              <div class="avatar rounded no-thumbnail bg-success text-light">
                <i class="icofont-ui-user-group fs-4"></i>
              </div>
              <div class="flex-fill ms-3 text-truncate">
                <div class="h6 mb-0">Associate</div>
                <span class="small">{{ count($user_associate); }} জন</span>
              </div>
            </div>
          </div>
        </div>
         --}}
       
       
      </div>
     
      <!-- Row end  -->
      <div class="row g-3">
        <div class="col-lg-12 col-md-12">
          <div class="tab-filter d-flex align-items-center justify-content-between mb-3 flex-wrap ">
            <div class="btn-group " role="group" aria-label="Basic mixed styles example">
              <a href="{{route('dashboard.default')}}" class="btn text-white " style="background:#9479ed ">All</a>
              <a href="{{route('dashboard.index',$id=2)}}" class="btn text-white" style="background:#7056c7 ">Day</a>
              <a href="{{route('dashboard.index',$id=3)}}" class="btn text-white" style="background:#50399e ">Month</a>
              <a href="{{route('dashboard.index',$id=4)}}" class="btn text-white" style="background:#37237a ">Year</a>
              <a class="btn border-primary ">Filter By : <span class="text-dark text-bold"  style="font-weight: 700">{{ $filter_by }}</span></a>
              
          </div>
          </div>
         
              <div class="row g-1 g-sm-3 mb-3 row-deck">

                {{-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                  <div class="card">
                    <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                      <div class="left-info">
                        <span class="text-muted">আজকের বিক্রিত পণ্য</span>
                        <div>
                        
                          <span class="fs-6 fw-bold me-2 ">{{ $total_sales_amount; }}</span>
                        
                        </div>
                      </div>
                      <div class="right-icon">
                        <i class="icofont-student-alt fs-3 color-light-orange"></i>
                      </div>
                    </div>
                  </div>
                </div> --}}
            
               
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                  <div class="card">
                    <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                      <div class="left-info">
                        <span class="text-muted">Total Amount</span>
                        <div>
                          <span class="fs-6 fw-bold me-2">{{ $in_total_amount }}</span>
                        </div>
                      </div>
                      <div class="right-icon">
                        <i class="icofont-bag fs-3 color-light-orange"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                  <div class="card">
                    <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                      <div class="left-info">
                        <span class="text-muted">Current Amount</span>
                        <div>
                          <span class="fs-6 fw-bold me-2">{{ $current_amount }}</span>
                        </div>
                      </div>
                      <div class="right-icon">
                        <i class="icofont-shopping-cart fs-3 color-lavender-purple"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                  <div class="card">
                    <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                      <div class="left-info">
                        <span class="text-muted">Total Fees</span>
                        <div>
                          <span class="fs-6 fw-bold me-2">{{ $total_monthly_fees }}</span>
                        </div>
                      </div>
                      <div class="right-icon">
                        <i class="icofont-calculator-alt-2 fs-3 color-danger"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                  <div class="card">
                    <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                      <div class="left-info">
                        <span class="text-muted">Total Donation</span>
                        <div>
                          <span class="fs-6 fw-bold me-2 ">{{ $total_donation }}</span>
                        </div>
                      </div>
                      <div class="right-icon">
                        <i class="icofont-sale-discount fs-3 color-santa-fe"></i>
                      </div>
                    </div>
                  </div>
                </div>
               
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                  <div class="card">
                    <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                      <div class="left-info">
                        <span class="text-muted">Total Expense</span>
                        <div>
                          <span class="fs-6 fw-bold me-2">{{ $total_expense }}</span>
                        </div>
                      </div>
                      <div class="right-icon">
                        <i class="icofont-handshake-deal fs-3 color-lavender-purple"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                  <div class="card">
                    <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                      <div class="left-info">
                        <span class="text-muted">Total Complet Projects</span>
                        <div>
                          <span class="fs-6 fw-bold me-2">{{ count($total_project) }}</span>
                        </div>
                      </div>
                      <div class="right-icon">
                        <i class="icofont-calculator-alt-1 fs-3 color-lightblue"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                  <div class="card">
                    <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                      <div class="left-info">
                        <span class="text-muted">Total Images</span>
                        <div>
                          <span class="fs-6 fw-bold me-2">{{ count($total_project) }}</span>
                        </div>
                      </div>
                      <div class="right-icon">
                        <i class="icofont-users-social fs-3 color-light-success"></i>
                      </div>
                    </div>
                  </div>
                </div>
               
                
               
                
              </div>
              <!-- row end -->
           
           
           
           
   

    </div>
  </div>

@endsection
