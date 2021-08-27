@extends('admin.admin_master')
@section('admincontent')



<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span> Employee Attendance  </span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Employee Management</a>
                  </li>
                  <li class="breadcrumb-item active">  Employee Attendance 
                  </li>
                </ol>
              </div>
            
            </div>
          </div>
        </div>
<div class="section">
  

      <div class="section section-data-tables">
      
         <div class="row">
            <div class="col s12">
               <div class="card">
               <div class="card-content">
                  <h4 class="card-title">Employee Attendance  </h4>
                  <a href="{{ route('employee.attendance.add') }}" style="float: right;" class="btn cyan waves-effect waves-light right mb-5">Add Employee Attendance</a>
                  <div class="row">
                     <div class="col s12">
                     <table class="bordered">
                        <thead>
                           <tr>
                           <th style="width:10%;  text-align:center;">SL</th>
                                                 
                         
                           
                           <th style="width:50%; text-align:center;"> Date</th>
                        
                         
                           
                           <th style="width:30%;  text-align:center;">Action</th>
                         
                       
                         
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($allData as $key=> $value) 
                           <tr>
                           <td style="width:10%;  text-align:center;">{{ $key+1 }}</td>
                         
                          
                           <td style="width:50%;  text-align:center;">{{ date('d-m-Y',strtotime( $value->date ))  }}</td>
                           
                            
                         
                          
                           
                           <td style="width:30%;  text-align:center;">
                           <a href="{{ route('employee.attendence.edit', $value->date) }}" class="btn cyan waves-effect waves-light" type="submit">Edit</a>
                    
     <a target="_blank" class="btn mb-1 waves-effect waves-light " type="submit" href="{{ route('employee.attendence.details', $value->date) }}">Details
                  <i class="material-icons right">send</i>
                                    </a>
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


      </div>
   
</div>


@endsection






