@extends('admin.admin_master')
@section('admincontent')
<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span> Employee Salary  </span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Employee Management</a>
                  </li>
                  <li class="breadcrumb-item active">  Employee Salary
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
                  <h4 class="card-title"><u>Employee Salary Details</u></h4>
                  <h6><strong> Name : </strong> <b style="color:blue;">{{ $details->name }}</b></h6>
                  <h6><strong> Designation : </strong><b style="color:blue;">{{ $details['designation']['title'] }}</b></h6>
                  <h6><strong> ID : </strong><b style="color:blue;">{{ $details->id_no }}</b></h6>
                 <div class="row mt-2">
                     <div class="col s12">
                     <table class="bordered">
                        <thead>
                           <tr>
                           <th>SL</th>
                                      
                           <th>Previous Selary </th>
                           <th> Increment Salary</th>
                           <th>Present Salary </th>                        
                           <th>Increment Effected Date </th>
                       
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($salary_log as $key=> $log) 
                           <tr>
                           <td>{{ $key+1 }}</td>
                           <td>{{ $log->previous_salary  }}</td>
                           <td>{{ $log->increment_salary  }}</td>
                           <td>{{ $log->present_salary  }}</td>
                           <td>{{ date('d-m-Y',strtotime( $log->effected_salary))  }}</td>
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






