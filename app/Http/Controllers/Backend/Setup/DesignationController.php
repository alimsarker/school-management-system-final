<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignationController extends Controller
{
    public function ViewDesignation(){
    $data['designationData'] = Designation::all();
    return view('backend.setup.designation.view_designation',$data);
    }

    public function AddDesignation(){

        return view('backend.setup.designation.add_designation');
    }

    public function StoreDesignation(Request $request){

        $validated = $request->validate([
            
            'title' => 'required|unique:designations,title',
           
        ],
        [
           
            'title.required' => 'Please Imput Designations', 
            'title.unique' => 'The Designations  Already Used!!!',            
             
        ]);

        $data = new Designation();
        $data->title = $request->title;
        
        $data->save();
        $notification = array(
            'message' => 'Designations Title Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('designation.view')->with($notification); 
    }

    public function EditDesignation($id){

        $editdata = Designation::find($id);
       
        return view('backend.setup.designation.edit_designation',compact('editdata')); 

    }



    public function UpdateDesignation(Request $request, $id){


        $data = Designation::find($id);
        $validated = $request->validate([
            
            'title' => 'required|unique:designations,title',
           
        ],
        [
           
            'title.required' => 'Please Imput Designations', 
            'title.unique' => 'The Designations  Already Used!!!',            
             
        ]);
        $data->title = $request->title;
        $data->save();
        $notification = array(
            'message' => 'Designation Updated Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('designation.view')->with($notification); 
    }


    public function DesignationDelete($id){

        Designation::find($id)->delete();         
      
        $notification = array(
            'message' => 'Designation Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->route('designation.view')->with($notification);   
    }
    //
}
