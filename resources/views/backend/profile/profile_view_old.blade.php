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
                <h4 style="text-align:center;">User Type : <b> {{ $user->usertype  }}</b></h4>
                <span class="new badge left ml-0 mr-2" data-badge-caption=""></span>
                <h6>User Status: <span class="green-text">{{ $user->status  }}</span></h6>
                <hr class="mb-5">
               
                <h5> Name :<b> {{ $user->name  }}</b></h5> 
                <h5> E-mail :<b> {{ $user->email  }}</b></h5> 
                <h5> Mobile No. :<b> {{ $user->mobile  }}</b></h5> 
                <h5> Gender :<b> {{ $user->gender  }}</b></h5> 
                <h5> Address :<b> {{ $user->address  }}</b></h5> 
                
              </div>
            </div>
          </div>
        </div>
      </div>
       

@endsection