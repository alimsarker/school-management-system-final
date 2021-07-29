<?php

namespace App\Http\Controllers\backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\FeeCategoryAmount;
use App\Models\ExamType;
use App\Models\Designation;
use App\Models\EmployeeSallaryLog;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;


class EmployeeRegController extends Controller
{
    public function ViewEmployee(){

        $data['allData'] = User::where('usertype','Employee')->get();
        return view('backend.employee.employee_reg.employee_reg_view',$data);
        
        
    }


    public function AddEmployeeReg(){

        $data['designation'] = Designation::all();

        return view('backend.employee.employee_reg.employee_reg_add',$data);
    }


    public function StoreEmployeeReg(Request $request){

        DB::transaction(function() use($request){
            $checkYear = date('Ym',strtotime($request->join_date));
            // dd($checkYear);
          $employee = User::where('usertype','Employee')->orderBy('id','DESC')->first();
            if ($employee == NULL) {
                $firstReg = 0;
                $employeeId = $firstReg+1;
                if ($employeeId <10) {
                    $id_no = '000'.$employeeId;
                }elseif ($employeeId <100) {
                    $id_no = '00'.$employeeId;
                }elseif ($employeeId <1000) {
                    $id_no = '0'.$employeeId;
                }

            }else{
  $employee = User::where('usertype','Employee')->orderBy('id','DESC')->first()->id;
   $employeeId =  $employee+1;
                if ($employeeId <10) {
                    $id_no = '000'.$employeeId;
                }elseif ($employeeId <100) {
                    $id_no = '00'.$employeeId;
                }elseif ($employeeId <1000) {
                    $id_no = '0'.$employeeId;
                }    
            } // End Main IF (else) condition


            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password  = bcrypt($code);
            $user->usertype = 'Employee';
            $user->code = $code;
            $user->name  = $request->name;
            $user->fname = $request->fname;
            $user->mname  = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->selary  = $request->selary;
            $user->designation_id  = $request->designation_id;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->join_date = date('Y-m-d',strtotime($request->join_date));

          if ($request->file('image')) {
                $file = $request->file('image');      
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images/'),$filename);
                $user['image'] = $filename;    
                
            }
            $user->save();   	

            $employee_salary = new EmployeeSallaryLog();
            $employee_salary->employee_id =  $user->id;
            $employee_salary->effected_salary  =  date('Y-m-d',strtotime($request->join_date));
            $employee_salary->previous_salary  =  $request->selary;
            $employee_salary->present_salary  =  $request->selary;
            $employee_salary->increment_salary =  '0';
          
            $employee_salary->save();

           

        });
        $notification = array(
            'message' => 'Employee Registration Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('employee.reg.view')->with($notification); 
    } //End Store Method



    public function EditEmployeeReg($id){

                $data['editData'] = User::find($id);
                $data['designation'] = Designation::all();

                return view('backend.employee.employee_reg.employee_reg_edit',$data);

    }//End Edit Method


    public function UpdateEmployeeReg(Request $request, $id){

      
            $user = User::find($id);           
            $user->name  = $request->name;
            $user->fname = $request->fname;
            $user->mname  = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
           
            $user->designation_id  = $request->designation_id;
            $user->dob = date('Y-m-d',strtotime($request->dob));
          

          if ($request->file('image')) {
                $file = $request->file('image'); 
                @unlink(public_path('upload/employee_images/'.$user->image));         
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images/'),$filename);
                $user['image'] = $filename;    
                
            }
            $user->save();   	

     
        $notification = array(
            'message' => 'Employee Registration Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('employee.reg.view')->with($notification);



    }//End Update Method
    

    public function DetailEmployeeReg($id){

        $data['details'] = User::find($id);

        $pdf = PDF::loadView('backend.employee.employee_reg.employee_reg_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');


    }


}
