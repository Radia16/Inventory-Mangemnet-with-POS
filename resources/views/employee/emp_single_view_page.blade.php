@extends('./layout_master')
@section('admin')

@section('css')
<style>
    .employee-view-container .employee-image {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .employee-view-container .employee-image img {
        width: 230px;
        border-radius: 200px;
        height: 230px;
        border: 6px solid black;
    }



</style>

@endsection

<div class="content-page center">
    <div class="content">
        <div class="container-fluid">

            <div class="employee-view-container">

                <div class="card">
                    <div class="col-lg-12">
                        <h1 class="header-title" style="font-size: 1.5rem">Employee Information </h1>
                    </div>


                    <div class="card-body">
                        <div class="employee-image  text-center">
                            <img class="img-fluid rounded-circle" src="{{ asset($employee_info->emp_image) }}"  alt="image" style="margin-right:13rem">
                        </div>

                        <br><br>
                        <div class="row">
                            <div class="col-lg-4">
                                <div>
                                    <h5 ><label >Employee Name </label>

                                            <span >: {{$employee_info->employee_name}}</span>
                                    </h5>
                                </div>

                                <div>
                                    <h5 ><label >Phone No </label>

                                            <span >: {{$employee_info->emp_phone}}</span>
                                    </h5>
                                </div>

                                <div>
                                    <h5 ><label >Employee Joining Date </label>

                                            <span >: {{$employee_info->joining_date}}</span>
                                    </h5>
                                </div>

                                <div>
                                    <h5 ><label >Employee Birth Date </label>

                                            <span >: {{$employee_info->emp_dob}}</span>
                                    </h5>
                                </div>

                                <div>
                                    <h5 ><label >Present Address </label>

                                            <span >: {{$employee_info->present_address}}</span>
                                    </h5>
                                </div>




                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <h5 ><label>Employee Office Id </label>

                                            <span >: {{$employee_info->employee_ofc_id}}</span>
                                    </h5>
                                </div>

                                <div>
                                    <h5 ><label >Department </label>

                                            <span >: {{optional($employee_info->departments)->department_name}}</span>
                                    </h5>
                                </div>

                                <div>
                                    <h5 ><label >Employee Salary </label>

                                            <span >: {{$employee_info->emp_salary}}</span>
                                    </h5>
                                </div>

                                <div>
                                    <h5 ><label >Father Name </label>

                                            <span >: {{$employee_info->emp_father_name}}</span>
                                    </h5>
                                </div>

                                <div>
                                    <h5 ><label >Parmanent Address </label>

                                            <span >: {{$employee_info->parmanent_address}}</span>
                                    </h5>
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <h5 ><label>Employee Email </label>

                                            <span >: {{$employee_info->email_id}}</span>
                                    </h5>
                                </div>

                                <div>
                                    <h5 ><label>Employee Designation </label>

                                            <span >: {{$employee_info->designation}}</span>
                                    </h5>
                                </div>

                                <div>
                                    <h5 ><label >Status </label>

                                            <span >: {{$employee_info->emp_status}}</span>
                                    </h5>
                                </div>

                                <div>
                                    <h5 ><label >Mother Name </label>

                                            <span >: {{$employee_info->emp_mother_name}}</span>
                                    </h5>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>






        </div>
        {{--   container end  --}}
    </div>
     {{--  content end  --}}
</div>

@endsection
