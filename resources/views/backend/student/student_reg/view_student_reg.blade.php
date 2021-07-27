@extends('admin.admin_master')
@section('admincontent')
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
  <!-- ---------------------------------------------------------------------------------------- -->
<div class="row">
            
<div class="col s12">
<div class="card light-blue">
 <div class="card-content">
    <h4 class="card-title">Student <strong>Search</strong></h4>
   
    <div class="row">
             
        <div class="col s12 m12">
          <div class="card gradient-45deg-light-green-cyan box-shadow-none border-round mr-1 mb-1">
            <div class="card-content light-green white-text">
              
            <form method="GET" action="{{ route('student.year.class.wise')}}">

            <div class="row">  <!--  //start 1sth row -->

                              
               <div class="input-field col m4 s12">
                  <select name="year_id"  class="block mt-1 w-full">
                     <option value="" disabled selected>Choose Year</option>
                     @foreach($years as $year)
                     <option value="{{ $year->id}}" {{(@$year_id == $year->id)? "selected":"" }}>{{ $year->year}}</option>
                     @endforeach
                     
                     </select>
                     <label class="white-text">Select  Year</label>
               </div>

               <div class="input-field col m4 s12">
                     <select name="class_id"   class="block mt-1 w-full">
                        <option value="" disabled selected>Choose Class</option>
                        @foreach($classes as $class)
                        <option value="{{ $class->id }}" {{(@$class_id == $class->id)? "selected":"" }}>{{ $class->name}}</option>
                        @endforeach
                        
                        </select>
                        <label class="white-text">Select  Class</label>
                  </div> 


                  <div class="input-field col m4 s12">
                  <!-- <a class="waves-effect waves-light  btn">button</a> -->
                  <input placeholder="Search" name="search" value="Search" id="first_name" type="submit" class="waves-effect waves-light  btn gradient-45deg-light-blue-cyan box-shadow-none border-round mr-1 mb-1">
                  </div>




               </div>  <!--  //end 5th row -->


            </form>

              
            </div>          

          </div>
        </div>
     
    </div>
  </div>
</div>
</div>
</div>     
      

  <!-- -------------------------------------------------------------------------------------------------- -->

      <div class="section section-data-tables">
      
         <div class="row">
            
            <div class="col s12">
               <div class="card">
               <div class="card-content">
                  <h4 class="card-title">Student Registration List</h4>
                  <a href="{{ route('student.reg.add') }}" style="float: right;" class="btn cyan waves-effect waves-light right mb-5">Add Student Registration</a>
                  <div class="row">
                     <div class="col s12">

     @if(!@search)

                     <table id="page-length-option" class="display">
                        <thead>
                           <tr>
                           <th style="width:5%">SL</th>
                           <th>Image</th>
                           <th>Name</th>
                           <th>ID NO</th>
                           <th>Roll</th>
                           <th>Year</th>
                           <th>Class</th>
                           @if(Auth::user()->role == "Admin")
                           <th>Code</th>
                          @endif
                           
                           <th style="width:15%">Action</th>
                         
                       
                         
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($allData as $key=> $data) 
                           <tr>
                           <td>{{ $key+1 }}</td>
                           <td>
<img src="{{ (!empty($data['student']['image']))? url('/upload/student_images/'.$data['student']['image']) : url('/storage/profile-photos/no_image.jpg') }}" style="height:60px; width:60px; class="responsive-img" alt="">
             
                           </td>
                           <td>{{ $data['student']['name'] }}</td>
                           <td>{{ $data['student']['id_no'] }}</td>
                           <td>{{ $data->roll }}</td>
                           <td>{{ $data['student_year']['year'] }}</td>
                           <td>{{ $data['student_class']['name'] }}</td>

                           @if(Auth::user()->role == "Admin")
                           <td>
                           
                           {{ $data['student']['code'] }}
                          
                           </td>
                           @endif
                           
                           <td>
                           <a href="{{ route('student.reg.edit', $data->student_id) }}" class="mb-6 btn-floating waves-effect waves-light gradient-45deg-amber-amber" type="submit"><i class="material-icons dp48">edit</i></a>
                    
                           <a href="{{ route('student.year.promotion', $data->student_id) }}" class="mb-6 btn-floating btn-large waves-effect waves-light gradient-45deg-purple-deep-orange"  type="submit">Promotion</a>
                           <a target="_blank" title="details" href="{{ route('student.reg.detail', $data->student_id) }}" class="mb-6 btn-floating waves-effect waves-light gradient-45deg-green-teal"  type="submit"><i class="material-icons dp48">details</i></a>
                          
                        </td>
                       
                           
                           </tr>
                           @endforeach
                        </tbody>
                        
                     </table>


      @else

                     <table id="page-length-option" class="display">
                        <thead>
                           <tr>
                           <th style="width:5%">SL</th>
                           <th>Image</th>
                           <th>Name</th>
                           <th>ID NO</th>
                           <th>Roll</th>
                           <th>Year</th>
                           <th>Class</th>
                           @if(Auth::user()->role == "Admin")
                           <th>Code</th>
                          @endif
                           
                           <th style="width:15%">Action</th>
                         
                       
                         
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($allData as $key=> $data) 
                           <tr>
                           <td>{{ $key+1 }}</td>
                           <td>
<img src="{{ (!empty($data['student']['image']))? url('/upload/student_images/'.$data['student']['image']) : url('/storage/profile-photos/no_image.jpg') }}" style="height:60px; width:60px; class="responsive-img" alt="">
             
                           </td>
                           <td>{{ $data['student']['name'] }}</td>
                           <td>{{ $data['student']['id_no'] }}</td>
                           <td>{{ $data->roll }}</td>
                           <td>{{ $data['student_year']['year'] }}</td>
                           <td>{{ $data['student_class']['name'] }}</td>

                           @if(Auth::user()->role == "Admin")
                           <td>
                           
                           {{ $data['student']['code'] }}
                          
                           </td>
                           @endif
                           
                           <td>
                           <a href="{{ route('student.reg.edit', $data->student_id) }}" class="mb-6 btn-floating waves-effect waves-light gradient-45deg-amber-amber" type="submit"> <i class="material-icons dp48">edit</i></a>
                    
                           <a href="{{ route('student.year.promotion', $data->student_id) }}" class="mb-6 btn-floating btn-large waves-effect waves-light gradient-45deg-purple-deep-orange"  type="submit">Promotion</a>
                           <a target="_blank" title="details" href="{{ route('student.reg.detail', $data->student_id) }}" class="mb-6 btn-floating waves-effect waves-light gradient-45deg-green-teal"  type="submit"><i class="material-icons dp48">details</i></a>
                            
                        </td>
                        
                          
                           </tr>
                           @endforeach
                        </tbody>
                        
                     </table>


      @endif

                     </div>
                  </div>
               </div>
               </div>
            </div>

         </div>

      </div>



   
</div>


@endsection






