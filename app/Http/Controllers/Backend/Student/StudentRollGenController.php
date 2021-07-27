<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\user;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;


class StudentRollGenController extends Controller
{
   
        public function ViewRollGen(){

            $data['years'] = StudentYear::all();
            $data['classes'] = StudentClass::all();

            return view('backend.student.roll_generate.roll_generate_view',$data);
        }

    public function GetStudents(Request $request){

            // dd('OK DONE');

     $allData = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
    // dd($allData->toArray());
    return response()->json($allData);


    }


    public function RollGenStore(Request $request){

        $year_id = $request->year_id;
        $class_id = $request->class_id;

        if ($request->student_id !=null) {
            for ($i=0; $i < count($request->student_id); $i++) { 
                
                AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['roll'=>$request->roll[$i]]);
  

            } // end for Loop
        }else{

        $notification = array(
            'message' => 'Sorry There Are No Students',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);

        } // end if else condition

        $notification = array(
            'message' => 'Student Roll Generated  Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    } // end method



}
