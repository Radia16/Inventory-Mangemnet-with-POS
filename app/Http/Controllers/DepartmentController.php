<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    //DepartmentView
    public function departmentView(){
        $departments = Department::get();
        return view('employee.department',compact('departments'));
    }

    //Department store
    public function departmentStore(Request $request){

            $validator = Validator::make($request->all(),
            ['department_name' => 'required'],
            ['department_name.required' => 'Department name is required']
        );

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }
        else{
            $departments = new Department ;
            $departments->department_name = $request->department_name;
            $departments->save();

            return response()->json([
                'message' => ' Department Added Successfully',
                'departments' => $departments
            ]);
        }

    }

    //Department Edit
    public function departmentEdit($id){
        $department = Department::find($id);
        return response()->json([
            'status' => 200,
            'department' => $department,

        ]);
    }

    //Department Update
    public function departmentUpdate(Request $request,$id){


        $validator = Validator::make($request->all(),
        ['department_name' => 'required'],
        ['department_name.required' => 'Department name is required']
        );

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }
        else{
            $department = Department::find($id);
            $department->department_name = $request->department_name;
            $department->update();
            //dd($department);

            return response()->json([
                'message' => 'Department Updated Successfully',
                'department' => $department
            ]);
        }
    }

    //Department Deleteerftgyhujnimkol,p;[']
  
    public function departmentDelete($id){
        //dd($id);
        $department = Department::find($id);
        $department->delete();

        return redirect()->back();
    }
}//end main method
