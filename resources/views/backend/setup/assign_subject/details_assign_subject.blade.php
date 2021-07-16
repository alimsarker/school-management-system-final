@extends('admin.admin_master')
@section('admincontent')
<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span> Assign Subject</span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Setup Management</a>
                  </li>
                  <li class="breadcrumb-item active">  Assign Subject
                  </li>
                  </li>
                </ol>
              </div>
            
            </div>
          </div>
        </div>
<div class="section">
  

      <div class="section section-data-tables">
      
         <div class="row">
            <div class="col s12">
               <div class="card">
               <div class="card-content">
                  <h4 class="card-title">Class Name : {{ $detailsData['0']['student_class']['name'] }}</h4>
                  <a href="{{ route('assign.subject.view') }}" style="float: right;" class="btn cyan waves-effect waves-light right mb-5">Back Assign Subject</a>
                  
                  <div class="row">
                     <div class="col s12">
                     <table id="page-length-option" class="display">
                        <thead>
                           <tr>
                           <th style="width:5%">SL</th>
                         
                           <th>Subject Name</th>
                           <th>Full Mark</th>
                           <th>Pass Mark</th>
                           <th>Subjective Mark</th>
                         
                           
                           
                         
                       
                         
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($detailsData as $key=> $details) 
                           <tr>
                           <td>{{ $key+1 }}</td>
                         
                           <td>{{ $details['student_subject']['school_subject_name'] }}</td>
                           <td>{{ $details->full_mark  }} </td>
                           <td>{{ $details->pass_mark  }} </td>
                           <td>{{ $details->subjective_mark   }} </td>
                           
                       
                       
                          
                           </tr>
                           @endforeach
                        </tbody>
                        
                     </table>
                     </div>
                  </div>
               </div>
               </div>
            </div>
         </div>

      </div>


      </div>
   
</div>


@endsection






