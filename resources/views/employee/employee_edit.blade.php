@extends('./layout_master')

@section('admin')

<div class="content-page center">

    <!-- Start Content-->
    <div class="container-fluid pt-4">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Update Employee Information</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="employee-container-wrapper">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('employee.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $employee->id }}">
                    <input type="hidden" name="old_img" value="{{ $employee->employee_img}}">

                    <div class="employee-container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="">
                                    <label for="name" class="form-label">Employee name<b
                                            style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                    <div class="controls">
                                        <input type="text" id="employee_name" name="employee_name" value="{{ $employee->employee_name }}" placeholder="Name"
                                            class="form-control">
                                        @error('employee_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="">
                                    <label for="father-name" class="form-label">Employee Father Name <b
                                            style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                    <div class="controls">
                                        <input type="text" id="emp_father_name" value="{{ $employee->emp_father_name }}" placeholder="Father Name"
                                            name="emp_father_name" class="form-control">
                                        @error('emp_father_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="">
                                    <label for="mother-name" class="form-label">Employee Mother Name <b
                                            style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                    <div class="controls">
                                        <input type="text" id="emp_mother_name" value="{{ $employee->emp_mother_name }}" placeholder="Mother Name"
                                            name="emp_mother_name" class="form-control">
                                        @error('emp_mother_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="">
                                    <label for="birth-day" class="form-label">Date Of Birth <b
                                            style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                    <div class="controls date-selector">

                                        <div class="">
                                            <input class="form-control " type="date" name="emp_dob" value="{{ $employee->emp_dob }}"
                                                dateformat="dd/mm/yy" />
                                        </div>

                                        <label for="birth-day" class="form-label">e.g DD/MM/YY</label>

                                        @error('emp_dob')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="">
                                    <label for="employee-id" class="form-label">Employee Email Id <b
                                            style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                    <div class="controls">
                                        <input type="email" id="email_id" placeholder="s_aib@gmail.com" name="email_id" value="{{ $employee->email_id }}"
                                            class="form-control">
                                        @error('email_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @php
                                $phone_num_cut = $employee->emp_phone;
                                $trim_num = trim($phone_num_cut,"+88");
                            @endphp
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="">
                                    <label for="phone" class="form-label">Employee Phone <b
                                            style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                    <div class="controls">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" name="defnum"
                                                    id="basic-addon1">+88</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="01*********"
                                                name="emp_phone" value="{{ $trim_num }}" aria-label="Username"
                                                aria-describedby="basic-addon1">
                                        </div>
                                        @error('emp_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="">
                                    <label for="office-id" class="form-label">Employee Office Id <b
                                            style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                    <div class="controls">
                                        <input type="text" id="employee_ofc_id" placeholder="Office Id"
                                            name="employee_ofc_id" value="{{ $employee->employee_ofc_id }}" class="form-control">
                                        @error('employee_ofc_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="">
                                    <label for="dprt-name" class="form-label">Department Name <b
                                            style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                    <div class="controls">
                                        <select id="department_id" name="department_id"  class="form-select">
                                            <option value=" ">Select Department Name</option>
                                            @foreach ($departments as $department)
                                            @if ($employee->department_id == $department->id)
                                            <option value="{{$department->id}}" selected>
                                                {{$department->department_name}}</option>
                                            @else
                                            <option value="{{$department->id}}">{{$department->department_name}}
                                            </option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('department_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="">
                                    <label for="image" class="form-label">Employee Profile Image <b
                                            style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                    <div class="controls">
                                        <input type="file" id="emp_image" name="emp_image" value="{{ asset($employee->emp_image) }}"
                                            class="form-control">
                                        @error('emp_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="">
                                    <label for="humanfd-datepicker" class="form-label">Employee Joining Date <b
                                            style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                    <div class="controls ">

                                        <div class="">
                                            <input class="form-control " type="date" name="joining_date"
                                              value="{{ $employee->joining_date }}"   dateformat="dd/mm/yy" />
                                        </div>
                                        <label for="birth-day" class="form-label">e.g DD/MM/YY</label>
                                        @error('joining_date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="">
                                    <label for="salary" class="form-label">Employee Salary <b
                                            style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                    <div class="controls">
                                        <input type="number" id="emp_salary" value="{{ $employee->emp_salary }}" placeholder="Salary"
                                            name="emp_salary" class="form-control">
                                        @error('emp_salary')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">

                                <div class="">
                                    <label for="designation" class="form-label">Employee Designation <b
                                            style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                    <div class="controls">
                                        <input type="text" id="designation" value="{{ $employee->designation }}" placeholder="Designation"
                                            class="form-control" name="designation">
                                        @error('designation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="">
                                    <label for="dprt-name" class="form-label">Employee Status <b
                                            style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                    <div class="controls">
                                        <select id="emp_status" name="emp_status" class="form-control">
                                            <option value="1">Select Employee Stutus</option>
                                            <option {{ ($employee->emp_status==1? 'selected':'') }} value="1">Active</option>
                                            <option {{ $employee->emp_status==0? 'selected':'' }} value="0">In Active </option>
                                        </select>
                                        @error('emp_status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="">
                                    <label for="p-address" class="form-label">Employee Present Address <b
                                            style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                    <div class="controls">
                                        <textarea id="present_address" class="form-control"
                                            name="present_address"  rows="4" placeholder="Present Address"
                                            cols="70">{{ $employee->present_address }}</textarea>
                                        @error('present_address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="">
                                    <label for="p-address" class="form-label">Employee Permanent Address <b
                                            style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                    <div class="controls">
                                        <textarea id="parmanent_address" class="form-control"
                                            name="parmanent_address" rows="4"
                                            placeholder="Permanent Address">{{ $employee->parmanent_address }}</textarea>

                                        @error('parmanent_address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <button class="btn btn-success" type="submit"> Update Employee </button>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>

</div> <!-- container -->

@endsection
