<?php

namespace App\Http\Controllers\Backend\Marks;

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

class MarksController extends Controller
{
    public function AddMarks(){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        $data['subject'] = SchoolSubject::all();
        $data['assignsub'] = AssignSubject::all();

        // return view('backend.marks.marks_add',$data);
        return view('backend.marks.marks_add_TEST',$data);

    }
}
