@extends('admin.admin_master')
@section('admincontent')



<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span> Employee Leave  </span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Employee Management</a>
                  </li>
                  <li class="breadcrumb-item active">  Employee Leave 
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
                  <h4 class="card-title">Employee Leave  </h4>
                  <a href="{{ route('employee.leave.add') }}" style="float: right;" class="btn cyan waves-effect waves-light right mb-5">Add Employee Leave</a>
                  <div class="row">
                     <div class="col s12">
                     <table id="page-length-option" class="display">
                        <thead>
                           <tr>
                           <th style="width:5%">SL</th>
                           <th>Employee Name</th>
                           <th>Employee ID No</th>                         
                         <th>Designation</th>
                           <th>Purpose</th>
                           <th>Start Date</th>
                           <th>End Date</th>
                         
                           
                           <th style="width:15%">Action</th>
                         
                       
                         
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($allData as $key=> $leave) 
                           <tr style="color:blue;">
                           <td>{{ $key+1 }}</td>
                         
                           <td>{{ $leave['employee']['name'] }}</td>
                           <td>{{ $leave['employee']['id_no'] }}</td>
                           <td>{{ $leave['employee']['designation']['title'] }}</td>
                            <td>{{ $leave['purpose']['name'] }}</td>
                            <td>{{ date('d-m-Y',strtotime( $leave->start_date))  }}</td>
                            <td>{{ date('d-m-Y',strtotime( $leave->end_date ))  }}</td>
                          
                           
                           <td>
                           <a href="{{ route('employee.leave.edit', $leave->id) }}" class="btn cyan waves-effect waves-light" type="submit">Edit</a>
                    
                           <a href="{{ route('employee.leave.delete', $leave->id) }}" class="btn btn-danger" id="delete" type="submit">Delete</a>
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






