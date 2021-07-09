@extends('admin.admin_master')
@section('admincontent')

<div class="col s12">
        <div class="card animate fadeUp">
          <div class="card-badge"></div>
          <div class="card-content">
            <div class="row" id="product-four">
              <div class="col m6 s12">
                <img src="{{ (!empty($user->profile_photo_path))? url('/storage/profile-photos/'.$user->profile_photo_path) : url('/storage/profile-photos/no_image.jpg') }}" class="responsive-img" alt="">
              </div>
              <div class="col m6 s12">
                <p></p>
                <h4 style="text-align:center;">User Type :<b> {{ $user->usertype  }}</b></h4>
              
                <p> <span class="green-text"></span></p>
                <hr>
                <span class="vertical-align-top mr-4"><i class="material-icons mr-3"></i></span>
                <h5>User Name / User E-mail : <b>{{ $user->email  }}</b></h5> 	
               
                <h5> Name :<b> {{ $user->name  }}</b></h5> 
               
                
             
               
                <h5>Mobile No : <b>{{ $user->mobile   }}</b></h5>
             
              
                <h5>Gender : <b>{{ $user->gender  }}</b></h5>
                
                <h5>Status : <b>{{ $user->status   }}</b></h5>
               
                <h5>Address :<address> <b>{{ $user->address   }}</b></address></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
       

@endsection