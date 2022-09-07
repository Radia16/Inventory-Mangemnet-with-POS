<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Image;

class EmployeeController extends Controller
{

    //Employee Add Form
    public function employeeAdd(){
        $departments = Department::all();
        return view('employee.employee_add',compact('departments'));
    }

    //Employee Store
    public function employeeStore(Request $request){


        //Image Save
        $image = $request->file('emp_image');
        $name_gen = hexdec(uniqid()) .'.'. $image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/employee/'. $name_gen);
        $save_url = 'upload/employee/'. $name_gen;

        $employee = Employee::create([

            'employee_name'     => $request->employee_name,
            'email_id'          => $request->email_id,
            'emp_phone'         =>'+88'. $request->emp_phone,
            'employee_ofc_id'   => $request->employee_ofc_id,
            'department_id'     => $request->department_id,
            'emp_dob'           => $request->emp_dob,
            'emp_father_name'   => $request->emp_father_name,
            'emp_mother_name'   => $request->emp_mother_name,
            'joining_date'      => $request->joining_date,
            'present_address'   => $request->present_address,
            'parmanent_address' => $request->parmanent_address,
            'designation'       => $request->designation,
            'emp_salary'        => $request->emp_salary,
            'emp_status'        => $request->emp_status,
            'emp_image'         => $save_url,

        ]);

        $notification = array(
            'message' => 'Employee Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('emp.list_view')->with($notification);
    }

    // Employee List View
    public function employeeListView(){
        $employees = Employee::with('departments')->get();
        //dd($employees);
        return view('employee.employee_view_all',compact('employees'));
    }

    //Employee Edit
    public function employeeEdit($id){
        $employee = Employee::find($id);
        $departments = Department::all();
        //dd($employee);
        return view('employee.employee_edit',compact('employee','departments'));
    }

    // Employee Update
    public function EmployeeUpdate(Request $request){
        //dd($request);

        $employee_id = $request->id;
        $old_img = $request->old_img;

        $employee = Employee::find($employee_id);

        if ($request->file('emp_image')) {

            if(file_exists($old_img) && $request->old_img != null)
            {
                unlink($old_img);
            }

            //Image Save
            $image = $request->file('emp_image');
            $name_gen = hexdec(uniqid()) .'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/employee/'. $name_gen);
            $save_url = 'upload/employee/'. $name_gen;
            $employee->emp_image = $save_url;

        }

            $employee->employee_name     = $request->input('employee_name');
            $employee->email_id          = $request->input('email_id');
            $employee->emp_phone         = '+88'. $request->input('emp_phone');
            $employee->employee_ofc_id   = $request->input('employee_name');
            $employee->department_id     = $request->input('department_id');
            $employee->emp_dob           = $request->input('emp_dob');
            $employee->emp_father_name   = $request->input('emp_father_name');
            $employee->emp_mother_name   = $request->input('emp_mother_name');
            $employee->joining_date      = $request->input('joining_date');
            $employee->present_address   = $request->input('present_address');
            $employee->parmanent_address = $request->input('employee_name');
            $employee->designation       = $request->input('designation');
            $employee->emp_salary        = $request->input('emp_salary');
            $employee->emp_status        = $request->input('emp_status');
            $employee->update();


        $notification = array(
            'message' => 'Employee Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('emp.list_view')->with($notification);
    }

    //Employee Delete
    public function employeetDelete($id)
    {

        $employee = Employee::findOrFail($id);

        $img = $employee->emp_image;
        unlink($img);
        Employee::findOrFail($id)->delete();

        $notification = array(
            'message' =>  'Employee Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    // Single Employee View Page
    public function employeeDetails($id){
        $employee_info = Employee::find($id);
        $departments = Department::all();
        //dd($employee_info);
        return view('employee.emp_single_view_page',compact('employee_info','departments'));
    }


}// end main method
