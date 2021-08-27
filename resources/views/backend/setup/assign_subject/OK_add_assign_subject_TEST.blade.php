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
			  
		

			


<div class="content-wrapper">
     <div class="container-full">
       <!-- Content Header (Page header) -->
   

<section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Add Assign Subject</h4>
             <a href="{{  route('assign.subject.view') }}" class="float-right">Back Assign Subject</a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">

                          <form method="post" action="{{ route('assign.subject.store') }}">
                              @csrf
                                          <div class="row">
                                            <div class="col-12">
                                            <div class="add_item">
                                                
                                              

                          <div class="form-group">
                        <h5>Class Name <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <select name="class_id" required="" class="form-control">
                            <option value="" selected="" disabled="">Select Class</option>
                            @foreach($classes as $class)
                              <option value="{{ $class->id }}"> {{ $class->name }}</option>
                              @endforeach	 
                            </select>
                          </div>
                              </div> <!-- // end form group -->



                            <div class="row">

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
                              </div><!-- End col-md-5 -->
                              
                          </div> <!-- end Row -->

                      </div>	<!-- // End add_item -->
                                                  
                                  <div class="text-xs-right">
                      <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
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

  <!-- /.control-sidebar -->
  
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

</body>
</html>
