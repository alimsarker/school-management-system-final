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
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use niklasravnsborg\LaravelPdf\Facades\Pdf;


class StudentRegController extends Controller
{
    // View  Pages
    public function ViewStudentReg(){

       
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        $data['year_id'] = StudentYear::orderBy('id','desc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id','desc')->first()->id;
// dd($data['class_id']);

        $data['allData'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();

        return view('backend.student.student_reg.view_student_reg',$data);
        


    }
          // Student Year Class Wise Method
    
    public function StudentYClassWise(Request $request){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;


        $data['allData'] = AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();

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

        DB::transaction(function() use($request){
          $checkYear =  StudentYear::find($request->year_id)->year;
          $student = User::where('usertype','Student')->orderBy('id','DESC')->first();
            if ($student == NULL) {
                $firstReg = 0;
                $studentId = $firstReg+1;
                if ($studentId <10) {
                    $id_no = '000'.$studentId;
                }elseif ($studentId <100) {
                    $id_no = '00'.$studentId;
                }elseif ($studentId <1000) {
                    $id_no = '0'.$studentId;
                }

            }else{
  $student = User::where('usertype','Student')->orderBy('id','DESC')->first()->id;
   $studentId =  $student+1;
                if ($studentId <10) {
                    $id_no = '000'.$studentId;
                }elseif ($studentId <100) {
                    $id_no = '00'.$studentId;
                }elseif ($studentId <1000) {
                    $id_no = '0'.$studentId;
                }    
            } // End Main IF (else) condition


            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password  = bcrypt($code);
            $user->usertype = 'Student';
            $user->code = $code;
            $user->name  = $request->name;
            $user->fname = $request->fname;
            $user->mname  = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));

          if ($request->file('image')) {
                $file = $request->file('image');      
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images/'),$filename);
                $user['image'] = $filename;    
                
            }
            $user->save();   	

            $assign_student = new AssignStudent();
            $assign_student->student_id =  $user->id;
            $assign_student->year_id =  $request->year_id;
            $assign_student->class_id =  $request->class_id;
            $assign_student->group_id =  $request->group_id;
            $assign_student->shift_id  =  $request->shift_id;
            $assign_student->save();

            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id =  $assign_student->id;
            $discount_student->fee_category_id =  '2';
            $discount_student->discount  =  $request->discount;          

            $discount_student->save();

        });
        $notification = array(
            'message' => 'Student Registration Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('student.reg.view')->with($notification); 
    }

    // Edit  Pages

    public function EditStudentReg($student_id){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
       
        $data['editdata'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
    //    dd($data['editdata']->toArray());
        return view('backend.student.student_reg.edit_student_reg',$data);
    }


    // Update  Student Registration Pages

    public function UpdateStudentReg(Request $request, $student_id){
        DB::transaction(function() use($request,$student_id){
           
              $user = User::where('id',$student_id)->first();
              
              $user->name  = $request->name;
              $user->fname = $request->fname;
              $user->mname  = $request->mname;
              $user->mobile = $request->mobile;
              $user->address = $request->address;
              $user->gender = $request->gender;
              $user->religion = $request->religion;
              $user->dob = date('Y-m-d',strtotime($request->dob));
  
            if ($request->file('image')) {
                  $file = $request->file('image');
          @unlink(public_path('upload/student_images/'.$user->image));      
                  $filename = date('YmdHi').$file->getClientOriginalName();
                  $file->move(public_path('upload/student_images/'),$filename);
                  $user['image'] = $filename;    
                  
              }
              $user->save();   	
  
              $assign_student = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();
             
              $assign_student->year_id =  $request->year_id;
              $assign_student->class_id =  $request->class_id;
              $assign_student->group_id =  $request->group_id;
              $assign_student->shift_id  =  $request->shift_id;
              $assign_student->save();
  
              $discount_student = DiscountStudent::where('assign_student_id',$request->id)->first();
              
              $discount_student->discount  =  $request->discount;          
  
              $discount_student->save();
  
          });
          $notification = array(
              'message' => 'Student Registration Updated Successfully',
              'alert-type' => 'success'
          );
          return Redirect()->route('student.reg.view')->with($notification); 

    
    }



    // Student Registration Promotion Pages 


    public function PromotionStudentReg($student_id){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
       
        $data['editdata'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
    
        return view('backend.student.student_reg.student_promotion',$data);

  
    }

    // STUDENT PROMOTION METHOD

    public function PromotionStudent(Request $request, $student_id){

        DB::transaction(function() use($request,$student_id){
           
            $user = User::where('id',$student_id)->first();
            
            $user->name  = $request->name;
            $user->fname = $request->fname;
            $user->mname  = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));

          if ($request->file('image')) {
                $file = $request->file('image');
        @unlink(public_path('upload/student_images/'.$user->image));      
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images/'),$filename);
                $user['image'] = $filename;    
                
            }
            $user->save();   	

            $assign_student = new AssignStudent();
           
            $assign_student->student_id = $student_id;
            $assign_student->year_id =  $request->year_id;
            $assign_student->class_id =  $request->class_id;
            $assign_student->group_id =  $request->group_id;
            $assign_student->shift_id  =  $request->shift_id;
            $assign_student->save();

            $discount_student = new DiscountStudent();
            
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id  =  '2'; 
            $discount_student->discount  =  $request->discount;          

            $discount_student->save();

        });
        $notification = array(
            'message' => 'Student Promotion To Next Class  Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('student.reg.view')->with($notification);



    }

    public function DetailStudentReg($student_id){
        $data['details'] = AssignStudent::with(['student','discount','student_class','student_group','student_shift'])->where('student_id',$student_id)->first();

        $pdf = Pdf::loadView('backend.student.student_reg.student_details_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }


}//End Main
