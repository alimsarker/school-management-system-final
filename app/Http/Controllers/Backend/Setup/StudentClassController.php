<?php

namespace App\Http\Controllers\Backend\Setup;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function ViewStudentClass(){

        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class',$data);

    }
    
    public function AddStudentClass(){

      
        return view('backend.setup.student_class.add_class');

    }

    public function StoreStudentClass(Request $request){

        $validated = $request->validate([
            
            'name' => 'required|unique:student_classes,name',
           
        ],
        [
           
            'name.required' => 'Please Imput Student Class  Name', 
            'name.unique' => 'The Student Class Name  Already Used!!!',            
             
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        
        $data->save();
        $notification = array(
            'message' => 'Student Class Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('student.class.view')->with($notification); 
    }

    public function EditStudentClass($id){

        $editdata = StudentClass::find($id);
       
        return view('backend.setup.student_class.edit_class',compact('editdata')); 
    }

    
    public function UpdateStudentClass(Request $request, $id){


        $data = StudentClass::find($id);
        $validated  = $request->validate([
            
            'name' => 'required|unique:student_classes,name,'.$data->id
           
        ],
        [
           
            'name.required' => 'Please Imput Student Class  Name', 
            'name.unique' => 'The Student Class Name  Already Used!!!',            
             
        ]);
     
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Student Class Updated Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('student.class.view')->with($notification); 
    }
    
    public function StudentClassDelete($id){

        StudentClass::find($id)->delete();         
      
        $notification = array(
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->route('student.class.view')->with($notification);   
    }
    
}
