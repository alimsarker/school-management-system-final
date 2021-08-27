@extends('admin.admin_master')
@section('admincontent')
<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span> Employee Attendance  </span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Employee Management</a>
                  </li>
                  <li class="breadcrumb-item active">  Employee Attendance 
                  </li>
                </ol>
              </div>
            
            </div>
          </div>
        </div>

<div class="section">
<div class="col s9 m9 l9">
      <div id="Form-advance" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Edit Attendance</h4>
          <form method="POST" action="{{ route('employee.attendance.update') }}"> @csrf
                    <div class="row">
                     
                        
                        <div class="input-field col m6 s6">
                            <input  type="date" name="date" class="block mt-1 w-full" required="" value="{{ $editData['0']['date'] }}">
                            <label for="date">Attendance date</label>
                            
                         
                        </div>
                    </div>

                    <div class="row">
                    <div class="col s12">
                           <table class="bordered">
                               <thead>
                                   <tr>
                                       <th rowspan="2"  style="vertical-align: middle; text-align:center;">SL</th>
                                       <th rowspan="2"  style="vertical-align: middle; text-align:center;">Employee Name</th>
                                       <th rowspan="2"  style="vertical-align: middle; text-align:center;">Employee Designation</th>
                                       <th colspan="3"  style="vertical-align: middle; text-align:center; width:30%">Attendance Status</th>
                                   </tr>
                                   <tr>
                                       <th class="btn present_all" style="display: table-cell; text-align:center; background-color:blueviolet">Present</th>
                                       <th class="btn leave_all" style="display: table-cell; text-align:center; background-color:chocolate">Leave</th>
                                       <th class="btn absent_all" style="display: table-cell; text-align:center; background-color:darkred">Absent</th>
                                   </tr>
                               </thead>
                               <tbody>

                               @foreach($editData as $key=> $data)
                                 <tr id="div{{$data->id}}">
                                    <input type="hidden" name="employee_id[]" value="{{$data->employee_id}}">
                                 <td style="text-align:center;">{{ $key+1 }}</td>
                                 <td  style="text-align:center;">{{ $data['employee']['name'] }}</td> 
                                 <td  style="text-align:center;">{{ $data['employee']['designation']['title'] }}</td> 
                                 <td colspan="3" style="text-align:center;">
                                   <div class="switch toggle switch-3 switch-candy" id="view-radio-buttons">
                                  
                                   <label for="present{{ $key }}">
                                    <input name="attend_status{{ $key }}" type="radio"  id="present{{ $key }}" value="Present" checked="checked"  {{ ($data->attend_status  == "Present")? "checked":"" }}>
                                    <span>Present</span>
                                  </label>
                                         
                                  <label for="leave{{ $key }}">
                                  <input name="attend_status{{ $key }}" type="radio"  id="leave{{ $key }}" value="Leave"  {{ ($data->attend_status  == "Leave")? "checked":"" }}>
                                  <span>Leave</span>
                                </label>

                                <label for="absent{{ $key }}">
                                  <input name="attend_status{{ $key }}" type="radio"  id="absent{{ $key }}" value="Absent"  {{ ($data->attend_status  == "Absent")? "checked":"" }}>
                                  <span>Absent</span>
                                </label>
                                            
                                          
                                         
                                   </div>
                                 </td>

                                 </tr>
                              @endforeach
                               </tbody>

                           </table>
                         
                        </div>
                    </div>




               
          
            
              <div class="row">
                <div class="input-field col s12 mt-5">
                  <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Update
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  </div>     
</div>
</div>
@endsection