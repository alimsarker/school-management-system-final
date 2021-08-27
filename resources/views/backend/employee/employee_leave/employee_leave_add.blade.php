@extends('admin.admin_master')
@section('admincontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span> Employee Leave  </span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Employee Management</a>
                  </li>
                  <li class="breadcrumb-item active">  Employee Leave 
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
                        <h4 class="card-title">Employee Leave</h4>
                        <form method="POST" action="{{ route('employee.leave.store') }}"> @csrf
                        <div class="row">

                                    <div class="input-field col m6 s9">
                                    <select name="employee_id"  class="block mt-1 w-full" required="">
                                    <option value="" disabled selected>Choose Employee Name</option>
                                    @foreach($employee as $value)
                                            <option value="{{ $value->id }}"> {{ $value->name }}</option>
                                            @endforeach                           
                            
                                    </select>
                            <label>Select Employee Name</label>
                                        
                                    </div>

                                    <div class="input-field col m6 s9">
                                    <input type="date" name="start_date" class="block mt-1 w-full" required="">
                                        <label for="start_date">Start Date</label>
                                        
                                    </div>


                                    <div class="input-field col m6 s9">
                                    <select name="leave_purpose_id" id="leave_purpose_id" class="block mt-1 w-full" required="">
                                    <option value="" disabled selected>Choose   Leave purpose</option>
                                    @foreach($leave_purpose as $value)
                                            <option value="{{ $value->id }}"> {{ $value->name }}</option>
                                            @endforeach                           
                                            <option value="0"> New Purpose</option>
                                    </select>
                                    <input type="text" name="name" id="add_another" class="block mt-1 w-full" placeholder="Write Purpose" style="display: none;"> 
                                    <label>Select Employee Leave purpose</label>               
                                        </div>
                                    
                                    


                                    <div class="input-field col m6 s9">
                                        <input type="date" name="end_date" class="block mt-1 w-full" required="">
                                        <label for="end_date">End Date</label>
                                        
                                    </div>
                            </div>
                        
                        
                            <div class="row">
                            <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
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


<script type="text/javascript">
   $(document).ready(function(){
     $(document).on('change','#leave_purpose_id',function(){

      var leave_purpose_id = $(this).val();
        if (leave_purpose_id == '0') {
          $('#add_another').show();

        }else{
          $('#add_another').hide();
        }

     });
    
   });

</script>

@endsection