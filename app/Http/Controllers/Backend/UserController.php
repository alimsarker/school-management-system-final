<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function ViewUser(){
        // $allData = User::all();
        $data['allData'] = User::all();
        return view('backend.users.view_user', $data);
    }
    
    
    public function ViewAdd(){
       
        return view('backend.users.add_user');  
    }


    public function AddUser(Request $request){

        $validated = $request->validate([
            'usertype' => 'required',
            'name' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:4',
        ],
        [
            'usertype.required' => 'Please Select User  Role',
            'name.required' => 'Please Imput User  Name', 
            'name.required' => 'The  Name  Already Used!!!',            
            'email.required' => 'Please Imput  E-mail',
            'email.unique' => 'The  E-mail Address Already Used!!!',
            'password.required' => 'Please Imput  Password',
            'password.min' => 'Please Imput  Password minumum four chet..',  
        ]);

        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        
        
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
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
      
        
        
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
