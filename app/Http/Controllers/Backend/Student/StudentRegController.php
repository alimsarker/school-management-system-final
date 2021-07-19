<?php

namespace App\Http\Controllers\Backend\Student;

use App\Models\user;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Http\Controllers\Controller;

class StudentRegController extends Controller
{
    // View  Pages
    public function ViewStudentReg(){

        $data['allData'] = AssignStudent::all();
        return view('backend.student.student_reg.view_student_reg',$data);
        


    }
        // Add  Pages
    public function AddStudentReg(){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
       
      
        return view('backend.student.student_reg.add_student_reg',$data);

    }

    // Store Pages
    public function StoreStudentReg(Request $request){

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

    // Edit  Pages
    // public function EditStudentShift($id){

    //     $editdata = StudentShift::find($id);
       
    //     return view('backend.setup.student_shift.edit_shift',compact('editdata')); 
    // }

    // Update  Pages

    // public function UpdateStudentShift(Request $request, $id){


    //     $data = StudentShift::find($id);
    //     $validated  = $request->validate([
            
    //         'shift_name' => 'required|unique:student_shifts,shift_name,'.$data->id
           
    //     ],
    //     [
           
    //         'shift_name.required' => 'Please Imput Student Shift  Name', 
    //         'shift_name.unique' => 'The Student Shift Name  Already Used!!!',            
             
    //     ]);
     
    //     $data->shift_name = $request->shift_name;
    //     $data->save();
    //     $notification = array(
    //         'message' => 'Student Class Updated Successfully',
    //         'alert-type' => 'info'
    //     );
    //     return Redirect()->route('student.shift.view')->with($notification); 
    // }
    // Delete  Pages
    // public function StudentShiftDelete($id){

    //     StudentShift::find($id)->delete();         
      
    //     $notification = array(
    //         'message' => 'Student Shift Deleted Successfully',
    //         'alert-type' => 'warning'
    //     );
    //     return Redirect()->route('student.shift.view')->with($notification);   
    // }
    //
}//End Main
