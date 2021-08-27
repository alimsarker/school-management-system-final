<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<table id="customers">
  <tr>
  <td><h2>
  <?php $image_path = '/upload/easyschool.png'; ?>
  <img src="{{ public_path() . $image_path }}" width="200" height="100">
    </h2></td>
    <td>Employee Monthly Salary Details
    <p><b>Office copy</b></p>
    </td>
   
    <td>
    <p>Police Line, Pbana.</p>
    <p>Phone: 0731xxxxxx</p>
    <p>E-mail: support@ppschool.com</p>
    </td>
  
    
  </tr>
  

 
</table>
@php 

 $date = date('Y-m',strtotime($details['0']->date));
       if ($date !='') {
        $where[] = ['date','like',$date.'%'];
       }

      $totalattend = App\Models\EmployeeAttendance::with(['employee'])->where($where)->where('employee_id',$details['0']->employee_id)->get();

        $salary = (float)$details['0']['employee']['selary'];
        $salaryperday = (float)$salary/30;
        $absentcount = count(($totalattend->where('attend_status','Absent')));
        
        
        $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
        $totalsalary = (float)$salary-(float)$totalsalaryminus;
 
@endphp 
<table id="customers">
  <tr>
    <th width="10%">SL</th>
    <th width="60%">Employee DETAILS</th>
    <th width="30%">Employee DATA</th>
  </tr>

 

  <tr>
    <td>1</td>
    <td><b>Employee Name :</b></td>
    <td>{{$details['0']['employee']['name'] }}</td>
  </tr> 

  <tr>
    <td>2</td>
    <td><b>Employee ID No :</b></td>
    <td>{{$details['0']['employee']['id_no']}}</td>
  </tr>

  <tr>
    <td>3</td>
    <td><b>Employee Designation :</b></td>
    <td>{{ $details['0']['employee']['designation']['title']  }}</td>
  </tr>

  <tr>
    <td>4</td>
    <td><b>Employee Basic Salary  :</b></td>
    <td>{{ $details['0']['employee']['selary'] }} Tk.</td>
  </tr>
  

  
  <tr>
    <td>5</td>
    <td><b>Month :</b></td>
    <td>{{ date('M Y',strtotime($details['0']->date )) }}</td>
  </tr>

  
  

  <tr>
    <td>6</td>
    <td><b>Employee Total Absent This Month And Amount:</b></td>
    <td>{{  $absentcount }} Day/Days = Tk. {{ $totalsalaryminus }}</td>
  </tr>



  <tr>
    <td>7</td>
    <td><b>Employee Payment salary This Month:</b></td>
    <td>{{  $totalsalary }} Tk.</td>
  </tr>

 
  
  

</table>
<br> <br>
    <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

    <br> <br>
    <br> <br>
    <hr style="border: dashed 2px; width:95%; color:#000000; margin-bottom:10px;">



<table id="customers">
  <tr>
  <td><h2>
  <?php $image_path = '/upload/easyschool.png'; ?>
  <img src="{{ public_path() . $image_path }}" width="50" height="50">

    </h2></td>
    <td>Employee Monthly Salary Details
    <p><b>Employee copy</b></p>
    </td>
    
    <td>
    <p>Police Line, Pbana.</p>
    <p>Phone: 0731xxxxxx</p>
    <p>E-mail: support@ppschool.com</p>
    </td>
  
    
  </tr>
  

 
</table>

<table id="customers">
  <tr>
    <th width="10%">SL</th>
    <th width="60%">Employee DETAILS</th>
    <th width="30%">Employee DATA</th>
  </tr>

 

  <tr>
    <td>1</td>
    <td><b>Employee Name :</b></td>
    <td>{{$details['0']['employee']['name'] }}</td>
  </tr> 

  <tr>
    <td>2</td>
    <td><b>Employee ID No :</b></td>
    <td>{{$details['0']['employee']['id_no']}}</td>
  </tr>

  <tr>
    <td>3</td>
    <td><b>Employee Designation :</b></td>
    <td>{{ $details['0']['employee']['designation']['title']  }}</td>
  </tr>

  <tr>
    <td>4</td>
    <td><b>Employee Basic Salary  :</b></td>
    <td>{{ $details['0']['employee']['selary'] }} Tk.</td>
  </tr>
  

  
  <tr>
    <td>5</td>
    <td><b>Month :</b></td>
    <td>{{ date('M Y',strtotime($details['0']->date )) }}</td>
  </tr>

  
  

  <tr>
    <td>6</td>
    <td><b>Employee Total Absent This Month And Amount:</b></td>
    <td>{{  $absentcount }} Day/Days = Tk. {{ $totalsalaryminus }}</td>
  </tr>



  <tr>
    <td>7</td>
    <td><b>Employee Payment salary This Month:</b></td>
    <td>{{  $totalsalary }} Tk.</td>
  </tr>



 
  
  

</table>
<br> <br>
    <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>
</html>