<?php

namespace App\Http\Controllers\Backend\Setup;

use Illuminate\Http\Request;
use App\Models\SchoolSubject;
use App\Http\Controllers\Controller;

class SchoolSubjectController extends Controller
{
    public  function ViewSchoolSubject()
    {
        $data['schoolSubjectData'] = SchoolSubject::all();
    return view('backend.setup.school_subject.view_school_subject',$data);
  
    }
    
    public function AddSchoolSubject(){

        return view('backend.setup.school_subject.add_school_subject');
    }

    

   
    public function StoreSchoolSubject(Request $request){

        $validated = $request->validate([
            
            'school_subject_name' => 'required|unique:school_subjects,school_subject_name',
           
        ],
        [
           
            'school_subject_name.required' => 'Please Imput School Subjec  Name', 
            'school_subject_name.unique' => 'The School Subjec  Name  Already Used!!!',            
             
        ]);

        $data = new SchoolSubject();
        $data->school_subject_name = $request->school_subject_name;
        
        $data->save();
        $notification = array(
            'message' => 'School Subject Name Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('school.subject.view')->with($notification); 
    }

    public function EditSchoolSubject($id){

        $editdata = SchoolSubject::find($id);
       
        return view('backend.setup.school_subject.edit_school_subject',compact('editdata')); 

    }

    public function UpdateSchoolSubject(Request $request, $id){


        $data = SchoolSubject::find($id);
        $validated = $request->validate([
            
            'school_subject_name' => 'required|unique:school_subjects,school_subject_name',
           
        ],
        [
           
            'school_subject_name.required' => 'Please Imput School Subjec  Name', 
            'school_subject_name.unique' => 'The School Subjec  Name  Already Used!!!',            
             
        ]);
        $data->school_subject_name = $request->school_subject_name;
        $data->save();
        $notification = array(
            'message' => 'School Subjec Name Updated Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('school.subject.view')->with($notification); 
    }

    public function SchoolSubjectDelete($id){

        SchoolSubject::find($id)->delete();         
      
        $notification = array(
            'message' => 'School Subject Name Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->route('school.subject.view')->with($notification);   
    }
}
