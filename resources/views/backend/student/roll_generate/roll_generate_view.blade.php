@extends('admin.admin_master')
@section('admincontent')


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
 
<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
<div class="section">
<div class="breadcrumbs-dark pb-0 pt-4 ml-5" id="breadcrumbs-wrapper">
<div class="container">
            <div class="row">
              <div class="col s12 m12 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Student Roll Generate</span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Student Management</a>
                  </li>
                  <li class="breadcrumb-item active"> Student Roll Generate
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
    <h4 class="card-title">Student <strong>Roll Generate  </strong></h4>
   
    <div class="row">
             
        <div class="col m12 s12">
          <div class="card gradient-45deg-light-green-cyan box-shadow-none border-round mr-1 mb-1">
            <div class="card-content light-green white-text">
              
            <form method="POST" action="{{ route('roll.generate.store')}}">
                @csrf

            <div class="row">  <!--  //start 1sth row -->

                              
               <div class="input-field col m8 s12">
                  <select name="year_id" id="year_id"  class="block mt-1 w-full">
                     <option value="" disabled selected>Choose Year</option>
                     @foreach($years as $year)
                     <option value="{{ $year->id}}">{{ $year->year}}</option>
                     @endforeach
                     
                     </select>
                     <label class="white-text">Select  Year</label>
               </div>

               <div class="input-field col m8 s12">
                     <select name="class_id" id="class_id"  class="block mt-1 w-full">
                        <option value="" disabled selected>Choose Class</option>
                        @foreach($classes as $class)
                        <option value="{{ $class->id }}" >{{ $class->name}}</option>
                        @endforeach
                        
                        </select>
                        <label class="white-text">Select  Class</label>
                  </div> 


                  <div class="input-field col m6 s12">
                
                   <a id="search" class="waves-effect waves-light  btn gradient-45deg-light-blue-cyan box-shadow-none border-round mr-1 mb-1" name="search"> Search</a>  
                </div>




               </div>  <!--  //end 5th row -->


            <!-- //////////////////// Roll Generate Table //////////// -->

                
            <div class="row d-none"  id="roll-generate">
                <div class="col m12 s12">
                    <table class="bordered">
                        <thead>
                            <tr>
                                <th>ID No</th>
                                <th>Student Name </th>
                                <th>Father Name </th>
                                <th>Gender</th>
                                <th>Roll</th>
                            </tr> 				
                        </thead>
                        <tbody id="roll-generate-tr">
                            
                        </tbody>
                        
                    </table>
                    
                </div>
                
            </div>

            <input type="submit" class="mb-6 btn waves-effect waves-light purple lightrn-1" value="Roll Generator">
            







            </form>

              
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
     $.ajax({
      url: "{{ route('student.registration.getstudents')}}",
      type: "GET",
      data: {'year_id':year_id,'class_id':class_id},
      success: function (data) {
        $('#roll-generate').removeClass('d-none');
        var html = '';
        $.each( data, function(key, v){
          html +=
          '<tr>'+
          '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
          '<td>'+v.student.name+'</td>'+
          '<td>'+v.student.fname+'</td>'+
          '<td>'+v.student.gender+'</td>'+
          '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"></td>'+
          '</tr>';
        });
        html = $('#roll-generate-tr').html(html);
      }
    });
  });

</script>
@endsection






