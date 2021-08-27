<?php

namespace App\Http\Controllers\Backend\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\StudentClass;
use App\Models\SchoolSubject;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubject(){
        // $data['allData'] = AssignSubject::all();
       $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject',$data);     
        
    }

    public function AddAssignSubject(){        

        $data['subject'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();

        // return view('backend.setup.assign_subject.add_assign_subject',$data);
        return view('backend.setup.assign_subject.add_assign_subject_TEST',$data);

    }

    public function StoreAssignSubject(Request $request){

        $countSubject = count($request->subject_id);
        if ($countSubject !=NULL) {
              for ($i=0; $i <$countSubject ; $i++) { 
                  
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id  = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
  
              } // End of for condition 
            
        }//End of if condition
  
        $notification = array(
          'message' => 'Assign Subject Inserted Successfully',
          'alert-type' => 'info'
      );
      return Redirect()->route('assign.subject.view')->with($notification); 
  
     } //End of StoreFeeAmount Method  

     public function EditAssignSubject($class_id){

        $data['editData'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
    //  dd($data['editData']->toArray());
     $data['subject'] = SchoolSubject::all();
     $data['classes'] = StudentClass::all();
 
         return view('backend.setup.assign_subject.edit_assign_subject',$data);
 

    }
//Update Section Start

    public function UpdateAssignSubject(Request $request, $class_id){

        if ($request->subject_id == NULL) {
            $notification = array(
                'message' => 'Subject Mark Data Field!!! Required!!!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification); 
        
        }else{
            $countSubject = count($request->subject_id);
            AssignSubject::where('class_id',$class_id)->delete();
                  for ($i=0; $i <$countSubject ; $i++) { 
                      
                    $assign_subject = new AssignSubject();
                    $assign_subject->class_id = $request->class_id;
                    $assign_subject->subject_id  = $request->subject_id[$i];
                    $assign_subject->full_mark = $request->full_mark[$i];
                    $assign_subject->pass_mark = $request->pass_mark[$i];
                    $assign_subject->subjective_mark = $request->subjective_mark[$i];
                    $assign_subject->save();
      
                  } // End of for condition  
        }  //End else 
    
        
                
            
      
        $notification = array(
            'message' => 'Subject Mark Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('assign.subject.view')->with($notification);
    
       } //End Method


       public function AssignSubjectDelete(){
        
        $data['allData'] = AssignSubject::all();
        $data['subject'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
    
        return view('backend.setup.assign_subject.delet_assign_subject',$data);
    
    }

    public function AssignSubjectDeleted($id){

        AssignSubject::find($id)->delete();
          
        $notification = array(
            'message' => 'Assign SubjectData Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->route('assign.subject.view')->with($notification); 
    
     }

     public function DetailsAssignSubject($class_id){

        $data['detailsData'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
    
        return view('backend.setup.assign_subject.details_assign_subject',$data);
       }

     
}
 