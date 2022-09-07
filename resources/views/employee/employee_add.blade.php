@extends('./layout_master')
@section('admin')

<div class="content-page center">

    <!-- Start Content-->
    <div class="container-fluid pt-4">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Add Employee</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="employee-container-wrapper">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('/store/employee') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="employee-container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="">
                                    <label for="name" class="form-label">Employee name<b
                                            style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                    <div class="controls">
                                        <input type="text" id="employee_name" name="employee_name" placeholder="Name"
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
                                        <input type="text" id="emp_father_name" placeholder="Father Name"
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
                                        <input type="text" id="emp_mother_name" placeholder="Mother Name"
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
                                            <input class="form-control " type="date" name="emp_dob"
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
                                        <input type="email" id="email_id" placeholder="s_aib@gmail.com" name="email_id"
                                            class="form-control">
                                        @error('email_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
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
                                                name="emp_phone" aria-label="Username"
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
                                            name="employee_ofc_id" class="form-control">
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
                                        <select id="department_id" name="department_id" class="form-select">
                                            <option value=" ">Select Department Name</option>
                                            @foreach ($departments as $department)
                                            <option value="{{$department->id}}">{{$department->department_name}}
                                            </option>
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
                                        <input type="file" id="emp_image" name="emp_image"
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
                                                dateformat="dd/mm/yy" />
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
                                        <input type="number" id="emp_salary" placeholder="Salary"
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
                                        <input type="text" id="designation" placeholder="Designation"
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
                                            <option value="1">Active</option>
                                            <option value="0">In Active </option>
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
                                            name="present_address" rows="4" placeholder="Present Address"
                                            cols="70"></textarea>
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
                                            placeholder="Permanent Address"></textarea>

                                        @error('parmanent_address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{--  <div class="employee-reference-wrapper">
                            <h4 class="">#Reference 1</h4>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="name" class="form-label">Reference name <b
                                                style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                        <input type="text" class="form-control" name="reference_name_one"
                                            placeholder="Name" />
                                        @error('reference_name_one')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="name" class="form-label">Reference Mobile Number <b
                                                style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" name="defnum"
                                                    id="basic-addon1">+88</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="01*********"
                                                name="reference_mobile_one" aria-label="Username"
                                                aria-describedby="basic-addon1">
                                        </div>
                                        @error('reference_mobile_one')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="name" class="form-label">Reference Relationship <b
                                                style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                        <input type="text" class="form-control" name="reference_relationship_one"
                                            placeholder="Relationship" />
                                        @error('reference_relationship_one')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="dprt-name" class="form-label">Reference Address <b
                                                style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                        <textarea id="p-address" class="form-control" placeholder="Address"
                                            name="reference_address_one" rows="4" cols="50"></textarea>
                                        @error('reference_address_one')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="employee-reference-wrapper">
                            <h4 class="">#Reference 2</h4>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="name" class="form-label">Reference name <b
                                                style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                        <input type="text" name="reference_name_two" class="form-control"
                                            placeholder="Name" />
                                        @error('reference_name_two')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="name" class="form-label">Reference Mobile Number <b
                                                style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" name="defnum"
                                                    id="basic-addon1">+88</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="01*********"
                                                name="reference_mobile_num_two" aria-label="Username"
                                                aria-describedby="basic-addon1">

                                        </div>
                                        @error('reference_mobile_num_two')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="name" class="form-label">Reference Relationship <b
                                                style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                        <input type="text" class="form-control" placeholder="Relationship"
                                            name="reference_relationship_two" />
                                        @error('reference_relationship_two')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="dprt-name" class="form-label">Reference Address <b
                                                style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                                        <textarea id="p-address" class="form-control" placeholder="Address"
                                            name="reference_address_two" rows="4" cols="40"></textarea>
                                        @error('reference_address_two')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="employee-reference-wrapper">
                            <h4 class="">#Reference 3</h4>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="name" class="form-label">Reference name</label>
                                        <input type="text" class="form-control" name="reference_name_3"
                                            placeholder="Name" />
                                        <div class="invalid-feedback">
                                            please enter your Reference name
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="name" class="form-label">Reference Mobile Number</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" name="defnum"
                                                    id="basic-addon1">+88</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="01*********"
                                                name="reference_mobile_num_3" aria-label="Username"
                                                aria-describedby="basic-addon1">
                                        </div>
                                        @error('reference_mobile_num_3')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="name" class="form-label">Reference Relationship</label>
                                        <input type="text" class="form-control" placeholder="Relationship"
                                            name="reference_relationship_3" />
                                        <div class="invalid-feedback">
                                            please enter your Reference Relationship
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="dprt-name" class="form-label">Reference Address</label>
                                        <textarea id="p-address" class="form-control" placeholder="Address"
                                            name="reference_address_3" rows="4" cols="40"></textarea>
                                        <div class="invalid-feedback">
                                            please write your Reference address
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="employee-reference-wrapper">
                            <h4 class="">#Reference 4</h4>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="name" class="form-label">Reference name</label>
                                        <input type="text" class="form-control" name="reference_name_4"
                                            placeholder="Name" />
                                        <div class="invalid-feedback">
                                            please enter your Reference name
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="name" class="form-label">Reference Mobile Number</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" name="defnum"
                                                    id="basic-addon1">+88</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="01*********"
                                                name="reference_mobile_num_4" aria-label="Username"
                                                aria-describedby="basic-addon1">
                                        </div>
                                        @error('reference_mobile_num_4')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="name" class="form-label">Reference Relationship</label>
                                        <input type="text" class="form-control" placeholder="Relationship"
                                            name="reference_relationship_4" />
                                        <div class="invalid-feedback">
                                            please enter your Reference Relationship
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="">
                                        <label for="dprt-name" class="form-label">Reference Address</label>
                                        <textarea class="form-control" placeholder="Address" name="reference_address_4"
                                            rows="4" cols="40"></textarea>
                                        <div class="invalid-feedback">
                                            please write your Reference address
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>  --}}
                    </div>
                    <button class="btn btn-success" type="submit">Add Employee</button>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>

</div> <!-- container -->

@endsection
