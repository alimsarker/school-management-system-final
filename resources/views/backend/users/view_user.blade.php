@extends('admin.admin_master')
@section('admincontent')

<div class="section">
  

      <div class="section section-data-tables">
      
         <div class="row">
            <div class="col s12">
               <div class="card">
               <div class="card-content">
                  <h4 class="card-title">User View</h4>
                  <a href="{{ route('users.add') }}" style="float: right;" class="btn cyan waves-effect waves-light right mb-5">Add User</a>
                  <div class="row">
                     <div class="col s12">
                     <table id="page-length-option" class="display">
                        <thead>
                           <tr>
                           <th style="width:5%">SL</th>
                           <th>Image</th>
                           <th>Role</th>
                           <th>Name</th>
                           <th>Email</th>
                           
                           <th style="width:15%">Action</th>
                         
                       
                         
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($allData as $key=> $data) 
                           <tr>
                           <td>{{ $key+1 }}</td>
                           <td>
<img style="width:100px; height:100px;" class="responsive-img" alt="" src="{{ (!empty($data->profile_photo_path))? url('/storage/profile-photos/'.$data->profile_photo_path) : url('/storage/profile-photos/no_image.jpg') }}">
                       
                           </td> 
                           <td>{{ $data->usertype }}</td>
                           <td>{{ $data->name }}</td>
                           <td>{{ $data->email }}</td>
                           
                           <td>
                           <a href="{{ route('users.edit', $data->id) }}" class="btn cyan waves-effect waves-light" type="submit">Edit</a>
                    
                           <a href="{{ route('users.delete', $data->id) }}" class="btn btn-danger" id="delete" type="submit">Delete</a>
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


@endsection






