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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Student Monthly Fee</span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Student Management</a>
                  </li>
                  <li class="breadcrumb-item active"> Student Monthly Fee
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
    <h4 class="card-title">Student <strong>Monthly Fee</strong></h4>
   
    <div class="row">
             
        <div class="col m12 s12">
          <div class="card gradient-45deg-light-green-cyan box-shadow-none border-round mr-1 mb-1">
            <div class="card-content light-green white-text">
          

            <div class="row">  <!--  //start 1sth row -->

                              
               <div class="input-field col m3 s12">
                  <select name="year_id" id="year_id"  class="block mt-1 w-full">
                     <option value="" disabled selected>Choose Year</option>
                     @foreach($years as $year)
                     <option value="{{ $year->id}}">{{ $year->year}}</option>
                     @endforeach
                     
                     </select>
                     <label class="white-text">Select  Year</label>
               </div>

               <div class="input-field col m3 s12">
                     <select name="class_id" id="class_id"  class="block mt-1 w-full">
                        <option value="" disabled selected>Choose Class</option>
                        @foreach($classes as $class)
                        <option value="{{ $class->id }}" >{{ $class->name}}</option>
                        @endforeach
                        
                        </select>
                        <label class="white-text">Select  Class</label>
                  </div>
                  
                  <!-- // Month Name -->

                  <div class="input-field col m3 s12">
                     <select name="month" id="month"  class="block mt-1 w-full">
                        <option value="" disabled selected>Choose Month</option>
                     
                            <option value="January">January</option>
                            <option value="Febuary">Febuary</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="Jun">Jun</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option> 
                      
                        
                        </select>
                        <label class="white-text">Select  Month</label>
                  </div> 


                  <div class="input-field col m2 s12">
                
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
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    var  month = $('#month').val();
     $.ajax({
      url: "{{ route('student.monthly.fee.classwise.get')}}",
      type: "get",
      data: {'year_id':year_id,'class_id':class_id,'month':month},
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






