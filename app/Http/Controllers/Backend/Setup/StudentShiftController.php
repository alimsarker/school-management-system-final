<?php

namespace App\Http\Controllers\Backend\Setup;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function ViewStudentShift(){

        $data['ShiftData'] = StudentShift::all();
        return view('backend.setup.student_shift.view_shift',$data);

    }

    public function AddStudentShift(){

      
        return view('backend.setup.student_shift.add_shift');

    }
    
    public function StoreStudentShift(Request $request){

        $validated = $request->validate([
            
            'shift_name' => 'required|unique:student_shifts,shift_name',
           
        ],
        [
           
            'shift_name.required' => 'Please Imput Student Shift  Name', 
            'shift_name.unique' => 'The Student Shift Name  Already Used!!!',            
             
        ]);

        $data = new StudentShift();
        $data->shift_name = $request->shift_name;
        
        $data->save();
        $notification = array(
            'message' => 'Student Shift Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('student.shift.view')->with($notification); 
    }

    
    public function EditStudentShift($id){

        $editdata = StudentShift::find($id);
       
        return view('backend.setup.student_shift.edit_shift',compact('editdata')); 
    }

    

    public function UpdateStudentShift(Request $request, $id){


        $data = StudentShift::find($id);
        $validated  = $request->validate([
            
            'shift_name' => 'required|unique:student_shifts,shift_name,'.$data->id
           
        ],
        [
           
            'shift_name.required' => 'Please Imput Student Shift  Name', 
            'shift_name.unique' => 'The Student Shift Name  Already Used!!!',            
             
        ]);
     
        $data->shift_name = $request->shift_name;
        $data->save();
        $notification = array(
            'message' => 'Student Class Updated Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('student.shift.view')->with($notification); 
    }
    
    public function StudentShiftDelete($id){

        StudentShift::find($id)->delete();         
      
        $notification = array(
            'message' => 'Student Shift Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->route('student.shift.view')->with($notification);   
    }
}
