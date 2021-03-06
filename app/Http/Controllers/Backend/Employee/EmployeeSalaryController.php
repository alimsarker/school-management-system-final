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
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class EmployeeSalaryController extends Controller
{
   public function ViewEmployeeSalary(){

    $data['allData'] = User::where('usertype','Employee')->get();
    return view('backend.employee.employee_salary.employee_salary_view',$data);
   }


   public function EmployeeSalariIncrement($id){

       $data['incrementData'] = User::find($id);
       return view('backend.employee.employee_salary.employee_salary_increment',$data);

   }


   public function UpdateSalariIncrement(Request $request, $id){

    $user = User::find($id);
    $previous_salary = $user->selary;
    $present_salary = (float)$previous_salary+(float)$request->increment_salary;
    $user->selary = $present_salary;
    $user->save();

    $salaryData = new EmployeeSallaryLog();
    $salaryData->employee_id = $id;
    $salaryData->previous_salary = $previous_salary;
    $salaryData->increment_salary = $request->increment_salary;
    $salaryData->present_salary  = $present_salary;
    $salaryData->effected_salary = date('Y-m-d',strtotime($request->effected_salary));
    $salaryData->save();

    $notification = array(
        'message' => 'Employee Salary Increment  Successfully',
        'alert-type' => 'success'
    );
    return Redirect()->route('employee.salary.view')->with($notification);

   }


   public function DetailEmployeeSalary($id){

    $data['details'] = User::find($id);
    $data['salary_log'] = EmployeeSallaryLog::where('employee_id',$data['details']->id)->get();
// dd($data['salary_log']->toArray());

    return view('backend.employee.employee_salary.employee_salary_details',$data);

   }

}
