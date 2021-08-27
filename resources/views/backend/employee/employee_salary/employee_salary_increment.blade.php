@extends('admin.admin_master')
@section('admincontent')
<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span> Employee Salary  </span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Employee Management</a>
                  </li>
                  <li class="breadcrumb-item active">  Employee Salary
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
          <h4 class="card-title">Employee Salary Increment</h4>
          <form method="POST" action="{{ route('update.increment.store',$incrementData->id) }}"> @csrf
            <div class="row">
                     
                        
                        <div class="input-field col m6 s9">
                            <input  type="text" name="increment_salary" class="block mt-1 w-full" required="">
                            <label for="increment_salary">Salary Amount</label>
                            
                        </div>


                        <div class="input-field col m6 s9">
                            <input type="date" name="effected_salary" class="block mt-1 w-full" required="">
                            <label for="effected_salary">Salary Effected Date</label>
                           
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
@endsection