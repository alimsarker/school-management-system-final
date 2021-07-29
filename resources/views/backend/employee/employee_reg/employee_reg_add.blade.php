@extends('admin.admin_master')
@section('admincontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span> Employee Registration  </span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Employee Management</a>
                  </li>
                  <li class="breadcrumb-item active">  Employee Registration
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
          <h4 class="card-title">Add Employee </h4>
          <form method="POST" action="{{ route('employee.reg.store') }}" enctype="multipart/form-data"> @csrf
                <div class="row">
                      
                        
                        <div class="input-field col m4 s12">
                            <input   type="text" name="name" class="block mt-1 w-full" required="">
                            <label for="name">Employee Name </label>
                          
                        </div>

                        <div class="input-field col m4 s12">
                            <input   type="text" name="fname" class="block mt-1 w-full" required="">
                            <label for="fname">Father's Name </label>
                          
                        </div>

                        <div class="input-field col m4 s12">
                            <input   type="text" name="mname" class="block mt-1 w-full" required="">
                            <label for="mname">Mother's Name </label>
                           
                        </div>
                    </div><!--  //end 1st row -->
                <div class="row">  <!--  //start 2nd row -->
                     
                        
                        <div class="input-field col m4 s12">
                            <input   type="text" name="mobile" class="block mt-1 w-full" required="">
                            <label for="mobile">Mobile Number </label>
                          
                        </div>

                        <div class="input-field col m4 s12">
                            <input   type="text" name="address" class="block mt-1 w-full" required="">
                            <label for="address">Address</label>
                          
                        </div>

                        <div class="input-field col m4 s12">
                          <select name="gender"   class="block mt-1 w-full">
                            <option value="" disabled selected>Choose Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            
                            </select>
                            <label>Select  Gender</label>
                        </div>
                </div>  <!--  //end 2nd row -->

                <div class="row">  <!--  //start 3rd row -->

                
                        <div class="input-field col m4 s12">
                          <select name="religion"   class="block mt-1 w-full">
                            <option value="" disabled selected>Choose Religion</option>
                            <option value="Islam">Islam</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Christian">Christian</option>
                            <option value="Buddhist">Buddhist</option>
                            
                            </select>
                            <label>Select  Religion</label>
                        </div>
                     
                            <div class="input-field col m4 s12">
                            <input type="date" name="dob" class="block mt-1 w-full" required="" > 
                            
                            <label for="dob" class="">Date Of Birth</label>
                            </div>
                        

                        <div class="input-field col m4 s12">
                            <input id="selary" type="text" name="selary" class="block mt-1 w-full" required="">
                            <label for="selary"> 	Selary </label>
                          
                        </div>

                </div>  <!--  //end 3rd row -->

                <div class="row">  <!--  //start 4th row -->

                
                            <div class="input-field col m3 s12">
                            <input type="date" name="join_date" class="block mt-1 w-full" required="" > 
                           
                            <label for="join_date" class="">Date Of Join</label>
                            </div>
                     
                        <div class="input-field col m3 s12">
                          <select name="designation_id"   class="block mt-1 w-full">
                            <option value="" disabled selected>Choose Designation</option>
                            @foreach($designation as $data)
                            <option value="{{ $data->id}}">{{ $data->title}}</option>
                            @endforeach
                            
                            </select>
                            <label>Select  Designation</label>
                        </div>
                        

                        <div class="col m3 s12 file-field input-field">
                            <div class="btn float-left">
                            <span>Picture</span>
                            <input type="file" name="image" id="image">
                            </div>
                            <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                            </div>
                      
                            </div>

                        <div class="col m3 s12 file-field input-field float-right mb-5"> 
                            
                       
                      <img id="showAdminImage" class="responsive-img mb-5" src="{{ url('/storage/profile-photos/no_image.jpg') }}" style="height:100px; width:100px; border: 1px solid #000000;">
                         
                      </div> 

                </div>  <!--  //end 4th row -->

              
            
              <div class="row">
                <div class="input-field col s12">
                  <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>
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