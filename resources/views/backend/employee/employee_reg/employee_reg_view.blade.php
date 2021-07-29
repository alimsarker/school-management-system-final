@extends('admin.admin_master')
@section('admincontent')
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
                  <h4 class="card-title">Employee List</h4>
                  <a href="{{ route('employee.reg.add') }}" style="float: right;" class="btn cyan waves-effect waves-light right mb-5">Add Employee</a>
                  <div class="row">
                     <div class="col s12">
                     <table id="page-length-option" class="display">
                        <thead>
                           <tr>
                           <th>SL</th>
                         
                           <th>Image</th>
                           <th> Name</th>
                           <th>ID NO</th>                        
                           <th>Joining Date </th>                      
                           <th> Selary </th>
                           <th> Gender </th>
                           <th>Mobile No </th>                          
                           @if(Auth::user()->role == "Admin")
                           <th>Code</th>
                          @endif
                           <th>Action</th>                        
                       
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($allData as $key=> $employee) 
                           <tr>
                           <td>{{ $key+1 }}</td>
                         
                        
                           <td>
<img src="{{ (!empty($employee->image))? url('/upload/employee_images/'.$employee->image) : url('/storage/profile-photos/no_image.jpg') }}" style="height:60px; width:60px; class="responsive-img" alt="">
                           </td>
                           <td>{{ $employee->name }}</td>
                           <td>{{ $employee->id_no }}</td>
                           <td>{{ $employee->join_date  }}</td>
                           <td>{{ $employee->selary  }}</td>
                           <td>{{ $employee->gender }}</td>
                           <td>{{ $employee->mobile  }}</td>
                        
                           @if(Auth::user()->role == "Admin")
                         
                           
                           <td>{{ $employee->code }}</td>
                          
                          
                           @endif
                           
                           <td>
     <a href="{{ route('employee.reg.edit', $employee->id) }}" class="btn cyan waves-effect waves-light" type="submit">Edit</a>
                    
     <a target="_blank" class="btn mb-1 waves-effect waves-light " type="submit" href="{{ route('employee.reg.detail', $employee->id) }}">Details
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






