<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\user;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\ExamType;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use App\Models\StudentMarks;
use App\Models\SchoolSubject;
use App\Models\AssignSubject;

class DefaultGetMarksController extends Controller
{
   public function GetSubject(Request $request){

        $class_id = $request->class_id;
        $allData = AssignSubject::with(['student_subject'])->where('class_id',$class_id)->get();
        return response()->json($allData);


   }



}
