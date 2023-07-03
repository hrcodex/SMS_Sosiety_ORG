{{-- <link rel="icon" href="{{ asset('/') }}backend/assets/images/favicon-32x32.png" type="image/x-icon"/> --}}
<!-- Favicon-->
<!-- plugin css file  -->
<link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/datatables/responsive.dataTables.min.css" />
<link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/datatables/dataTables.bootstrap5.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<!-- project css file  -->
<link rel="stylesheet" href="{{asset('/')}}backend/assets/css/ebazar.style.min.css" />
<link rel="stylesheet" href="{{asset('/')}}backend/assets/fonts/icofont/fonts/icofont.woff" />
<link href="{{asset('/')}}backend/assets/icofont/icofont.css" rel="stylesheet" type="text/css"/> 
<style>
    @font-face {font-family: "IcoFont";  } 
</style>

{{-- jquery cdn --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

{{-- pdf-exal tavle data save --}}
<link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/datatables/tableHTMLExport.js" />


{{-- Toaster Alert CSS --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.11/sweetalert2.min.css" integrity="sha512-t00UpSiOSq/o/rWkM0Fv+aD9FjlOzEEc4qLqvGqh0Do1RgvMEKmUYYo5Yb8Te77ux9wkTdoDVD0vwQLJMRLZCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css"/>

{{-- CSRF Token For Ajax POST Request--}}
<meta name="_token" content="{{ csrf_token() }}">
