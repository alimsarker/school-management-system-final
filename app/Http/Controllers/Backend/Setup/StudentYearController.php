<?php

namespace App\Http\Controllers\Backend\Setup;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentYear;


class StudentYearController extends Controller
{
    public function ViewStudentYear(){

        $data['yearData'] = StudentYear::all();
        return view('backend.setup.student_year.view_year',$data);

    }
    public function AddStudentYear(){

      
        return view('backend.setup.student_year.add_year');

    }

    public function StoreStudentYear(Request $request){

        $validated = $request->validate([
            
            'year' => 'required|unique:student_years,year',           
        ],
        [           
            'year.required' => 'Please Imput Student Year ', 
            'year.unique' => 'The Student Year   Already Used!!!',         
             
        ]);

        $data = new StudentYear();
        $data->year = $request->year;
        
        $data->save();
        $notification = array(
            'message' => 'Student Year Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('student.year.view')->with($notification); 
    }

    public function EditStudentYear($id){

        $editdata = StudentYear::find($id);
       
        return view('backend.setup.student_year.edit_year',compact('editdata')); 
    }

    public function UpdateStudentYear(Request $request, $id){


        $data = StudentYear::find($id);
        $validated  = $request->validate([
            
            'year' => 'required|unique:student_years,year,'.$data->id
            
           
        ],
        [
           
            'year.required' => 'Please Imput The Student Year ', 
            'year.unique' => 'This Student Year  Already Used!!!',            
             
        ]);
     
        $data->year = $request->year;
        $data->save();
        $notification = array(
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('student.year.view')->with($notification); 
    }

    public function StudentYearDelete($id){

        StudentYear::find($id)->delete();         
      
        $notification = array(
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->route('student.year.view')->with($notification);   
    }

    //  
}
