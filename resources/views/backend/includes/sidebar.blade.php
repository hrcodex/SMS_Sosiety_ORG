<!-- sidebar -->
<div class="sidebar px-4 py-4 py-md-4 me-0">
    <div class="d-flex flex-column h-100">
      <a href="index.html" class="mb-0 brand-icon">
        <span class="logo-icon">
          <img src="{{ asset('/') }}frontend/assets/images/HR-Codex-Ltd-Logo.png"   alt="">
        </span>
        <span class="logo-text">HRCodex LTD</span>
      </a>
      <!-- Menu: main ul -->

     

      <ul class="menu-list flex-grow-1 mt-3">
      

     
        <li>
          <a class="m-link active" href="{{ route('dashboard.default') }}">
            <i class="icofont-home fs-5"></i>
            <span>Dashboard</span>
          </a>
        </li>
     
     
        <li>
          <a class="m-link" href="{{ route('events.index') }}">
            <i class="icofont-newspaper fs-5"></i>
            <span>Events</span>
          </a>
        </li>
      
   

       
        <li>
          <a class="m-link" href="{{ route('members.index') }}">
            <i class="icofont-users fs-5"></i>
            <span>Members</span>
          </a>
        </li>
      
        <li>
          <a class="m-link" href="{{ route('donation.index') }}">
            <i class="icofont-money-bag fs-5"></i>
            <span>Donation</span>
          </a>
        </li>
        <li>
          <a class="m-link" href="{{ route('expense.index') }}">
            <i class="icofont-notebook fs-5"></i>
            <span>Expense</span>
          </a>
        </li>
      
        <li>
          <a class="m-link" href="{{ route('create_member.index') }}">
            <i class="icofont-ui-add fs-5"></i>
            <span>Member Temp</span>
          </a>
        </li>
      
        <li class="collapsed">
          <a class="m-link" data-bs-toggle="collapse" data-bs-target="#categories" href="#">
            <i class="icofont-chart-flow fs-5"></i>
            <span>Website Handling</span>
            <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
          </a>
          <!-- Menu: Sub menu ul -->
          <ul class="sub-menu collapse" id="categories">
            <li>
              <a class="ms-link" href="{{route('slider.index')}}">Sliders</a>
            </li>
            <li>
              <a class="ms-link" href="{{ route('faq.index') }}">FAQ</a>
            </li>
            <li>
              <a class="ms-link" href="{{ route('about.index') }}">About</a>
            </li>
            <li>
              <a class="ms-link" href="{{ route('motive.index') }}">Motive</a>
            </li>
            <li>
              <a class="ms-link" href="{{ route('contact.index') }}">Contact</a>
            </li>
           
          </ul>
        </li>
        <li class="collapsed">
          <a class="m-link" data-bs-toggle="collapse" data-bs-target="#settings" href="#">
            <i class="icofont-ui-settings fs-5"></i>
            <span>Settings</span>
            <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
          </a>
          <!-- Menu: Sub menu ul -->
          <ul class="sub-menu collapse" id="settings">
            <li>
              <a class="ms-link" href="{{route('position.index')}}">Position</a>
            </li>
           
          </ul>
        </li>
      
      </ul>
      <!-- Menu: menu collepce btn -->
      <button type="button" class="btn btn-link sidebar-mini-btn text-light">
        <span class="ms-2">
          <i class="icofont-bubble-right"></i>
        </span>
      </button>
    </div>
  </div>