@extends('admin.admin_master')
@section('admincontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Account Settings</span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Account Settings</a>
                  </li>
                  <li class="breadcrumb-item active">View Account Settings Pages
                  </li>
                </ol>
              </div>
            
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="container">
            <!-- Account settings -->
<section class="tabs-vertical mt-1 section">
  <div class="row">
    <div class="col l4 s12">
      <!-- tabs  -->
      <div class="card-panel">
        <ul class="tabs">
          <li class="tab">
            <a href="#general">
              <i class="material-icons">brightness_low</i>
              <span>General</span>
            </a>
          </li>
          <li class="tab">
            <a href="#change-password">
              <i class="material-icons">lock_open</i>
              <span>Change Password</span>
            </a>
          </li>
          <li class="tab">
            <a href="#info">
              <i class="material-icons">error_outline</i>
              <span> Info</span>
            </a>
          </li>
          <li class="tab">
            <a href="#social-link">
              <i class="material-icons">chat_bubble_outline</i>
              <span>Social Links</span>
            </a>
          </li>
          <li class="tab">
            <a href="#connections">
              <i class="material-icons">link</i>
              <span>Connections</span>
            </a>
          </li>
          <li class="tab">
            <a href="#notifications">
              <i class="material-icons">notifications_none</i>
              <span> Notifications</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="col l8 s12">
      <!-- tabs content -->
          <!-- TAB GENERAL  -->
      <div id="general">
        <div class="card-panel">
        
          
          <div class="display-flex">
            <div class="media">
              <img id="showAccImage" src="{{ (!empty($userData->profile_photo_path))? url('/storage/profile-photos/'.$userData->profile_photo_path) : url('/storage/profile-photos/no_image.jpg') }}" class="border-radius-4" alt="profile image"
                height="64" width="64">
            </div>
            <div class="media-body">
          
              <div class="general-action-btn">
              <input type="hidden" name="old_image" value="{{ $userData->profile_photo_path }}">
                <button id="select-files" class="btn indigo mr-2">
                  <span>Upload new photo</span>
                </button>
               
              </div>
              <small>Allowed JPG or PNG.</small>
              
            </div>
          </div>
          <div class="divider mb-1 mt-1"></div>
          <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"> @csrf
          
          <div class="upfilewrapper">
        
           
            <input id="upfile" name="profile_photo_path" type="file" />
          </div>
        
            <div class="row">
              <div class="col s12">
                <div class="col s6">
                <div class="input-field">
                  <label for="email">Username / E-Mail</label>
                  <input type="email"  name="email" value="{{ $userData->email}}" data-error=".errorTxt1">
                  <small class="errorTxt1"></small>
                </div>
                </div>

                

                <div class="col s6">
                <div class="input-field">
                <select name="role" id="role" class="block mt-1 w-full">
                      <option value="" disabled selected>Choose Role Type</option>
                      <option value="Admin" {{ ($userData->role == "Admin" ? "selected" : "") }}>Admin</option>
                      <option value="Operator" {{ ($userData->role == "Operator" ? "selected" : "") }}>Operator</option>
                      
                      </select>
                      <label>Select Profile User Role Type</label>
                      <small class="errorTxt1"></small>
                </div>
                </div>
              </div>
              <div class="col s12">
                <div class="col s6">
                <div class="input-field">
                  <label for="name">Name</label>
                  <input type="text"  name="name" value="{{ $userData->name}}" data-error=".errorTxt1">
                  <small class="errorTxt1"></small>
                </div>
                </div>
                <div class="col s6">
                <div class="input-field">
                    <select name="status" id="status" class="block mt-1 w-full">
                      <option value="" disabled selected>Choose Status Type</option>
                      <option value="1" {{ ($userData->status == "1" ? "selected" : "") }}>Active</option>
                      <option value="0" {{ ($userData->status == "0" ? "selected" : "") }}>Inactive</option>
                      
                      </select>
                      <label>Select Profile User Status Type</label>
                
                  <small class="errorTxt1"></small>
                </div>
                </div>
              </div>
              <div class="col s12">
                <div class="col s6">
                <div class="input-field">
                  <label for="uname">Mobile No</label>
                  <input type="text" id="uname" name="mobile" value="{{ $userData->mobile}}" data-error=".errorTxt1">
                  <small class="errorTxt1"></small>
                </div>
                </div>
                <div class="col s6">
                <div class="input-field">
                    <select name="gender" id="gender" class="block mt-1 w-full">
                      <option value="" disabled selected>Choose Gender</option>
                      <option value="Male" {{ ($userData->gender == "Male" ? "selected" : "") }}>Male</option>
                      <option value="Female" {{ ($userData->gender == "Female" ? "selected" : "") }}>Female</option>
                      
                      </select>
                      <label>Select Profile Gender</label>
                  <small class="errorTxt1"></small>
                </div>
                </div>
              </div>
              
            
              <div class="col s12">
                <div class="input-field">
                <input type="text" id="uname" name="address" value="{{ $userData->address}}" data-error=".errorTxt1">
                  <label for="company">Address</label>
                </div>
              </div>
              <div class="col s12 display-flex justify-content-end form-action">
                <button type="submit" class="btn indigo waves-effect waves-light mr-2">
                  Save changes
                </button>
                <a href="{{ route('profile.setting') }}" class="btn btn-light-pink waves-effect waves-light mb-1">Cancel</a>
              </div>
            </div>
          </form>
        </div>
      </div>
       <!-- TAB CHANGE PASSWORD  -->
      <div id="change-password">
        <div class="card-panel">
        <form method="POST" action="{{ route('password.update') }}"> @csrf
         
          <!-- <form class="paaswordvalidate"> -->
            <div class="row">
              <div class="col s12">
                <div class="input-field">
                  <input id="current_password" type="password" name="oldpassword" class="block mt-1 w-full @error('oldpassword') is-invalid @enderror">
                  <label for="oldpassword">Old Password</label>
                  <small class="errorTxt4"></small>
                </div>
                @error('oldpassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
              <div class="col s12">
                <div class="input-field">
                  <input id="password" type="password" name="password"  class="block mt-1 w-full @error('password') is-invalid @enderror">
                  <label for="password">New Password</label>
                  <small class="errorTxt5"></small>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
              <div class="col s12">
                <div class="input-field">
                  <input id="password_confirmation" type="password"  name="password_confirmation" class="block mt-1 w-full @error('password_confirmation') is-invalid @enderror">
                  <label for="password_confirmation">Retype new Password</label>
                  <small class="errorTxt6"></small>
                </div>
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
              <div class="col s12 display-flex justify-content-end form-action">
                <button type="submit" class="btn indigo waves-effect waves-light mr-1">Save changes</button>
                <a href="{{ route('password.update') }}" class="btn btn-light-pink waves-effect waves-light">Cancel</a>
              </div>
            </div>
          </form>
        </div>
      </div>
       <!-- TAB INFO  -->
      <div id="info">
        <div class="card-panel">
          <form class="infovalidate">
            <div class="row">
              <div class="col s12">
                <div class="input-field">
                  <textarea class="materialize-textarea" id="accountTextarea" name="accountTextarea"
                    placeholder="Your Bio data here..."></textarea>
                  <label for="accountTextarea">Bio</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <input id="pick-birthday" type="text" class="birthdate-picker datepicker">
                  <label for="pick-birthday">Birth date</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <select class="validate" id="accountSelect">
                    <option selected>USA</option>
                    <option>India</option>
                    <option>Canada</option>
                  </select>
                  <label for="accountSelect">Country</label>
                </div>
              </div>
              <div class="col s12">
                <label for="languageselect2">Languages</label>
                <div class="input-field">
                  <select class="browser-default" id="languageselect2" multiple="multiple">
                    <option value="English" selected>English</option>
                    <option value="Spanish">Spanish</option>
                    <option value="French">French</option>
                    <option value="Russian">Russian</option>
                    <option value="German">German</option>
                    <option value="Arabic" selected>Arabic</option>
                    <option value="Sanskrit">Sanskrit</option>
                  </select>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <input id="phone-num" type="text" class="validate" value="(+656) 254 2568">
                  <label for="phone-num">Phone</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <input id="web-link" type="text" class="validate">
                  <label for="web-link">Website</label>
                </div>
              </div>
              <div class="col s12">
                <label class="musicselect2">Favourite Music</label>
                <div class="input-field">
                  <select class="browser-default" id="musicselect2" multiple="multiple">
                    <option value="Rock">Rock</option>
                    <option value="Jazz" selected>Jazz</option>
                    <option value="Disco">Disco</option>
                    <option value="Pop">Pop</option>
                    <option value="Techno">Techno</option>
                    <option value="Folk" selected>Folk</option>
                    <option value="Hip hop">Hip hop</option>
                  </select>
                </div>
              </div>
              <div class="col s12">
                <label for="moviesselect2">Favourite movies</label>
                <div class="input-field">
                  <select class="browser-default" id="moviesselect2" multiple="multiple">
                    <option value="The Dark Knight" selected>
                      The Dark Knight
                    </option>
                    <option value="Harry Potter" selected>Harry Potter</option>
                    <option value="Airplane!">Airplane!</option>
                    <option value="Perl Harbour">Perl Harbour</option>
                    <option value="Spider Man">Spider Man</option>
                    <option value="Iron Man" selected>Iron Man</option>
                    <option value="Avatar">Avatar</option>
                  </select>
                </div>
              </div>
              <div class="col s12 display-flex justify-content-end form-action">
                <button type="submit" class="btn indigo waves-effect waves-light mr-2">Save
                  changes</button>
                <button type="button" class="btn btn-light-pink waves-effect waves-light ">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
       <!-- TAB SOCIAL LINK  -->
      <div id="social-link">
        <div class="card-panel">
          <form>
            <div class="row">
              <div class="col s12">
                <div class="input-field">
                  <input id="twitter-link" type="text" class="validate" placeholder="Add link"
                    value="https://www.twitter.com">
                  <label for="twitter-link">Twitter</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <input id="fb-link" type="text" class="validate" placeholder="Add link">
                  <label for="fb-link">Facebook</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <input id="google+link" type="text" class="validate" placeholder="Add link">
                  <label for="google+link">Google+</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <input id="linkedin" type="text" class="validate" placeholder="Add link"
                    value="https://www.linkedin.com">
                  <label for="linkedin">LinkedIn</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <input id="instragram-link" type="text" class="validate" placeholder="Add link">
                  <label for="instragram-link">Instagram</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <input id="quora-link" type="text" class="validate" placeholder="Add link">
                  <label for="quora-link">Quora</label>
                </div>
              </div>
              <div class="col s12 display-flex justify-content-end form-action">
                <button type="submit" class="btn indigo waves-effect waves-light mr-2">Save
                  changes</button>
                <button type="button" class="btn btn-light-pink waves-effect waves-light">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
       <!-- TAB CONNECTIONS  -->
      <div id="connections">
        <div class="card-panel">
          <div class="row">
            <div class="col s12 mt-1 mb-1">
              <a href="javascript: void(0);" class="btn cyan waves-effect waves-light">
                Connect to <strong>Twitter</strong>
              </a>
            </div>
            <div class="col s12 mt-1 mb-1">
              <button class="btn btn-small waves-effect waves-light btn-light-indigo float-right">edit</button>
              <h6>You are connected to facebook.</h6>
              <p>Johndoe@gmail.com</p>
            </div>
            <div class="col s12 mt-1 mb-1">
              <a href="javascript: void(0);" class="btn waves-effect waves-light">Connect to
                <strong>Google</strong>
              </a>
            </div>
            <div class="col s12 mt-1 mb-1">
              <button class="btn btn-small btn-light-indigo float-right waves-effect waves-light">edit</button>
              <h6>You are connected to Instagram.</h6>
              <p>Johndoe@gmail.com</p>
            </div>
            <div class="col s12 display-flex justify-content-end form-action">
              <button type="submit" class="btn indigo waves-effect waves-light mr-2">Save
                changes</button>
              <button type="button" class="btn btn-light-pink waves-effect waves-light">Cancel</button>
            </div>
          </div>
        </div>
      </div>
       <!-- TAB NOTIFICATIONS  -->
      <div id="notifications">
        <div class="card-panel">
          <div class="row">
            <h6 class="col s12 mb-2">Activity</h6>
            <div class="col s12 mb-1">
              <div class="switch">
                <label>
                  <input type="checkbox" checked id="accountSwitch1">
                  <span class="lever"></span>
                </label>
                <span class="switch-label w-100">Email me when someone comments on my article</span>
              </div>
            </div>
            <div class="col s12 mb-1">
              <div class="switch">
                <label>
                  <input type="checkbox" checked id="accountSwitch2">
                  <span class="lever"></span>
                </label>
                <span class="switch-label w-100">
                  Email me when someone answers on my form</span>
              </div>
            </div>
            <div class="col s12 mb-1">
              <div class="switch">
                <label>
                  <input type="checkbox" id="accountSwitch3">
                  <span class="lever"></span>
                </label>
                <span class="switch-label w-100">
                  Email me hen someone follows me</span>
              </div>
            </div>
            <h6 class="col s12 mb-2 mt-2">Application</h6>
            <div class="col s12 mb-1">
              <div class="switch">
                <label>
                  <input type="checkbox" checked id="accountSwitch4">
                  <span class="lever"></span>
                </label>
                <span class="switch-label w-100">News and announcements</span>
              </div>
            </div>
            <div class="col s12 mb-1">
              <div class="switch">
                <label>
                  <input type="checkbox" id="accountSwitch5">
                  <span class="lever"></span>
                </label>
                <span class="switch-label w-100">Weekly product updates</span>
              </div>
            </div>
            <div class="col s12 mb-1">
              <div class="switch">
                <label>
                  <input type="checkbox" class="custom-control-input" checked id="accountSwitch6">
                  <span class="lever"></span>
                </label>
                <span class="switch-label w-100">Weekly blog digest</span>
              </div>
            </div>
            <div class="col s12 display-flex justify-content-end form-action mt-2">
              <button type="submit" class="btn indigo waves-light waves-effect mr-sm-1 mr-2">Save
                changes</button>
              <button type="button" class="btn btn-light-pink waves-light waves-effect">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
   $(document).ready(function(){
        $('#upfile').change(function(e){
           var reader = new FileReader();
           reader.onload = function(e){
               $('#showAccImage').attr('src',e.target.result);
           }
           reader.readAsDataURL(e.target.files['0']);
       });
   });

</script>


    
@endsection