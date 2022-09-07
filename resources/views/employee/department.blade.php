@extends('./layout_master')
@section('admin')

{{--  Add Modal  --}}
<div id="addDepartmentModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Add Department</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addDeptForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="">
                        <label for="">Department Name <span class="text-danger">*</span></label>
                        <input type="text" id="dept_name" name="department_name" class="form-control" placeholder="WEB">
                        <span id="error_depname" class="text-danger"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

{{--  Edit Modal   --}}
<div id="editDepartmentModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Update Department</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateDeptForm" method="POST" >
                @csrf
                <input type="hidden" id="edit_dept">
                <div class="modal-body">
                    <div class="">
                        <label for="">Department Name <span class="text-danger">*</span></label>
                        <input type="text" id="edit_dept_name" name="department_name" class="form-control">
                        <span id="error_depname" class="text-danger"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Updated</button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="content-page center">
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card" style="margin-top: 30px">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-10">
                                    <h1 class="header-title" style="font-size: 1.5rem">Department List</h1>
                                </div>
                                <div class="col-lg-2" style="margin-bottom:10px;padding-left: 75px;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDepartmentModal">Add Department</button>
                                </div>
                            </div>

                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SN.</th>
                                        <th>Department Name</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($departments as $dep)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $dep->department_name }}</td>
                                        <td>
                                            <button class="btn btn-success dep_edit" value="{{ $dep->id }}"><a href="#"><i class="fas fa-highlighter"></i></a></button>

                                            <button class="btn btn-danger dep_del" ><a href="{{ url('/delete/dept', [$dep->id]) }}"><i class="fas fa-trash-alt"></i></a></button>
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

@section('scripts')

    <script>
        $(document).ready(function () {

            /** cdn */
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /** Add Department */
            $('#addDeptForm').on('submit',function(e)
            {
                console.log("happensing");
                e.preventDefault();
                let formData = new FormData($('#addDeptForm')[0]);
                //console.log(formData);
                $.ajax({
                    type: "POST",
                    url: "{{ route('dept.add') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response);
                        if(response.status == 400){
                           $('#error_depname').text(response.errors.department_name) ;
                        }
                        else{
                            toastr.success(response.message);
                            location.reload();
                            $('#addDepartmentModal').modal('hide');

                        }

                    }
                });


            });

            /** Edit Department */
            $('.dep_edit').on('click',function(){
                console.log("happening");
                var dept_id = $(this).val();
                console.log(dept_id);
                $('#editDepartmentModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: `/edit/dept/${dept_id}`,
                    success: function (response) {
                        console.log(response.department.department_name);
                        $('#edit_dept_name').val(response.department.department_name);
                        $('#edit_dept').val(dept_id);
                    }
                });

            });

            /** Update Department */
            $('#updateDeptForm').on('submit',function(e){
                e.preventDefault();
                console.log('okk');

                var dept_id = $('#edit_dept').val();
                console.log(dept_id);
                let updateformData = new FormData($('#updateDeptForm')[0]);
                console.log(updateformData);

                $.ajax({
                    type: "POST",
                    url: `/update/dept/${dept_id}`,
                    data: updateformData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response);
                       if(response.status == 400){
                            $('#error_depname').text(response.errors.department_name) ;
                         }
                         else{
                             toastr.success(response.message);
                             location.reload();
                             $('#editDepartmentModal').modal('hide');

                         }


                    }
                });
            });







        }); /** end ready function*/

    </script>

@endsection




