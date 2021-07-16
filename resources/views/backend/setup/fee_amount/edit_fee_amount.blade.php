@extends('admin.admin_master')
@section('admincontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span> Fee Amount</span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Setup Management</a>
                  </li>
                  <li class="breadcrumb-item active">  Fee Amount
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
                <h4 class="card-title">Edit Fee Amount</h4>
                <form method="POST" action="{{ route('update.amount.store',$editData[0]->fee_category_id) }}"> @csrf


             
        <div class="row">    

               
            <div class="input-field col s12">
                <div class="add_item">

                    <div class="input-field">
                    <select name="fee_category_id"  class="block mt-1 w-full">
                        <option value="" disabled selected>Choose Fee  Type</option>
                        @foreach($fee_category as $catname)
                        <option value="{{ $catname->id }}" {{ ($editData['0']->fee_category_id == $catname->id)? "selected":""}}> {{ $catname->name }}</option>
                        @endforeach
                        
                        </select>
                        <label>Select Fee  Type</label>
                    
                    </div>
            
@foreach($editData as $edit)

<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                    <div class="row">  

                        <div class="input-field col s5">
                            <div class="input-field">
                            <select name="class_id[]"  class="block mt-2 w-full">
                            <option value="" disabled selected>Choose Student Class</option>
                                @foreach($classes as $class)
                                <option value="{{ $class->id }}" {{ ($edit->class_id == $class->id)? "selected":"" }}> {{ $class->name }}</option>
                                @endforeach
                                
                                </select>
                                <label>Select Student Class</label>
                            
                            </div>
                        </div>

                                                
                            
                        <div class="input-field col s5 mt-3">
                            <input  type="text" name="amount[]" value="{{ $edit->amount }}" class="block mt-1 w-full">
                            <label for="amount">Fee Amount </label>
                        
                        </div>

                        <div class="input-field col s2">
                        <!-- <span class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow addeventmore"><i class="material-icons">add_circle</i></span> -->
                        <span class="btn-floating btn-large gradient-45deg-light-red-cyan gradient-shadow removedeventmore"><i class="material-icons">remove_circle</i></span>
                                                  
                        </div>
                        </div>
                    </div>
                   
 @endforeach 
                </div>
           


            <div class="row">  
    
            <div class="input-field col s12">
            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Update
                <i class="material-icons right">send</i>
            </button>
            </div>
            </div>  
        </div>
 
    </div>
</form>
</div>
</div> 
</div>
</div>




<!-- <div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
        <div class="row">
                    <div class="input-field col s5">
                        <div class="input-field">
                        <select name="class_id[]"  class="block mt-2 w-full">
                            <option value="">Choose Student Class</option>
                            @foreach($classes as $class)
                            <option value="{{ $class->id }}"> {{ $class->name }}</option>
                            @endforeach
                            
                            </select>
                            <label>Select Student Class</label>
                           
                        </div>
                    </div>

                                            
                        
                    <div class="input-field col s5 mt-3">
                        <input  type="text" name="amount[]" class="block mt-1 w-full">
                        <label for="amount">Fee Amount </label>
                    
                    </div>

                    <div class="input-field col s2">
                        <span class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow addeventmore"><i class="material-icons">add_circle</i></span>
                        <span class="btn-floating btn-large gradient-45deg-light-red-cyan gradient-shadow removedeventmore"><i class="material-icons">remove_circle</i></span>
                                                     
                    </div>
                
                </div>
        
        </div>

    </div>
</div> -->

<script type="text/javascript">
    $(document).ready(function(){
        var counter = 0;
        $(document).on("click",".addeventmore",function(){
            var whole_extra_item_add = $('.whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;

        });
        $(document).on("click",".removedeventmore",function(event){ 
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1
         });

    });

</script>
@endsection