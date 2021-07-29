@extends('admin.admin_master')
@section('admincontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>





<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span> Assign Subject</span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Setup Management</a>
                  </li>
                  <li class="breadcrumb-item active">  Assign Subject
                  </li>
                </ol>
              </div>
            
            </div>
          </div>
        </div>

    <div class="section">
        <div class="col s9 m9 l9">
         <div id="Form-advance" class="card card card-default scrollspy">
            <div class="card-content">
                <h4 class="card-title">Add Assign Subject</h4>
                <form method="POST" action="{{ route('assign.subject.store') }}"> @csrf


             
                <div class="row">    

               
                        <div class="input-field col s12">

                            <div class="" id="add_item">

                                        <div class="input-field">
                                            <select name="class_id"  class="block mt-2 w-full">
                                            <option value="">Choose Student Class</option>
                                            @foreach($classes as $class)
                                            <option value="{{ $class->id }}"> {{ $class->name }}</option>
                                            @endforeach
                                            
                                            </select>
                                            <label>Select Student Class</label>
                                        
                                        </div>

                                 
                

                                <div class="row">  

                                    <div class="input-field col s3">
                                    <div class="input-field">
                                    <select name="subject_id[]"  class="block mt-1 w-full">
                                    <option value="" disabled selected>Choose Subject  Type</option>
                                    @foreach($subject as $sub)
                                    <option value="{{ $sub->id }}"> {{ $sub->school_subject_name }}</option>
                                    @endforeach
                                    
                                    </select>
                                    <label>Select Subject  Type</label>
                                
                                    </div>
                                       
                                    </div>

                                                            
                                        
                                    <div class="input-field col s2 mt-3">
                                        <input  type="text" name="full_mark[]" class="block mt-1 w-full">
                                        <label for="full_mark">Full Mark </label>
                                      
                                    </div>
                                    <div class="input-field col s2 mt-3">
                                        <input  type="text" name="pass_mark[]" class="block mt-1 w-full">
                                        <label for="pass_mark ">Pass Mark </label>
                                      
                                    </div>
                                    <div class="input-field col s2 mt-3">
                                        <input  type="text" name="subjective_mark[]" class="block mt-1 w-full">
                                        <label for="subjective_mark">Subjective Mark </label>
                                      
                                    </div>


                                    <div class="input-field col s2">
                                        <span class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow addeventmore"><i class="material-icons">add_circle</i></span>
                                                            
                                    </div>
                                
                                </div>
                    
                            </div>  <!-- //End add_item -->
           


                            <div class="row">  
                    
                                <div class="input-field col s12">
                                    <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>  <!-- //End Submit Row -->
                        </div> <!-- //End input-field col s12 -->
                
                    </div>  <!-- //End  Row -->
                </form>  <!-- //End  form -->
            </div>  <!-- //End  card-content -->
        </div> <!-- End id="Form-advance"  -->
    </div>  <!---- End div class="col s9 m9 l9" --->
</div>  <!----- End div class="section" --->



 

<div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">

                                    <div class="input-field col s3">
                                    <div class="input-field">
                                    <select name="subject_id[]"  class="block mt-1 w-full">
                                    <option value="" disabled selected>Choose Subject  Type</option>
                                    @foreach($subject as $sub)
                                    <option value="{{ $sub->id }}"> {{ $sub->school_subject_name }}</option>
                                    @endforeach
                                    
                                    </select>
                                    <label>Select Subject  Type</label>
                                
                                    </div>
                                       
                                    </div>

                                                            
                                        
                                    <div class="input-field col s2 mt-3">
                                        <input  type="text" name="full_mark[]" class="block mt-1 w-full">
                                        <label for="full_mark">Full Mark </label>
                                      
                                    </div>
                                    <div class="input-field col s2 mt-3">
                                        <input  type="text" name="pass_mark[]" class="block mt-1 w-full">
                                        <label for="pass_mark ">Pass Mark </label>
                                      
                                    </div>
                                    <div class="input-field col s2 mt-3">
                                        <input  type="text" name="subjective_mark[]" class="block mt-1 w-full">
                                        <label for="subjective_mark">Subjective Mark </label>
                                      
                                    </div>



                    <div class="input-field col s2">
                        <span class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow addeventmore"><i class="material-icons">add_circle</i></span>
                        <span class="btn-floating btn-large gradient-45deg-light-red-cyan gradient-shadow removedeventmore"><i class="material-icons">remove_circle</i></span>
                                                     
                    </div>
                
                </div>
        
            </div>

        </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var counter = 0;
        $(document).on("click",".addeventmore",function(){
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest("#add_item").append(whole_extra_item_add);
            counter++;

        });
        $(document).on("click",".removedeventmore",function(event){ 
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1
         });

    });

</script>
@endsection