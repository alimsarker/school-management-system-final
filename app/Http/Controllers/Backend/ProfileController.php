<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
   public function ViewProfile(){

    $id = Auth::user()->id;
    $user = User::find($id);

    return view('backend.profile.profile_view',compact('user'));    
    
   }

   public function ProfileSetting(){

      $id = Auth::user()->id;
      $userData = User::find($id);
  
      return view('backend.profile.account_setting',compact('userData'));    
      
     }

     // For Update

     

  public function ProfileUpdate(Request $request){


      $data = User::find(Auth::user()->id);
      $data->usertype = $request->usertype;
      $data->name = $request->name;
      $data->email = $request->email;
      $data->mobile  = $request->mobile ;
      $data->address = $request->address;
      $data->gender = $request->gender;
      $data->status = $request->status;
    
      
      
      if ($request->file('profile_photo_path')) {
          $file = $request->file('profile_photo_path');

          @unlink(public_path('storage/profile-photos/'.$data->profile_photo_path));

          $filename = date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('storage/profile-photos/'),$filename);
          $data->profile_photo_path = $filename; 

          
      } 
      $data->update();
      $notification = array(
          'message' => 'Profile Save Changes Successfully',
          'alert-type' => 'info'
      );
      return Redirect()->route('profile.setting')->with($notification); 
  }

  /// UPDATE PASSWORD

  public function PasswordUpdate(Request $request){

    $validated = $request->validate([

        'oldpassword' => 'required',
        'password' => 'required|confirmed',
                   
    ]);

    $hasPassword = Auth::user()->password;
    if(Hash::check($request->oldpassword, $hasPassword)){
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::logout();


       
        return Redirect()->route('login');  
       

    }else{
       
        return Redirect()->route('profile.setting');
        

    }

    
      
    
   }
  
}
