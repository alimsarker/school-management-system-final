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
use App\Models\EmployeeAttendance;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class EmployeeAttendController extends Controller
{
    public function ViewEmployeeAttend(){
        $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','DESC')->get();
        // $data['allData'] = EmployeeAttendance::orderBy('id','DESC')->get();
        return view('backend.employee.employee_attendance.employee_attendance_view',$data);
    }

    public function AddEmployeeAttend(){

        $data['employee'] = User::where('usertype','Employee')->get();
        
        return view('backend.employee.employee_attendance.employee_attendance_add',$data);
    }

    public function StoreEmployeeAttend(Request $request){

        $countemployee = count($request->employee_id);
        for ($i=0; $i <$countemployee; $i++) { 
           $attend_status = 'attend_status'.$i;

           $attend = new EmployeeAttendance();
           $attend->date = date('Y-m-d',strtotime($request->date));
           $attend->employee_id = $request->employee_id[$i];
           $attend->attend_status = $request->$attend_status;
           $attend->save();

        } //End For Loop
        $notification = array(
            'message' => 'Employee Attendance Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('employee.attendance.view')->with($notification); 

    } //end method

    public function EditEmployeeAttend($date){

        $data['editData'] = EmployeeAttendance::where('date',$date)->get();
        $data['employee'] = User::where('usertype','Employee')->get();

        return view('backend.employee.employee_attendance.employee_attendance_edit',$data);
    }


    public function UpdateEmployeeAttend(Request $request){

        EmployeeAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();

        $countemployee = count($request->employee_id);
        for ($i=0; $i <$countemployee; $i++) { 
           $attend_status = 'attend_status'.$i;

           $attend = new EmployeeAttendance();
           $attend->date = date('Y-m-d',strtotime($request->date));
           $attend->employee_id = $request->employee_id[$i];
           $attend->attend_status = $request->$attend_status;
           $attend->save();

        } //End For Loop
        $notification = array(
            'message' => 'Employee Attendance Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('employee.attendance.view')->with($notification); 


    } //end method

    public function DetailsEmployeeAttend($date){

        $data['details'] = EmployeeAttendance::where('date',$date)->get();
        // $data['employee'] = User::where('usertype','Employee')->get();

        return view('backend.employee.employee_attendance.employee_attendance_details',$data);

    }
}
