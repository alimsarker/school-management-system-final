@extends('admin.admin_master')
@section('admincontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>User Edit</span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">User Management</a>
                  </li>
                  <li class="breadcrumb-item active"> Edit  
                   </li>
                </ol>
              </div>
            
            </div>
          </div>
        </div>
<div class="section">
<div class="col s12 m12 l12">
      <div id="Form-advance" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Edit User</h4>
          <form method="POST" action="{{ route('users.update', $allData->id) }}" enctype="multipart/form-data"> @csrf
            <div class="row">
                        <div class="input-field col m6 s12">
                            <select name="usertype" id="usertype" class="block mt-1 w-full @error('usertype') is-invalid @enderror" required="">
                            <option value="" disabled selected>Choose Role Type</option>
                            <option value="Admin" {{ ($allData->usertype == "Admin" ? "selected" : "") }}>Admin</option>
                            <option value="User" {{ ($allData->usertype == "User" ? "selected" : "") }}>User</option>
                            
                            </select>
                            <label>Select Profile User Role Type</label>
                            @error('usertype')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                        </div>
                        
                        <div class="input-field col m6 s12">
                            <input id="name" type="text" name="name" class="block mt-1 w-full @error('name') is-invalid @enderror" value="{{ $allData->name }}">
                            <label for="name">User Name</label>
                            @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                        </div>
                </div>
            <div class="row">
            <div class="input-field col m6 s12">
                        <input class="block mt-1 w-full @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ $allData->email }}">
                        <label for="email">Email</label>
                        @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="col m6 s12 file-field input-field">
                    <input type="hidden" name="old_image" value="{{ $allData->profile_photo_path }}">
                            <div class="btn float-right">
                            <span>Picture</span>
                            <input type="file" name="profile_photo_path" id="image">
                            </div>
                            <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                            </div>
            
                    
            </div>
            
            
                        
                       <div class="mr-5"   style="float: right;">
                      <img id="showAdminImage" class="avatar-status avatar-online" src="{{ (!empty($allData->profile_photo_path))? url('/storage/profile-photos/'.$allData->profile_photo_path) : url('/storage/profile-photos/no_image.jpg') }}" style="height:50px; width:50px;">
                         
                      </div> 
                
             
            </div>
            
              <div class="row">
                <div class="input-field col s12">
                  <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Update
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