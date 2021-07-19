<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function ViewUser(){
        // $allData = User::all();
        $data['allData'] = User::where('usertype','Admin')->get();
        return view('backend.users.view_user', $data);
    }
    
    
    public function ViewAdd(){

        $data['allData'] = User::all();
        return view('backend.users.add_user', $data);  
    }


    public function StoreUser(Request $request){

        $validated = $request->validate([
           
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
           
        ],
        [
           
            'name.required' => 'Please Imput User  Name', 
            'name.unique' => 'The  Name  Already Used!!!',            
            'email.required' => 'Please Imput  E-mail',
            'email.unique' => 'The  E-mail Address Already Used!!!',
          
        ]);

        $data = new User();
        $code = rand(0000,9999);
        $data->usertype = 'Admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($code);
        $data->code = $code;
        
        
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');

            @unlink(public_path('storage/profile-photos/'.$data->profile_photo_path));

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('storage/profile-photos/'),$filename);
            $data->profile_photo_path = $filename; 

            
        } 
        $data->save();
        $notification = array(
            'message' => 'User Data Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('user.view')->with($notification); 
    }

    public function UserEdit($id){

        $data['allData'] = User::find($id);
       
        return view('backend.users.edit_user', $data); 
    }

    public function UserUpdate(Request $request, $id){


        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
      
        
        
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');

            @unlink(public_path('storage/profile-photos/'.$data->profile_photo_path));

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('storage/profile-photos/'),$filename);
            $data->profile_photo_path = $filename; 

            
        } 
        $data->save();
        $notification = array(
            'message' => 'User Data Updated Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('user.view')->with($notification); 
    }
    
    public function UserDelete($id){

        $image = User::find($id);
        $old_image = $image->profile_photo_path;


        @unlink(public_path('storage/profile-photos/'.$old_image));

        User::find($id)->delete();

         
      
        return Redirect()->route('user.view');  
    }
    
    
    
}
