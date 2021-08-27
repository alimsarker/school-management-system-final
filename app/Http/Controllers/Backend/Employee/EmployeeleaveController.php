<?php

namespace App\Http\Controllers\Backend\Employee;

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
use App\Models\LeaveEmployee;
use App\Models\LeavePurpose;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class EmployeeleaveController extends Controller
{
   public function ViewEmployeeleave(){

       
        $data['allData'] = LeaveEmployee::orderBy('id','desc')->get();
      
        return view('backend.employee.employee_leave.employee_leave_view',$data);
   }

   public function AddEmployeeleave(){

    $data['employee'] = User::where('usertype','Employee')->get();
    $data['leave_purpose'] = LeavePurpose::all();
    return view('backend.employee.employee_leave.employee_leave_add',$data);
   }

   public function StoreEmployeeleave(Request $request){

      if ($request->leave_purpose_id == '0') {
         $leavepurpose = new LeavePurpose();
         $leavepurpose->name = $request->name;
         $leavepurpose->save();
         $leave_purpose_id = $leavepurpose->id;

      }else{
         $leave_purpose_id = $request->leave_purpose_id;

      }

      $data = new LeaveEmployee();
      $data->employee_id = $request->employee_id;
      $data->leave_purpose_id =  $leave_purpose_id;
      $data->start_date = date('Y-m-d',strtotime($request->start_date));
      $data->end_date = date('Y-m-d',strtotime($request->end_date));
      
      $data->save();

      $notification = array(
         'message' => 'Employee Leave Inserted Successfully',
         'alert-type' => 'success'
     );
     return Redirect()->route('employee.leave.view')->with($notification); 

   } //End Method
   
   
   public function EditEmployeeleave($id){

      $data['editData'] = LeaveEmployee::find($id);
      $data['employee'] = User::where('usertype','Employee')->get();
      $data['leave_purpose'] = LeavePurpose::all();
      return view('backend.employee.employee_leave.employee_leave_edit',$data);

   }

   public function UpdateEmployeeleave(Request $request, $id){

      if ($request->leave_purpose_id == '0') {
         $leavepurpose = new LeavePurpose();
         $leavepurpose->name = $request->name;
         $leavepurpose->save();
         $leave_purpose_id = $leavepurpose->id;

      }else{
         $leave_purpose_id = $request->leave_purpose_id;

      }

      $data = LeaveEmployee::find($id);
      $data->employee_id = $request->employee_id;
      $data->leave_purpose_id =  $leave_purpose_id;
      $data->start_date = date('Y-m-d',strtotime($request->start_date));
      $data->end_date = date('Y-m-d',strtotime($request->end_date));
      
      $data->save();

      $notification = array(
         'message' => 'Employee Leave Data Updated Successfully',
         'alert-type' => 'success'
     );
     return Redirect()->route('employee.leave.view')->with($notification);

   } /// End Method


   public function DeleteEmployeeleave($id){

      $leave = LeaveEmployee::find($id);
      $leave->delete();

      $notification = array(
         'message' => 'Employee Leave Data Deleted Successfully',
         'alert-type' => 'success'
     );
     return Redirect()->route('employee.leave.view')->with($notification);


   }

}
