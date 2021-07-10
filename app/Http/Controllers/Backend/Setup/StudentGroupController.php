<?php

namespace App\Http\Controllers\Backend\Setup;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function ViewStudentGroup(){

        $data['allGroupData'] = StudentGroup::all();
        return view('backend.setup.student_group.view_group',$data);

    }

    public function AddStudentGroup(){

      
        return view('backend.setup.student_group.add_group');

    }

    public function StoreStudentGroup(Request $request){

        $validated = $request->validate([
            
            'group' => 'required|unique:student_groups,group',
           
        ],
        [
           
            'group.required' => 'Please Imput Student Group  Name', 
            'group.unique' => 'The Student Group Name  Already Used!!!',            
             
        ]);

        $data = new StudentGroup();
        $data->group = $request->group;
        
        $data->save();
        $notification = array(
            'message' => 'Student Group Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('student.group.view')->with($notification); 
    }

    public function EditStudentGroup($id){

        $editdata = StudentGroup::find($id);
       
        return view('backend.setup.student_group.edit_group',compact('editdata')); 
    }

    public function UpdateStudentGroup(Request $request, $id){


        $data = StudentGroup::find($id);
        $validated  = $request->validate([
            
            'group' => 'required|unique:student_groups,group,'.$data->id
           
        ],
        [
           
            'group.required' => 'Please Imput Student Group  Name', 
            'group.unique' => 'The Student Group Name  Already Used!!!',            
             
        ]);
     
        $data->group = $request->group;
        $data->save();
        $notification = array(
            'message' => 'Student Group Updated Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('student.group.view')->with($notification); 
    }
    

    public function StudentGroupDelete($id){

        StudentGroup::find($id)->delete();         
      
        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->route('student.group.view')->with($notification);   
    }
}
