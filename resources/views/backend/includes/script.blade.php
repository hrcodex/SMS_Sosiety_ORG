   <!-- Jquery Core Js -->
   <script src="{{asset('/')}}backend/assets/bundles/libscripts.bundle.js"></script>

   <!-- Plugin Js -->
   <script src="{{asset('/')}}backend/assets/bundles/apexcharts.bundle.js"></script>
   <script src="{{asset('/')}}backend/assets/bundles/dataTables.bundle.js"></script>

   <!-- Jquery Page Js -->
   <script src="{{asset('/')}}backend/assets/js/template.js"></script>
   <script src="{{asset('/')}}backend/assets/js/page/index.js"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1Jr7axGGkwvHRnNfoOzoVRFV3yOPHJEU&amp;callback=myMap"></script>
   
{{-- Toaster Alert CSS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>






   <script>
     $("#myDataTable")
       .addClass("nowrap")
       .dataTable({
         responsive: true,
         columnDefs: [
           {
             targets: [-1, -3],
             className: "dt-body-right",
           },
         ],
       });
   </script>

{{-- Members Table js --}}

  <!-- Jquery Page Js -->
  <script>
    // project data table
    $(document).ready(function() {
      $('#myProjectTable').addClass('nowrap').dataTable({
        responsive: true,
        columnDefs: [{
          targets: [-1, -3],
          className: 'dt-body-right'
        }]
      });
   
    });
  </script>

{{-- Header Search Script --}}

<script>
  $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myProjectTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>



{{-- ------------------Json - PDF - CVS table data download / save--------------start----------------------- --}}

<script type="text/JavaScript">
  $("#JSON").on("click", function () {
      console.log("Json file download")
      $("#myProjectTable").tableHTMLExport({
          type: 'json',
          filename: 'Data.json'
      });
  });

  $("#PDF").on("click", function () {
      console.log("pdf file download")
      $("#myProjectTable").tableHTMLExport({
          type: 'pdf',
          filename: 'data.pdf'
      });
  });

  $("#CSV").on("click", function () {
      console.log("csv file download")
      $("#myProjectTable").tableHTMLExport({
          type: 'csv',
          filename: 'Data.csv'
      });
  });
</script>



<script src="{{asset('/')}}backend/assets/plugin/datatables/tableHTMLExport.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.11/jspdf.plugin.autotable.js"></script>



{{-- ------------------Json - PDF - CVS table data download / save--------------End----------------------- --}}
{{-- CK Text Editor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
<script>
  $(document).ready(function() {
    //Ch-editer
    ClassicEditor.create(document.querySelector('#editor')).catch(error => {
      console.error(error);
    });
    //Deleterow
    $("#tbproduct").on('click', '.deleterow', function() {
      $(this).closest('tr').remove();
    });
  });
  $(function() {
    $('.dropify').dropify();
    var drEvent = $('#dropify-event').dropify();
    drEvent.on('dropify.beforeClear', function(event, element) {
      return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });
    drEvent.on('dropify.afterClear', function(event, element) {
      alert('File deleted');
    });
    $('.dropify-fr').dropify({
      messages: {
        default: 'Glissez-dÃ©posez un fichier ici ou cliquez',
        replace: 'Glissez-dÃ©posez un fichier ou cliquez pour remplacer',
        remove: 'Supprimer',
        error: 'DÃ©solÃ©, le fichier trop volumineux'
      }
    });
  });
</script>
