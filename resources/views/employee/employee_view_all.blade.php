@extends('./layout_master')
@section('admin')

<div class="content-page center">
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card" style="margin-top: 30px">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-10">
                                    <h1 class="header-title" style="font-size: 1.5rem">List of Employee</h1>
                                </div>

                            </div>

                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Emloyee Id</th>
                                        <th>Employee Name</th>
                                        <th>Employee Photo</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Monthly Salary</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($employees as $employee)

                                    <tr>
                                        <td>{{ $employee->employee_ofc_id }}</td>
                                        <td>{{ $employee->employee_name }}</td>
                                        <td><img src="{{ asset($employee->emp_image) }}" height="130" width="130" alt=""></td>
                                        <td>{{ optional($employee->departments)->department_name }}</td>
                                        <td>{{ $employee->designation }}</td>
                                        <td>{{ $employee->emp_salary }}</td>
                                        <td>
                                            <button class="btn btn-info dep_edit" value=""><a href="{{ route('employee.details',[$employee->id]) }}"><i class="far fa-eye"></i></a></button>
                                            <button class="btn btn-success dep_edit" value=""><a href="{{ route('emp.edit', [$employee->id] )}}"><i class="fas fa-highlighter"></i></a></button>
                                            <button class="btn btn-danger dep_del" ><a href="{{ route('employee.del',[$employee->id]) }}"><i class="fas fa-trash-alt"></i></a></button>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->


        </div>
        {{--   container end  --}}
    </div>
     {{--  content end  --}}
</div>

@endsection
