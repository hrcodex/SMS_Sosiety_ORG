<html class="no-js" lang="en" dir="ltr">
  <head>
  
    @include('backend.includes.meta')
    
    <title>@yield('title')</title>
    
    @include('backend.includes.style')
    @yield('style')
    
    {{-- @include('backend.includes.top_script') --}}

  </head>
  <body>
    <div id="ebazar-layout" class="theme-blue">
      <!-- sidebar -->
     @auth
     @include('backend.includes.sidebar')
     @endauth
    

      <!-- main body area -->
      <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
        @auth
        @include('backend.includes.header')
        @endauth
      

        <!-- Body: Body -->
      @yield('body')

    </div>

    @include('backend.includes.script')
    @yield('script')


    {{-- Tost Message --}}
    <script>

      @if (Session::has('messege'))
      var type = "{{ Session::get('alert-type','info') }}"
      switch(type){
        case 'info':
          toastr.info("{{ Session::get('messege') }}");
          break;
        case 'success':
          toastr.success("{{ Session::get('messege') }}");
          break;
        case 'warning':
          toastr.warning("{{ Session::get('messege') }}");
          break;
        case 'error':
          toastr.error("{{ Session::get('messege') }}");
          break;
      }
        
      @endif

    </script>

   

    
  




  </body>
  <grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>
</html>
