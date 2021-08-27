<?php

namespace App\Http\Controllers\Backend\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
use App\Models\EmployeeAttendance;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;


class EmployeeMonthlySalaryController extends Controller
{
    public function ViewEmployeeMonthSalary(){        

        return view('backend.employee.employee_monthly_salary.employee_monthly_salary_view');
    }

    public function ViewEmployeeMonthlySalary(Request $request){

        $date = date('Y-m',strtotime($request->date));

        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }
       
        $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['employee'])->where($where)->get();
        // dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>Employee Name</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Designation</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary This Month</th>';
        $html['thsource'] .= '<th>Action</th>';


        foreach ($data as $key => $attend) {
            $designation = Designation::all();
            $totalattend = EmployeeAttendance::with(['employee'])->where($where)->where('employee_id',$attend->employee_id)->get();
            $absentcount = count($totalattend->where('attend_status','Absent'));
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attend['employee']['name'].'</td>'; 
            $html[$key]['tdsource'] .= '<td>'.$attend['employee']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attend['employee']['designation']['title'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attend['employee']['selary'].'</td>';
           
            
            $salary = (float)$attend['employee']['selary'];
            $salaryperday = (float)$salary/30;
            $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
            $totalsalary = (float)$salary-(float)$totalsalaryminus;
           

            $html[$key]['tdsource'] .='<td>'.$totalsalary.' Tk'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("employee.monthly.salary.payslip",$attend->employee_id).'">Pay Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

        }  
       return response()->json(@$html);


    } // end Method


    public function ViewEmployeeMonthlyPaySlip(Request $request, $employee_id){

        $id = EmployeeAttendance::where('employee_id',$employee_id)->first();

        $date = date('Y-m',strtotime($id->date));

        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }

      ;

    $data['details'] = EmployeeAttendance::with(['employee'])->where($where)->where('employee_id',$id->employee_id)->get();
        $pdf = PDF::loadView('backend.employee.employee_monthly_salary.employee_monthly_salary_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
       
    
       }



}
