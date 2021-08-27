@extends('admin.admin_master')
@section('admincontent')


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
 
<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
<div class="section">
<div class="breadcrumbs-dark pb-0 pt-4 ml-5" id="breadcrumbs-wrapper">
<div class="container">
            <div class="row">
              <div class="col s12 m12 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Employee Monthly Salary </span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Employee Management</a>
                  </li>
                  <li class="breadcrumb-item active"> Employee Monthly Salary
                  </li>
                </ol>
              </div>
            
              </div>
</div>
</div>




  <!-- ---------------------------------------------------------------------------------------- -->
<div class="container">
            
<div class="col m12 s12 ml-10">
<div class="card light-blue">
 <div class="card-content">
    <h4 class="card-title">Employee <strong>Monthly Salary </strong></h4>
   
    <div class="row">
             
        <div class="col m12 s12">
          <div class="card gradient-45deg-light-green-cyan box-shadow-none border-round mr-1 mb-1">
            <div class="card-content light-green white-text">
          

            <div class="row ml-5">  <!--  //start 1sth row -->

                              
               

               <div class="input-field col m7 s12 mr-5">
                <input type="date" name="date" id="date" class="block mt-1 w-full" required="">
                    <label for="date" class="white-text">Attendence Date</label>
                    
                </div>

                <div class="input-field col m5 s12 ml-5">
                
                   <a id="search" class="waves-effect waves-light  btn gradient-45deg-light-blue-cyan box-shadow-none border-round mr-1 mb-1" name="search"> Search</a>  
                </div>
                       
                  




               </div>  <!--  //end 5th row -->


            <!-- //////////////////// Registration Fee Table //////////// -->

                
            <div class="row">
                <div class="col m12 s12">
                  
                <div id="DocumentResults">

                    <script id="document-template" type="text/x-handlebars-template">
                
                    <table class="bordered">
                        <thead>
                            <tr>
                                @{{{thsource}}}
                            </tr>
                        </thead>
                        <tbody>
                            @{{#each this}}
                                <tr>
                                    @{{{tdsource}}}
                                </tr>

                            @{{/each}}
                        </tbody>
                    </table>               
                
                    </script>



                </div>   <!--  // End id="DocumentResults" --> 

               </div>   <!--  // End class="col m12 s12"> -->
                
            </div>   <!--  // End class="row"> -->
              
            </div>          

          </div>
        </div>
     
    </div>
  </div>
</div>
</div>
</div> 

   
</div>

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var date = $('#date').val();
  
     $.ajax({
      url: "{{ route('employee.monthly.salary.get')}}",
      type: "get",
      data: {'date':date},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>


@endsection






