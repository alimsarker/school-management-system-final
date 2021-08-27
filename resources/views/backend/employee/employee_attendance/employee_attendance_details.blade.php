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
                  <h4 class="card-title">Employee Attendance Details </h4>
                   <div class="row">
                     <div class="col s12">
                     <table id="page-length-option" class="display">
                        <thead>
                           <tr>
                           <th style="width:5%">SL</th>
                           <th>Employee Name</th>
                           <th>Employee ID No</th>                         
                           <th>Designation</th>
                           
                           <th> Date</th>
                           <th>Attend Status</th>
                         
                           
                        
                         
                       
                         
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $key=> $value) 
                           <tr style="color:blue;">
                           <td>{{ $key+1 }}</td>
                         
                           <td>{{ $value['employee']['name'] }}</td>
                           <td>{{ $value['employee']['id_no'] }}</td>
                           <td>{{ $value['employee']['designation']['title'] }}</td>
                           <td>{{ date('d-m-Y',strtotime( $value->date ))  }}</td>
                            <td>{{ $value->attend_status }}</td>
                            
                         
                          
                           
                           
                          
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






