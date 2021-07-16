<?php

namespace App\Http\Controllers\Backend\Setup;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public  function ViewExamType()
    {
        $data['examData'] = ExamType::all();
    return view('backend.setup.exam_type.view_exam_type',$data);
  
    }
   
    public function AddExamType(){

        return view('backend.setup.exam_type.add_exam_type');
    }

    

   
    public function StoreExamType(Request $request){

        $validated = $request->validate([
            
            'exam_type_name' => 'required|unique:exam_types,exam_type_name',
           
        ],
        [
           
            'exam_type_name.required' => 'Please Imput Exam Type  Name', 
            'exam_type_name.unique' => 'The Exam Type  Name  Already Used!!!',            
             
        ]);

        $data = new ExamType();
        $data->exam_type_name = $request->exam_type_name;
        
        $data->save();
        $notification = array(
            'message' => 'Exam Type  Name Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('exam.type.view')->with($notification); 
    }

    public function EditExamType($id){

        $editdata = ExamType::find($id);
       
        return view('backend.setup.exam_type.edit_exam_type',compact('editdata')); 

    }

    public function UpdatexamType(Request $request, $id){


        $data = ExamType::find($id);
        $validated = $request->validate([
            
            'exam_type_name' => 'required|unique:exam_types,exam_type_name',
           
        ],
        [
           
            'exam_type_name.required' => 'Please Imput Exam Type  Name', 
            'exam_type_name.unique' => 'The Exam Type  Name  Already Used!!!',            
             
        ]);
        $data->exam_type_name = $request->exam_type_name;
        $data->save();
        $notification = array(
            'message' => 'Exam Type Data Updated Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('exam.type.view')->with($notification); 
    }

    public function ExamTypeDelete($id){

        ExamType::find($id)->delete();         
      
        $notification = array(
            'message' => 'Fee Category Data Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->route('exam.type.view')->with($notification);   
    }
    

}
