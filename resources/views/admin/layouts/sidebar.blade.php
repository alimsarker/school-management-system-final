
@php


$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<!-- BEGIN: SideNav-->
  <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
      <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img class="hide-on-med-and-down" src="{{ asset('backend/app-assets/images/logo/materialize-logo-color.png') }}" alt="materialize logo"/><img class="show-on-medium-and-down hide-on-med-and-up" src="{{ asset('backend/app-assets/images/logo/materialize-logo.png') }}" alt="materialize logo"/><span class="logo-text hide-on-med-and-down">P.P.L.SCHOOL</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
      </div>
      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="bold"><a class="{{ ($route == 'dashboard') ? 'active' : '' }}"" href="{{  route('dashboard') }}"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
        </li>

        <!-- ---------View Profile-------------------------------------------------------------------------------------------------- -->
        
        <li class="navigation-header"><a class="navigation-header-text">SIDEBAR </a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        @if(Auth::user()->role=='Admin')
        <li class="bold"><a class="waves-effect waves-cyan  {{ ($route == 'profile.view') ? 'active' : '' }}" href="{{  route('profile.view') }}"><i class="material-icons">person_outline</i><span class="menu-title" data-i18n="User Profile">View Profile</span></a>
        </li>
        <!-- ---------------------------------Account Setting-------------------------------------------------------------------------- -->
        
        <li class="bold"><a class="waves-effect waves-cyan {{ ($route == 'profile.setting') ? 'active' : '' }}" href="{{ route('profile.setting')}}"><i class="material-icons">settings_applications</i><span class="menu-title" data-i18n="User Profile">Account Setting</span></a>
        </li>
      
        <!-- ---------------------------------User Setting-------------------------------------------------------------------------- -->
      
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan {{ ($prefix == '/users') ? 'active' : '' }}" href="JavaScript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n="User">User Management</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a class="{{ ($route == 'users.add') ? 'active' : '' }}" href="{{  route('users.add') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">Add</span></a>
              </li>
              <li><a class="{{ ($route == 'user.view') ? 'active' : '' }}" href="{{  route('user.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="View">View</span></a>
              </li>
    
              <!-- <li><a href="page-users-edit.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Edit">Edit</span></a>
              </li> -->
            </ul>
          </div>
        </li>
        @endif
          <!-- ---------------------------------START SETPU MANAGEMENT-------------------------------------------------------------------------- -->
        
          <li class="bold"><a class="collapsible-header waves-effect waves-cyan {{ ($prefix == '/setups') ? 'active' : '' }}" href="JavaScript:void(0)"><i class="material-icons">person_add</i><span class="menu-title" data-i18n="person_add">Setup Management</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a class="{{ ($route == 'student.class.view') ? 'active' : '' }}" href="{{  route('student.class.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">Student Class</span></a>
              </li>
              <li><a class="{{ ($route == 'student.year.view') ? 'active' : '' }}" href="{{  route('student.year.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">Student Year</span></a>
              </li>
              <li><a class="{{ ($route == 'student.group.view') ? 'active' : '' }}" href="{{  route('student.group.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">Student Group</span></a>
              </li>
              <li><a class="{{ ($route == 'student.shift.view') ? 'active' : '' }}" href="{{  route('student.shift.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">Student Shift</span></a>
              </li>
              <li><a class="{{ ($route == 'fee.category.view') ? 'active' : '' }}" href="{{  route('fee.category.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">Fee Category</span></a>
              </li>
              <li><a class="{{ ($route == 'fee.amount.view') ? 'active' : '' }}" href="{{  route('fee.amount.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">Fee Amount </span></a>
              </li>
              <li><a class="{{ ($route == 'exam.type.view') ? 'active' : '' }}" href="{{  route('exam.type.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">Exam Type </span></a>
              </li>
              <li><a class="{{ ($route == 'school.subject.view') ? 'active' : '' }}" href="{{  route('school.subject.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">School Subject </span></a>
              </li>
              <li><a class="{{ ($route == 'assign.subject.view') ? 'active' : '' }}" href="{{  route('assign.subject.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">Assign Subject </span></a>
              </li>
              <li><a class="{{ ($route == 'designation.view') ? 'active' : '' }}" href="{{  route('designation.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">Designation </span></a>
              </li>
              <!-- <li><a href="page-users-edit.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Edit">Edit</span></a>
              </li> -->
            </ul>
          </div>
        </li> 
         <!-- ---------------------------------END SETUP MANAGEMENT-------------------------------------------------------------------------- -->
         <!-- ---------------------------------START STUDENT MANAGEMENT-------------------------------------------------------------------------- -->
        
         <li class="bold"><a class="collapsible-header waves-effect waves-cyan {{ ($prefix == '/students') ? 'active' : '' }}" href="JavaScript:void(0)"><i class="material-icons">layers</i><span class="menu-title" data-i18n="layers">Student Management</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a class="{{ ($route == 'student.reg.view') ? 'active' : '' }}" href="{{ route('student.reg.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">Student Registration</span></a>
              </li>
              <li><a class="{{ ($route == 'roll.generate.view') ? 'active' : '' }}" href="{{ route('roll.generate.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">Roll Generate</span></a>
              </li>
              <li><a class="{{ ($route == 'registration.fee.view') ? 'active' : '' }}" href="{{ route('registration.fee.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">Registration Fee</span></a>
              </li>
              <li><a class="{{ ($route == 'monthly.fee.view') ? 'active' : '' }}" href="{{ route('monthly.fee.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">Monthly Fee</span></a>
              </li>
              <li><a class="{{ ($route == 'exam.fee.view') ? 'active' : '' }}" href="{{ route('exam.fee.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">Exam Fee</span></a>
              </li>
              <!-- <li><a href="page-users-edit.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Edit">Edit</span></a>
              </li> -->
            </ul>
          </div>
        </li>
         <!-- ---------------------------------END STUDENT MANAGEMENT-------------------------------------------------------------------------- -->
         <!-- ---------------------------------Start Employee MANAGEMENT-------------------------------------------------------------------------- -->
        
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan {{ ($prefix == '/employees') ? 'active' : '' }}" href="JavaScript:void(0)"><i class="material-icons">pie_chart_outlined</i><span class="menu-title" data-i18n="Chart">Employee Management</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a class="{{ ($route == 'employee.reg.view') ? 'active' : '' }}" href="{{ route('employee.reg.view') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Add">Employee Registration</span></a>
              </li>
              <li><a href="charts-chartist.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Chartist">Chartist</span></a>
              </li>
              <li><a href="charts-sparklines.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Sparkline Charts">Sparkline Charts</span></a>
              </li>
            </ul>
          </div>
        </li>

 <!-- ---------------------------------END Employee MANAGEMENT-------------------------------------------------------------------------- -->
 
      
        
       
      </ul>
      <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>
    <!-- END: SideNav-->