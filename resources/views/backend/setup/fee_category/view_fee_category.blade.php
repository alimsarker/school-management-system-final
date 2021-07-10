@extends('admin.admin_master')
@section('admincontent')
<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span> Fee Category</span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Setup Management</a>
                  </li>
                  <li class="breadcrumb-item active">  Fee Category
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
                  <h4 class="card-title">Fee Category List</h4>
                  <a href="{{ route('fee.category.add') }}" style="float: right;" class="btn cyan waves-effect waves-light right mb-5">Add Fee Category</a>
                  <div class="row">
                     <div class="col s12">
                     <table id="page-length-option" class="display">
                        <thead>
                           <tr>
                           <th style="width:5%">SL</th>
                         
                           <th>Name</th>
                         
                           
                           <th style="width:15%">Action</th>
                         
                       
                         
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($allData as $key=> $feecat) 
                           <tr>
                           <td>{{ $key+1 }}</td>
                         
                           <td>{{ $feecat->name }}</td>
                          
                           
                           <td>
                           <a href="{{ route('fee.category.edit', $feecat->id) }}" class="btn cyan waves-effect waves-light" type="submit">Edit</a>
                    
                           <a href="{{ route('fee.category.delete', $feecat->id) }}" class="btn btn-danger" id="delete" type="submit">Delete</a>
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






