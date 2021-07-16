<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\FeeCategoryAmount;

class FeeAmountController extends Controller
{
    public function ViewFeeAmount(){

        // $data['allData'] = FeeCategoryAmount::all();
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount',$data);

    }

    public function AddFeeAmount(){
        

        $data['fee_category'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.fee_amount.add_fee_amount',$data);

    }

    public function StoreFeeAmount(Request $request){

      $countClass = count($request->class_id);
      if ($countClass !=NULL) {
            for ($i=0; $i <$countClass ; $i++) { 
                
              $fee_amount = new FeeCategoryAmount();
              $fee_amount->fee_category_id = $request->fee_category_id;
              $fee_amount->class_id = $request->class_id[$i];
              $fee_amount->amount = $request->amount[$i];
              $fee_amount->save();

            } // End of for condition 
          
      }//End of if condition

      $notification = array(
        'message' => 'Fee Amount Data Inserted Successfully',
        'alert-type' => 'info'
    );
    return Redirect()->route('fee.amount.view')->with($notification); 

   } //End of StoreFeeAmount Method


   public function EditFeeAmount($fee_category_id){

       $data['editData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
    // dd($data['editData']->toArray());
        $data['fee_category'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.fee_amount.edit_fee_amount',$data);

   }

   public function UpdateFeeAmount(Request $request, $fee_category_id){

    if ($request->class_id == NULL) {
        $notification = array(
            'message' => 'Fee Amount Data Field Required!!!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification); 
    
    }else{
        $countClass = count($request->class_id);
        FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();
              for ($i=0; $i <$countClass ; $i++) { 
                  
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
  
              } // End of for condition  
    }  //End else 

    
            
        
  
    $notification = array(
        'message' => 'Fee Amount Data Updated Successfully',
        'alert-type' => 'success'
    );
    return Redirect()->route('fee.amount.view')->with($notification);

   } //End Method




   public function FeeAmountDelete(){
        
    $data['allData'] = FeeCategoryAmount::all();
    $data['fee_category'] = FeeCategory::all();
    $data['classes'] = StudentClass::all();

    return view('backend.setup.fee_amount.delet_fee_amount',$data);

}


 public function FeeAmountDeleted($id){

    FeeCategoryAmount::find($id)->delete();
      
    $notification = array(
        'message' => 'Fee Amount Data Deleted Successfully',
        'alert-type' => 'warning'
    );
    return Redirect()->route('fee.amount.view')->with($notification); 

 }

   public function DetailsFeeAmount($fee_category_id){

    $data['detailsData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
    
    return view('backend.setup.fee_amount.details_fee_amount',$data);
   }

    
} //End of START { (FeeAmountController)
