@extends('backend.admin_master')

@section('title')
Monthly Fee Report SMS Sosiety | SMS Sosiety Charity Foundation in Sonargaon Rangunia Chittagong Bangladesh|সমাজসেবী SMS Sosiety যুব সংগঠন সোনারগাঁও রাঙ্গুনিয়া চট্রগ্রাম বাংলাদেশ | non-profit organization
@endsection



@section('body')



 <!-- Body: Body -->
 <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
      <div class="row align-items-center">
        <div class="border-0 mb-4">
          <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">

        
            <div class="btn-group " role="group" aria-label="Basic mixed styles example">
              <a href="{{route('monthlyFees.index')}}" class="btn text-white " style="background:#9479ed ">All</a>
              <a href="{{route('monthlyFees.filter',$id=1)}}" class="btn text-white" style="background:#7056c7 ">Day</a>
              <a href="{{route('monthlyFees.filter',$id=2)}}" class="btn text-white" style="background:#50399e ">Month</a>
              <a href="{{route('monthlyFees.filter',$id=3)}}" class="btn text-white" style="background:#37237a ">Year</a>
              <a class="btn border-primary ">Total : <span class="text-dark text-bold"  style="font-weight: 700">{{ $SumAmount }}</span> টাকা</a>
              
          </div>
            {{-- <h3 class="fw-bold mb-0">All Donation List</h3> --}}


            
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
                          <th class="sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 57.2px;" aria-label="Items: activate to sort column ascending">Amount</th>
                         
                     
                         
                          <th class="sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 115.2px;" aria-label="Purchase Status: activate to sort column ascending">Position</th>
                          <th class="sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 115.2px;" aria-label="Purchase Status: activate to sort column ascending">Donate Date</th>
                          <th class="sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 115.2px;" aria-label="Purchase Status: activate to sort column ascending">Entry Date</th>
                          <th class="dt-body-right sorting" tabindex="0" aria-controls="myProjectTable" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Actions: activate to sort column ascending">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      


                        @foreach ($monthlyFee as $key=>$data )
                          
                      

                        <tr role="row" class="even">
                          <td tabindex="0" class="sorting_1">
                            <strong><span>{{ ++$key }}.</span> {{ $data->members->name }}</strong>
                          </td>

                          <td><strong> {{ $data->amount }}<span>টাকা</span></strong></td>


                          <td>{{ $data->members->position }} </td>

                          <td>{{ $data->payment_date }}</td>

                          <td>{{ $data->created_at->format('d M Y') }}</td>

                          
                        
                         

                          <td class=" dt-body-right" style="display: none;">
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                           
                              <a href="{{ route('monthlyFees.destroy',$data->id) }}" onclick="confirmation(event)" class="btn btn-outline-secondary deleterow deletetBTN">
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

@section('style')
{{-- <style>
  .searchbox {
    border:1px solid #456879;
    border-radius:6px;
    height: 22px;
    width: 200p;
    margin-top: 5px;
}
</style> --}}




@endsection

@section('script')

{{-- JQuery Searchable Dropdown box Start --}}
<script>

(function ($) {

$.fn.searchit = function (options) {

    return this.each(function () {

        $.fn.searchit.globals = $.fn.searchit.globals || {
            counter: 0
        }
        $.fn.searchit.globals.counter++;
        var $counter = $.fn.searchit.globals.counter;

        var $t = $(this);
        var opts = $.extend({}, $.fn.searchit.defaults, options);

        // Setup default text field and class
        if (opts.textField == null) {
            $t.before("<input type='textbox' placeholder='ডোনারের নাম লিখুন...' id='__searchit"   + $counter + "'><br>");
            opts.textField = $('#__searchit' + $counter);
        }
        if (opts.textField.length > 1) opts.textField = $(opts.textField[0]);

        if (opts.textFieldClass) opts.textField.addClass(opts.textFieldClass);
        //MY CODE-------------------------------------------------------------------
        if (opts.selected) opts.textField.val($(this).find(":selected").val());
        //MY CODE ENDS HERE -------------------------------------------------------
        if (opts.dropDown) {
            $t.css("padding", "5px")
                .css("margin", "-5px -20px -5px -5px");

            $t.wrap("<div id='__searchitWrapper" + $counter + "' />");
            opts.wrp = $('#__searchitWrapper' + $counter);
            opts.wrp.css("display", "inline-block")
                .css("vertical-align", "top")
                .css("overflow", "hidden")
                .css("border", "solid grey 1px")
                .css("position", "absolute")
                .hide();
            if (opts.dropDownClass) opts.wrp.addClass(opts.dropDownClass);
        }

        opts.optionsFiltered = [];
        opts.optionsCache = [];

        // Save listbox current content
        $t.find("option").each(function (index) {
            opts.optionsCache.push(this);
        });

        // Save options 
        $t.data('opts', opts);

        // Hook listbox click
        $t.click(function (event) {
            _opts($t).textField.val($(this).find(":selected").text());
            _opts($t).wrp.hide();
            event.stopPropagation();
        });

        // Hook html page click to close dropdown
        $("html").click(function () {
            _opts($t).wrp.hide();
        });

        // Hook the keyboard and we're done
        _opts($t).textField.keyup(function (event) {
            if (event.keyCode == 13) {
                $(this).val($t.find(":selected").text());
                _opts($t).wrp.hide();
                return;
            }
            setTimeout(_findElementsInListBox($t, $(this)), 50);
        })

    })


    function _findElementsInListBox(lb, txt) {

        if (!lb.is(":visible")) {
            _showlb(lb);
        }

        _opts(lb).optionsFiltered = [];
        var count = _opts(lb).optionsCache.length;
        var dropDown = _opts(lb).dropDown;
        var searchText = txt.val().toLowerCase();

        // find match (just the old classic loop, will make the regexp later)
        $.each(_opts(lb).optionsCache, function (index, value) {
            if ($(value).text().toLowerCase().indexOf(searchText) > -1) {
                // save matching items 
                _opts(lb).optionsFiltered.push(value);
            }

            // Trigger a listbox reload at the end of cycle    
            if (!--count) {
                _filterListBox(lb);
            }
        });
    }

    function _opts(lb) {
        return lb.data('opts');
    }

    function _showlb(lb) {
        if (_opts(lb).dropDown) {
            var tf = _opts(lb).textField;
            lb.attr("size", _opts(lb).size);
            _opts(lb).wrp.show().offset({
                top: tf.offset().top + tf.outerHeight(),
                left: tf.offset().left
            });
            _opts(lb).wrp.css("width", tf.outerWidth() + "px");
            lb.css("width", (tf.outerWidth() + 25) + "px");
        }
    }

    function _filterListBox(lb) {
        lb.empty();

        if (_opts(lb).optionsFiltered.length == 0) {
            lb.append("<option>" + _opts(lb).noElementText + "</option>");
        } else {
            $.each(_opts(lb).optionsFiltered, function (index, value) {
                lb.append(value);
            });
            lb[0].selectedIndex = 0;
        }
    }
}

$.fn.searchit.defaults = {
    textField: null,
    textFieldClass: null,
    dropDown: true,
    dropDownClass: null,
    size: 5,
    filtered: true,
    noElementText: "No elements found",
    //MY CODE------------------------------------------
    selected: false
    //MY CODE ENDS ------------------------------------
}

}(jQuery))

$("#selectbox").searchit({
textFieldClass:'form-select',
selected: true
});

</script>
{{-- JQuery Searchable Dropdown box End --}}





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


