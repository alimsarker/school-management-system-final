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
                  <h4 class="card-title">Employee Salary List</h4>
                 <div class="row">
                     <div class="col s12">
                     <table id="page-length-option" class="display">
                        <thead>
                           <tr>
                           <th>SL</th>
                           <th> Name</th>
                           <th>ID NO</th> 
                           <th>Designation </th>
                           <th> Gender </th>
                           <th>Mobile No </th>                        
                           <th>Joining Date </th>            
                           <th> Selary </th>
                                                   
                         
                           <th>Action</th>                        
                       
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($allData as $key=> $value) 
                           <tr>
                           <td>{{ $key+1 }}</td>
                           <td><strong>{{ $value->name }}</strong></td>
                           <td>{{ $value->id_no }}</td>
                           <td><strong>{{$value['designation']['title']  }}</strong></td>
                           <td>{{ $value->gender }}</td>
                           <td>{{ $value->mobile  }}</td>
                           <td>{{ date('d-m-Y',strtotime( $value->join_date))  }}</td>
                           <td>{{ $value->selary  }}</td>
                       
                        
                           
                           <td>
     <a title="Increment" href="{{ route('employee.salary.increment', $value->id) }}" class="btn cyan waves-effect waves-light" type="submit"><i class="material-icons">add_circle</i></a>
                    
     <a title="Details" target="_blank" class="btn mb-1 waves-effect waves-light " type="submit" href="{{ route('employee.salary.detail', $value->id) }}">
                  <i class="material-icons right">visibility</i>
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






