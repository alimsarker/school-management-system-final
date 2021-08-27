<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  

    <title>PABNA POLICELINE SCHOOL | DATABASE-SYSTEMS</title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('for_test/backend/css/vendors_css.css') }}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('for_test/backend/css/style.css') }}">


</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary" style="background-color:cornflowerblue;">
<div class="wrapper">

 
  
 
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
			<!-- <div class="mr-auto">
					<h3 class="page-title">Data Tables</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Tables</li>
								<li class="breadcrumb-item active" aria-current="page">Data Tables</li>
							</ol>
						</nav>
					</div>
				</div> -->
			</div>
		</div>

		                                    <!-- Main content -->

		<section class="content">
		  <div class="row">
			  
		

			


<div class="col-md-12">
     <div class="container-full">
       <!-- Content Header (Page header) -->
   

<section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title"> Student  Subjective Mark Entry</h4>
             <a href="{{  route('dashboard') }}" class="float-right">Back Dashboard</a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">

    <form method="post" action="{{ route('assign.subject.store') }}">
        @csrf
        <div class="row">



<div class="col-md-3">

 		 <div class="form-group">
		<h5>Year <span class="text-danger"> </span></h5>
		<div class="controls">
	 <select name="year_id" id="year_id" required="" class="form-control">
			<option value="" selected="" disabled="">Select Year</option>
      @foreach($years as $year)
      <option value="{{ $year->id}}">{{ $year->year}}</option>
      @endforeach
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 3 --> 



 			
 		<div class="col-md-3">

 		 <div class="form-group">
		<h5>Class <span class="text-danger"> </span></h5>
		<div class="controls">
	 <select name="class_id" id="class_id"  required="" class="form-control">
			<option value="" selected="" disabled="">Select Class</option>
      @foreach($classes as $class)
      <option value="{{ $class->id }}" >{{ $class->name}}</option>
      @endforeach
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 3 --> 


 		<div class="col-md-3">

 		 <div class="form-group">
		<h5>Subject <span class="text-danger"> </span></h5>
		<div class="controls">
	 <select name="assign_subject_id" id="assign_subject_id"  required="" class="form-control">
			<option  selected="" >Select Subject</option>
			  
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 3 --> 


                        <div class="col-md-3">

                            <div class="form-group">
                            <h5>Exam Type <span class="text-danger"> </span></h5>
                            <div class="controls">
                        <select name="exam_type_id" id="exam_type_id"  required="" class="form-control">
                              <option value="" selected="" disabled="">Select Class</option>
                              @foreach($exam_types as $exam)
                              <option value="{{ $exam->id }}">{{ $exam->exam_type_name }}</option>
                              @endforeach
                              
                            </select>
                            </div>		 
                            </div>
                            
                              </div> <!--  End Col md 3  -->





 			<div class="col-md-3"  >

  <a id="search" class="btn btn-primary" name="search"> Search</a>
	  
 			</div> <!-- End Col md 3 --> 		
			</div><!--  end row --> 


 <!--  ////////////////// Mark Entry table /////////////  -->


 <div class="row d-none" id="marks-entry">
 	<div class="col-md-12">
 		<table class="table table-bordered table-striped" style="width: 100%">
 			<thead>
 				<tr>
 					<th>ID No</th>
 					<th>Student Name </th>
 					<th>Father Name </th>
 					<th>Gender</th>
 					<th>Marks</th>
 				 </tr> 				
 			</thead>
 			<tbody id="marks-entry-tr">
 				
 			</tbody>
 			
 		</table>
 <input type="submit" class="btn btn-rounded btn-primary" value="Submit">

 	</div>
 	
 </div>
                   </form>

               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </section>




     
     </div>
 </div>


 <div style="visibility: hidden;">
     <div class="whole_extra_item_add" id="whole_extra_item_add">
         <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
             <div class="form-row">

    <div class="col-md-4">

  <div class="form-group">
   <h5>Student Subject <span class="text-danger">*</span></h5>
   <div class="controls">
    <select name="subject_id[]" required="" class="form-control">
       <option value="" selected="" disabled="">Select Subject</option>
       @foreach($subject as $sub)
        <option value="{{ $sub->id }}"> {{ $sub->school_subject_name }}</option>
        @endforeach	 
       </select>
    </div>
         </div> <!-- // end form group -->
        </div> <!-- End col-md-5 -->


        <div class="col-md-2">     		
     <div class="form-group">
       <h5>Full Mark <span class="text-danger">*</span></h5>
       <div class="controls">
    <input type="text" name="full_mark[]" class="form-control" > 
     </div>		 
   </div>
        </div><!-- End col-md-5 -->

<div class="col-md-2">     		
     <div class="form-group">
       <h5>Pass Mark <span class="text-danger">*</span></h5>
       <div class="controls">
    <input type="text" name="pass_mark[]" class="form-control" > 
     </div>		 
   </div>
        </div><!-- End col-md-5 -->

        <div class="col-md-2">     		
     <div class="form-group">
       <h5>Subjective Mark <span class="text-danger">*</span></h5>
       <div class="controls">
    <input type="text" name="subjective_mark[]" class="form-control" > 
     </div>		 
   </div>
        </div><!-- End col-md-5 -->

        <div class="col-md-2" style="padding-top: 25px;">
<span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
 <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>    		
        </div><!-- End col-md-2 -->
        


                 
             </div>  			
         </div>  		
     </div>  	
 </div>




			
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
 
  <!-- Control Sidebar -->

  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

	<!-- Vendor JS -->
	<script src="{{ asset('for_test/backend/js/vendors.min.js') }}"></script>
  
	
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        var counter = 0;
        $(document).on("click",".addeventmore",function(){
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click",'.removeeventmore',function(event){
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1
        });

    });
</script>
<!--  ////////////////// for get Student Subject /////////////  -->
<!--   // for get Student Subject  -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#class_id',function(){
      var class_id = $('#class_id').val();
      $.ajax({
        url:"{{ route('marks.getsubject') }}",
        type:"GET",
        data:{class_id:class_id},
        success:function(data){
          var html = '<option value="">Select Subject</option>';
          $.each( data, function(key, v) {
            html += '<option value="'+v.id+'">'+v.student_subject.school_subject_name+'</option>';
          });
          $('#assign_subject_id').html(html);
        }
      });
    });
  });
</script>

</body>
</html>
