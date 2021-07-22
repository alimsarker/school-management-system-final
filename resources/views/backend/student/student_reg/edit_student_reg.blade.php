@extends('admin.admin_master')
@section('admincontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span>Student Registration</span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Student Management</a>
                  </li>
                  <li class="breadcrumb-item active"> Student Registration
                  </li>
                </ol>
              </div>
            
            </div>
          </div>
        </div>

<div class="section">
<div class="col s12 m12">
      <div id="Form-advance" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Edit Student </h4>
          <form method="POST" action="{{ route('student.reg.update',$editdata->student_id ) }}" enctype="multipart/form-data"> @csrf

                    <input   type="hidden" name="id" value="{{ $editdata->id }}">
                              
                <div class="row">
                      
                        
                        <div class="input-field col m4 s12">
                            <input   type="text" name="name" class="block mt-1 w-full" required="" value="{{ $editdata['student']['name'] }}">
                            <label for="name">Student Name </label>
                          
                        </div>

                        <div class="input-field col m4 s12">
                            <input   type="text" name="fname" class="block mt-1 w-full" required="" value="{{ $editdata['student']['fname'] }}">
                            <label for="fname">Father's Name </label>
                          
                        </div>

                        <div class="input-field col m4 s12">
                            <input   type="text" name="mname" class="block mt-1 w-full" required="" value="{{ $editdata['student']['mname'] }}">
                            <label for="mname">Mother's Name </label>
                           
                        </div>
                    </div><!--  //end 1st row -->
                <div class="row">  <!--  //start 2nd row -->
                     
                        
                        <div class="input-field col m4 s12">
                            <input   type="text" name="mobile" class="block mt-1 w-full" required="" value="{{ $editdata['student']['mobile'] }}">
                            <label for="mobile">Mobile Number </label>
                          
                        </div>

                        <div class="input-field col m4 s12">
                            <input   type="text" name="address" class="block mt-1 w-full" required="" value="{{ $editdata['student']['address'] }}">
                            <label for="address">Address</label>
                          
                        </div>

                        <div class="input-field col m4 s12">
                          <select name="gender"   class="block mt-1 w-full">
                            <option value="" disabled selected>Choose Gender</option>
                            <option value="Male" {{ ($editdata['student']['gender'] == "Male")? "selected":"" }}>Male</option>
                            <option value="Female" {{ ($editdata['student']['gender'] == "Female")? "selected":"" }}>Female</option>
                            
                            </select>
                            <label>Select  Gender</label>
                        </div>
                </div>  <!--  //end 2nd row -->

                <div class="row">  <!--  //start 3rd row -->

                
                        <div class="input-field col m4 s12">
                          <select name="religion"   class="block mt-1 w-full">
                            <option value="" disabled selected>Choose Religion</option>
                            <option value="Islam" {{ ($editdata['student']['religion'] == "Islam")? "selected":"" }}>Islam</option>
                            <option value="Hindu" {{ ($editdata['student']['religion'] == "Hindu")? "selected":"" }}>Hindu</option>
                            <option value="Christian" {{ ($editdata['student']['religion'] == "Christian")? "selected":"" }}>Christian</option>
                            <option value="Buddhist" {{ ($editdata['student']['religion'] == "Buddhist")? "selected":"" }}>Buddhist</option>
                            
                            </select>
                            <label>Select  Religion</label>
                        </div>
                     
                            <div class="input-field col m4 s12">
                            <input type="text" name="dob" class="datepicker" id="dob" value="{{ $editdata['student']['dob'] }}">
                            <label for="dob" class="">Date Of Birth</label>
                            </div>
                        

                        <div class="input-field col m4 s12">
                            <input id="discount" type="text" name="discount" class="block mt-1 w-full" required="" value="{{ $editdata['discount']['discount'] }}">
                            <label for="discount">Discount</label>
                          
                        </div>

                </div>  <!--  //end 3rd row -->

                <div class="row">  <!--  //start 4th row -->

                
                        <div class="input-field col m4 s12">
                          <select name="year_id"  class="block mt-1 w-full">
                            <option value="" disabled selected>Choose Year</option>
                            @foreach($years as $year)
                            <option value="{{ $year->id}}" {{ ($editdata->year_id == $year->id)? "selected":"" }}>{{ $year->year}}</option>
                            @endforeach
                            
                            </select>
                            <label>Select  Year</label>
                        </div>
                     
                        <div class="input-field col m4 s12">
                          <select name="class_id"   class="block mt-1 w-full">
                            <option value="" disabled selected>Choose Class</option>
                            @foreach($classes as $class)
                            <option value="{{ $class->id}}" {{ ($editdata->class_id == $class->id)? "selected":"" }}>{{ $class->name}}</option>
                            @endforeach
                            
                            </select>
                            <label>Select  Class</label>
                        </div>
                        

                        <div class="input-field col m4 s12">
                          <select name="group_id" class="block mt-1 w-full">
                            <option value="" disabled selected>Choose Group</option>
                            @foreach($groups as $group)
                            <option value="{{ $group->id}}" {{ ($editdata->group_id == $group->id)? "selected":"" }}>{{ $group->group}}</option>
                            @endforeach
                            
                            </select>
                            <label>Select  Group</label>
                        </div>

                </div>  <!--  //end 4th row -->

                <div class="row">  <!--  //start 5th row -->

                
                        <div class="input-field col m4 s12">
                          <select name="shift_id"  class="block mt-1 w-full">
                            <option value="" disabled selected>Choose Shift</option>
                            @foreach($shifts as $shift)
                            <option value="{{ $shift->id}}"  {{ ($editdata->shift_id == $shift->id)? "selected":"" }}>{{ $shift->shift_name}}</option>
                            @endforeach
                            
                            </select>
                            <label>Select  Shift</label>
                        </div>
                     
                        <div class="col m4 s12 file-field input-field">
                            <div class="btn float-left">
                            <span>Picture</span>
                            <input type="file" name="image" id="image">
                            </div>
                            <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                            </div>
                      
                            </div>

                        <div class="col m4 s12 file-field input-field float-right mb-5"> 
                            
                       
                      <img id="showAdminImage" class="responsive-img mb-5" src="{{ (!empty($editdata['student']['image']))? url('/upload/student_images/'.$editdata['student']['image']) : url('/storage/profile-photos/no_image.jpg') }}" style="height:64px; width:64px;">
                         
                      </div> 
                
             
            

                </div>  <!--  //end 5th row -->
          
            
              <div class="row  mb-5 mr-5">
                <!-- <div class="input-field col s12"> -->
                  <button class="btn cyan waves-effect waves-light right" type="submit" value="Update" name="action">Update
                    <i class="material-icons right">send</i>
                  </button>
                <!-- </div> -->
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  </div>     
</div>
</div>

<script type="text/javascript">
   $(document).ready(function(){
        $('#image').change(function(e){
           var reader = new FileReader();
           reader.onload = function(e){
               $('#showAdminImage').attr('src',e.target.result);
           }
           reader.readAsDataURL(e.target.files['0']);
       });
   });

</script>


@endsection