<?php

namespace App\Http\Controllers\Backend\Setup;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function ViewFeeCat(){

        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_category',$data);

    }
    
    public function AddFeeCat(){

      
        return view('backend.setup.fee_category.add_fee_category');

    }

    public function StoreFeeCat(Request $request){

        $validated = $request->validate([
            
            'name' => 'required|unique:fee_categories,name',
           
        ],
        [
           
            'name.required' => 'Please Imput Fee Category  Name', 
            'name.unique' => 'The Fee Category Name  Already Used!!!',            
             
        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        
        $data->save();
        $notification = array(
            'message' => 'Fee Category Data Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('fee.category.view')->with($notification); 
    }

    public function EditFeeCat($id){

        $editdata = FeeCategory::find($id);
       
        return view('backend.setup.fee_category.edit_fee_category',compact('editdata')); 
    }

    
    public function UpdateFeeCat(Request $request, $id){


        $data = FeeCategory::find($id);
        $validated  = $request->validate([
            
            'name' => 'required|unique:fee_categories,name,'.$data->id
           
        ],
        [
           
            'name.required' => 'Please Imput Fee Category  Name', 
            'name.unique' => 'The Fee Category Name  Already Used!!!',              
             
        ]);
     
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Fee Category Data Updated Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('fee.category.view')->with($notification); 
    }
    
    public function FeeCatDelete($id){

        FeeCategory::find($id)->delete();         
      
        $notification = array(
            'message' => 'Fee Category Data Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->route('fee.category.view')->with($notification);   
    }
}
