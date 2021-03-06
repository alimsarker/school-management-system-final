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
  <img src="{{ public_path() . $image_path }}" width="100" height="50">

    </h2></td>
    <td><b> Office Copy</b><br>Student Pay Slip<br><b>Month  Of {{ $month }}  </b></td>
    <td>
    <p>Police Line, Pbana.</p>
    <p>Phone: 0731xxxxxx</p>
    <p>E-mail: support@ppschool.com</p>
    </td>
  
    
  </tr>
  

 
</table>
@php
    $registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id','2')->where('class_id',$details->class_id)->first();

    $originalfee = $registrationfee->amount;
    $discount = $details['discount']['discount'];
    $discounttablefee = $discount/100*$originalfee;
    $finalfee = (float)$originalfee-(float)$discounttablefee;

@endphp


<table id="customers">
  <tr>
    <th width="10%">SL</th>
    <th width="35%">STUDENT DETAILS</th>
    <th width="55%">STUDENT DATA</th>
  </tr>

  <tr>
    <td>1</td>
    <td><b>Student ID No :</b></td>
    <td>{{$details['student']['id_no']}}</td>
  </tr>

  <tr>
    <td>2</td>
    <td><b>Student Class Roll :</b></td>
    <td>{{ $details->roll }}</td>  
  </tr>

  <tr>
    <td>3</td>
    <td><b>Student Name :</b></td>
    <td>{{$details['student']['name']}}; (Mobile: {{$details['student']['mobile']}} )</td>
  </tr> 

  

  <tr>
    <td>4</td>
    <td><b>Student Father's Name   :</b></td>
    <td>{{$details['student']['fname']}}</td>
  </tr>

  <tr>
    <td>5</td>
    <td><b>Student Session:</b></td>
    <td>{{$details['student_year']['year']}}</td>
  </tr>

  <tr>
    <td>6</td>
    <td><b>Student Class :</b></td>
    <td>{{$details['student_class']['name']}} </td>
  </tr>

  <tr>
    <td>7</td>
    <td><b>Student Group and Shift :</b></td>
    <td>Group: {{$details['student_group']['group']}} , Shift : {{$details['student_shift']['shift_name']}}</td>
  </tr>


 

  <tr>
    <td>8</td>
    <td><b>Student Monthly Fee :</b></td>
    <td>{{ $originalfee }} Tk For <b> {{ $month }}</td>
  </tr>

  <tr>
    <td>9</td>
    <td><b>Student Discount :</b></td>
    <td>{{$details['discount']['discount']}}%</td>
  </tr>

  <tr>
    <td>10</td>
    <td><b>Student Net Payment : </b></td>
    <td>{{ $finalfee }} Tk For <b> {{ $month }}</b></td>
  </tr>

</table>

<br> 
    <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

    <hr style="border: dashed 2px; width:95%; color:#000000; margin-bottom:10px;">

    <table id="customers">
  <tr>
  <td><h2>
  <?php $image_path = '/upload/easyschool.png'; ?>
  <img src="{{ public_path() . $image_path }}" width="100" height="50">

    </h2></td>
    <td><b> Student Copy</b><br>Student Pay Slip<br><b> Month  Of {{ $month }}</b></td>
    
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
    <th width="35%">STUDENT DETAILS</th>
    <th width="55%">STUDENT DATA</th>
  </tr>

  <tr>
    <td>1</td>
    <td><b>Student ID No :</b></td>
    <td>{{$details['student']['id_no']}}</td>
  </tr>

  <tr>
    <td>2</td>
    <td><b>Student Class Roll :</b></td>
    <td>{{ $details->roll }}</td>  
  </tr>

  <tr>
    <td>3</td>
    <td><b>Student Name :</b></td>
    <td>{{$details['student']['name']}}; (Mobile: {{$details['student']['mobile']}} )</td>
  </tr> 

  

  <tr>
    <td>4</td>
    <td><b>Student Father's Name   :</b></td>
    <td>{{$details['student']['fname']}}</td>
  </tr>

  <tr>
    <td>5</td>
    <td><b>Student Session:</b></td>
    <td>{{$details['student_year']['year']}}</td>
  </tr>

  <tr>
    <td>6</td>
    <td><b>Student Class :</b></td>
    <td>{{$details['student_class']['name']}} </td>
  </tr>

  <tr>
    <td>7</td>
    <td><b>Student Group and Shift :</b></td>
    <td>Group: {{$details['student_group']['group']}} , Shift : {{$details['student_shift']['shift_name']}}</td>
  </tr>


  

  <tr>
    <td>8</td>
    <td><b>Student Monthly Fee :</b></td>
    <td>{{ $originalfee }} Tk For <b> {{ $month }}</td>
  </tr>

  <tr>
    <td>9</td>
    <td><b>Student Discount :</b></td>
    <td>{{$details['discount']['discount']}}%</td>
  </tr>

  <tr>
    <td>10</td>
    <td><b>Student Net Payment : </b></td>
    <td>{{ $finalfee }} Tk For <b> {{ $month }}</b></td>
  </tr>

</table>
<i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>
</body>
</html>